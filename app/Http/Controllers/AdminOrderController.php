<?php

namespace App\Http\Controllers;


use App\Models\Ward;
use App\Events\Order;
use App\Models\Orders;
use App\Models\District;
use App\Models\PreOrder;
use App\Models\Products;
use App\Models\Customers;
use App\Events\UpdateOrder;
use App\Http\Traits\Responser;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Carbon;
use App\Repositories\VaEventRepo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Repositories\ModelInterface;
use App\Repositories\OrderInterface;
use App\Repositories\VaEventInterface;
use PDF;
use App\Repositories\CustomerInterface;
use App\Repositories\MailOrderInterface;
use Illuminate\Support\Facades\Validator;

class AdminOrderController extends Controller
{
    use Responser;
    public $customer;
    public $mailer;
    public function __construct(CustomerInterface $customer, MailOrderInterface $mailer)
    {
        $this->middleware(function ($request, $next) {
            session(['active' => 'orders']);
            return $next($request);
        });
        $this->customer =  $customer;
        $this->mailer = $mailer;
    }
    ////////////////////////////////////////
    public function index(ModelInterface $rmodel)
    {
        // $page = 1;
        // $item_page = 10;
        // $start = ($page - 1) * $item_page;
        // $count = Orders::count();
        // $number_page = ceil($count / $item_page);
        // $orders = Orders::orderBy('id',);

        return view('admin.orders.show');
    }
    // //////////////////////////////////
    public function detail($id, Request $request)
    {
        $ordered = Orders::where('id', '=', $id)->first();
        $cart = unserialize($ordered->cart);
        return view('admin.orders.detail', compact('ordered', 'cart'));
    }
    //////////////////////////////////////
    public function customers()
    {
        $page = 1;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count = Customers::count();
        $number_page = ceil($count / $item_page);
        $customers = Customers::orderBy('vip', 'DESC')->offset($start)->limit($item_page)->get();
        return view('admin.orders.customer', compact('customers', 'number_page', 'page'));
    }
    // //////////////////////////////////////////
    // ANCHOR handle ajax //////////////////////////////////////////////////////
    public function handle_ajax(Request $request, VaEventInterface $vaev, MailOrderInterface $mail_order, ModelInterface $repoModel)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $id = $request->id;
        $sort = $request->has('sort') ? $request->sort : "desc";
        $page = $request->page;
        $html_detail_order = '';
        $orders = new Orders();
        // ANCHOR update detail update //////////////////////////////////////////////////////
        if ($request->act == "update") {
            $ordered = Orders::where('id', '=', $id)->firstOrFail();
            $html_detail_order .= view('components.admin.order.select', compact('ordered'));
        }
        // ANCHOR update status order //////////////////////////////////////////////////////
        if ($request->act == "update_stt") {
            $ordered = Orders::where('id', '=', $id)->firstOrFail();
            if ($request->val == 3) {
                $total_cost = 0;
                foreach (unserialize($ordered->cart) as $cart_cost) {
                    $total_cost += price_product_cost($cart_cost);
                }
                Orders::where('id', '=', $id)->update(
                    [
                        'status' => $request->val,
                        'paid' => 2,
                        'date_s' => Carbon::now('Asia/Ho_Chi_Minh'),
                    ]
                );
                $this->customer->UpdateOrCreateCustomer($ordered);
                $this->customer->stats($ordered->total, $total_cost);
            } else {
                Orders::where('id', '=', $id)->update(['status' => $request->val]);
                if ($request->val == 2) {
                    Orders::where('id', '=', $id)->update(['date_ship' => Carbon::now('Asia/Ho_Chi_Minh')]);
                }
            }
            $ordered = Orders::where('id', '=', $id)->firstOrFail();

            // ANCHOR mail update status //////////////////////////////////////////////////////
            $mail_order->send_mail_order($ordered);
            if ($ordered->users_id) {
                event(new UpdateOrder($ordered->users_id));
            }
            $vaev->admin_update_order($ordered->id);
            $html_detail_order .= view('components.admin.order.select', compact('ordered'));
        }
        // ANCHOR update paid //////////////////////////////////////////////////////
        if ($request->act == "update_paid") {
            $ordered = Orders::where('id', '=', $id)->first();
            if (!$ordered->paid == 2) {
                if ($request->val == 2) {
                    $total_cost = 0;
                    foreach (unserialize($ordered->cart) as $cart_cost) {
                        $total_cost += price_product_cost($cart_cost);
                    }
                    Orders::where('id', '=', $id)->update(['paid' => 2]);
                    $this->customer->UpdateOrCreateCustomer($ordered);
                    $this->customer->stats($ordered->total, $total_cost);
                }
                if ($ordered->users_id) {
                    event(new UpdateOrder($ordered->users_id));
                }
                $vaev->admin_update_order($ordered->id);
                $ordered = Orders::where('id', '=', $id)->first();
                $html_detail_order .= view('components.admin.order.select', compact('ordered'));
            }
        }
        // ANCHOR load orders //////////////////////////////////////////////////////
        if ($request->stt != 0) {
            $orders = $orders->where('status', '=', $request->stt);
        }
        if ($request->nameOrMail != null) {
            $nameOrMail = $request->nameOrMail;
            $orders = $orders->where(function ($query) use ($nameOrMail) {
                $query->where('name', 'LIKE', '%' . $nameOrMail . '%')
                    ->orWhere('email', 'LIKE', '%' . $nameOrMail . '%');
            });
        }
        if ($request->phone != null) {
            $phone = $request->phone;
            $orders = $orders->where('phone', 'LIKE', '%' . $phone . '%');
        }
        if ($request->dateP != null) {
            $orders =  $orders->where('created_at', '<=', $request->dateP);
        }
        if ($request->dateN != null) {
            $orders =  $orders->where('created_at', '>=', $request->dateN);
        }
        if ($request->p != 0) {
            $orders =  $orders->where('prov', 'LIKE', $request->p);
        }
        if ($request->d != 0) {
            $orders =  $orders->where('dist', 'LIKE', $request->d);
        }
        if ($request->w != 0) {
            $orders =  $orders->where('ward', 'LIKE', $request->w);
        }

        $orders = $repoModel->pagination($orders, ['id', $sort], $page);
        if ($orders->count > 0) {
            $output .= view('components.tableorders', compact('orders'));
        } else {
            $output .= view('components.empty.nodata');
        }

        $data['html'] = $output;
        $data['type'] = $request->type;
        $data['html_detail'] = $html_detail_order;
        return response()->json($data);
    }
    // ///////////////////////////////
    public function change_address(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $id = $request->id;
        $type = $request->type;
        if ($type == 1) {
            $output .= '<option value="0">Chọn Quận</option>';
            foreach (District::where('_province_id', '=', $id)->get() as $dist) {
                $output .= '<option value="' . $dist->_name . '" data-id="' . $dist->id . '">' . $dist->_name . '</option>';
            }
        } else {
            $output .= '<option value="0">Chọn Phường/Xã</option>';
            foreach (Ward::where('_district_id', '=', $id)->get() as $ward) {
                $output .= '<option value="' . $ward->_name . '" data-id="' . $ward->id . '">' . $ward->_name . '</option>';
            }
        }
        $data['html'] = $output;
        $data['type'] = $type;
        return response()->json($data);
    }
    ////////////////////////////////////////
    public function handle_ajax_customers(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $sort = $request->sort;
        $page = $request->page;
        $orders = new Customers();
        if ($request->nameOrMail != null) {
            $nameOrMail = $request->nameOrMail;
            $orders = $orders->where(function ($query) use ($nameOrMail) {
                $query->where('name', 'LIKE', '%' . $nameOrMail . '%')
                    ->orWhere('email', 'LIKE', '%' . $nameOrMail . '%');
            });
        }
        if ($request->phone != null) {
            $phone = $request->phone;
            $orders = $orders->where('phone', 'LIKE', '%' . $phone . '%');
        }
        if ($request->vip != 0) {
            $orders = $orders->where('vip', '=', $request->vip);
        }
        if ($request->wF != null && $request->wT == null) {
            $orders =  $orders->whereBetween('wallet', [$request->wF, Customers::max('wallet')]);
        }
        if ($request->wF == null && $request->wT != null) {
            $orders =  $orders->whereBetween('wallet', [Customers::min('wallet'), $request->wT]);
        }
        if ($request->wF != null && $request->wT != null) {
            if ($request->wT > $request->wF) {
                $orders =  $orders->whereBetween('wallet', [$request->wF, $request->wT]);
            }
        }
        if ($request->p != 0) {
            $orders =  $orders->where('p', 'LIKE', $request->p);
        }
        if ($request->d != 0) {
            $orders =  $orders->where('d', 'LIKE', $request->d);
        }
        if ($request->w != 0) {
            $orders =  $orders->where('w', 'LIKE', $request->w);
        }
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count = $orders->count();
        $number = ceil($count / $item_page);
        $order = $orders->orderBy('id', $sort)->offset($start)->limit($item_page)->get();
        $customers = $order;
        if (count($customers) > 0) {
            $output .= view('components.orders.tablecustomer', compact('customers', 'number', 'page'));
        } else {
            $output .= view('components.empty.nodata');
        }

        $data['html'] = $output;
        $data['type'] = $request->type;
        return response()->json($data);
    }
    // ///////////////////////////////
    ////////////////////////////////////////
    public function show_preOrders(Request $request)
    {
        $page = 1;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count = PreOrder::count();
        $number = ceil($count / $item_page);
        $pre_orders = PreOrder::orderBy('id', 'DESC')->offset($start)->limit($item_page)->get();
        return view('admin.orders.pre-order', compact('pre_orders', 'number', 'page'));
    }

    ////////////////////////////////////////
    //////////////////////////////////////

    public function ajax_preOrders(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $data_create = array();
        $data_update = array();
        $error = array();
        $pre_orders = DB::table('pre_order');
        if ($request->name != null) {
            $pre_orders = $pre_orders->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->phone != null) {
            $pre_orders = $pre_orders->where('phone', 'LIKE', '%' . $request->phone . '%');
        }
        if ($request->stt != null) {
            $pre_orders = $pre_orders->where('status', '=', $request->stt);
        }
        if ($request->sttPrd != null) {
            $pre_orders = $pre_orders->where('status_product', '=', $request->sttPrd);
        }
        if ($request->deposit != null) {
            $pre_orders = $pre_orders->where('deposit', '=', $request->deposit);
        }
        if ($request->delivery != null) {
            $pre_orders = $pre_orders->where('delivery_status', '=', $request->delivery);
        }
        if ($request->namePrd != null) {
            $pre_orders =  $pre_orders->join('products', 'pre_order.products_id', '=', 'products.id')->where('products.name', 'LIKE', '%' . $request->namePrd . '%')->select('pre_order.*', 'products.name');
        }
        $page = $request->page;
        $item_page = 10;
        $start = ($page - 1) * $item_page;
        $count = $pre_orders->count();
        $number = ceil($count / $item_page);
        $customers = $pre_orders->orderBy('pre_order.id', $request->sort)->offset($start)->limit($item_page)->get();
        if (count($customers) > 0) {
            $output .= view('components.admin.table.preorders', compact('customers', 'number', 'page'));
        } else {
            $output .= view('components.empty.nodata');
        }
        $data['html'] = $output;
        $data['output'] = $request->all();
        return response()->json($data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function update_preOrders($id, Request $request)
    {
        $pord = PreOrder::where('id', '=', $id)->firstOrFail();
        return view('admin.orders.update', compact('pord', 'id'));
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_update($id, Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'numeric|required',
            ],
            [
                'name.required' => "Không được để trống tên khách hàng",
                'phone.required' => "Không được để trống sđt khách hàng",
                'phone.numeric' => "Số điện thoại phải là SỐ",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $data_update = $request->except(['_token', 'name']);
            $data_update['name_cus'] = $request->name;
            $update = PreOrder::where('id', '=', $id)->update($data_update);
            if ($update) {
                return redirect()->back()->with('ok', 1);
            } else {
                return redirect()->back()->with('not-ok', 1);
            }
        }
    }

    ////////////////////////////////////////
    public function export_invoice(Request $request)
    {
        $code = $request->code;
        $ordered = Orders::where('code',  $code)->firstOrFail();
        $cart = unserialize($ordered->cart);
        $nameFilePdf = 'hoá đơn đơn hàng số ' . $ordered->code . ' của ' . $ordered->name . '.pdf';
        $html = "";

        // $html .= view("admin.orders.invoice", compact('ordered', 'cart'));



    }













    // //////////////////////////////////
}
