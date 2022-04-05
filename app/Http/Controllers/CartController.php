<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ward;
use App\Events\Order;
use App\davj\DaviCart;
use App\Models\Orders;
use App\Mail\OrderMail;
use App\Models\District;
use App\Models\Products;
use App\Models\Province;
use App\Repositories\DavjCartInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Repositories\MailOrderInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

use function Opis\Closure\unserialize;

class CartController extends Controller
{
    public $mailer;


    function __construct(MailOrderInterface $mailer, DavjCartInterface $handle_cart)
    {
        $this->mailer = $mailer;
        $this->handle_cart = $handle_cart;
    }
    ////////////////////////////////////////

    public function show(Request $request)
    {
        return view('client.cart.show');
    }
    public function checkout()
    {
        $prov = Province::all();
        return view('client.cart.checkout', compact('prov'));
    }

    ////////////////////////////////////////


    //////////////////////////////////////

    public function handle_cart(Request $request)
    {
        $data = array();
        $pagination = '';
        $output = '';
        $output_2 = '';
        $add_ok = '';
        $output_items = '';
        $error = array();
        $login = 0;
        if ($request->type == "load") {
            if (Auth::check()) {
                Cart::instance('shopping')->destroy();
                Cart::instance('shopping')->restore(Auth::id());
            }
        }
        if ($request->type == "add") {
            $qty = $request->qty;
            $ins = $request->op;
            $sub_total = $request->sub_total;
            $id = $request->id;
            $this->handle_cart->add__cart($id,  $qty, $ins, 0);
            $item = Products::select('name', 'slug', 'main_img')->where('id', '=', $id)->first();
            $add_ok .= view('components.addcart', compact('item'));
            $data['add_ok'] = $add_ok;
        }
        if ($request->type ==  "update") {
            $rowId = $request->rowId;
            $price = Products::where('id', '=', $request->id)->first()->price;
            $qty = $request->qty;
            $op = $request->op;
            $sub_total = ($qty * $price) + $op;
            $ins = $request->op_id;
            $update_cart = $this->handle_cart->update__cart($request->id, $rowId, $qty, $ins, 0);
            $data['update'] = $update_cart;
            $data['sub_total'] = crf($update_cart->options->sub_total);
            $data['new_rowId'] = $this->handle_cart->get_rowID_by_id_product($request->id);
        }
        if ($request->type == "delete") {
            $rowId = $request->rowId;
            Cart::instance('shopping')->remove($rowId);
        }
        $this->handle_cart->store_cart();
        $total = $this->handle_cart->total();
        $items = Cart::instance('shopping')->count();
        if ($items > 0) {
            foreach (Cart::instance('shopping')->content()->sortBy('id') as $cart) {
                $output .= view('components.cart', compact('cart'));
            }
        } else {
            $output .= '
            <div id="cart__empty" class="d-flex flex-column align-items-center">
            <img src="' . asset('client/images/empty-cart.png') . '" alt="">
            <span class="d-block my-2 text-uppercase mr-4" style="font-size: 20px; font-weight:600;">Giỏ hàng bạn đang trống</span>
       </div>
            ';
        }
        $output_items = '
        ' . Cart::instance('shopping')->count() . ' Sản Phẩm -- Gọi -- ' . getVal('switchboard')->value . '
        ';
        $output_2 .= '
        <ul id="cart__drop--menu">
        <div class="arrow-up"></div>
        <div id="content_sub_cart">
        ';
        if (empty_cart()) {
            $output_2 .= '<span class="empty__cart">Giỏ hàng đang trống</span>';
        } else {
            foreach (Cart::instance('shopping')->content() as $cartsub) {
                $output_2 .= '<li>';
                $output_2 .= view('components.cartsub', compact('cartsub'));;
                $output_2 .= '</li>';
            }
        }
        $output_2 .= '</div>';
        if (!empty_cart()) {
            $output_2 .= '<div id="total">
            <span class="d-block">
                Tổng Tiền: <strong> ' . crf($this->handle_cart->total()) . '</strong>
            </span>
        </div>';
        }
        $output_2 .= '</ul>';
        if (!empty_cart()) {
            $output_2 .= '<div id="ckOrCart">
                                <div id="ckOrCart__cont">
                                    <a href="  ' . route('show_cart') . ' " class="d-block" class="davi_btn"
                                        id="ckOrCart__cont--cart">
                                        <i class="fas fa-shopping-cart pr-2"></i>
                                        Giỏ Hàng
                                    </a>
                                    <a href="' . route('checkout') . '" class="d-block" class="davi_btn"
                                        id="ckOrCart__cont--ck">
                                        Thanh Toán
                                        <i class="fas fa-long-arrow-alt-right pl-2"></i>
                                    </a>
                                </div>
                            </div>';
        }

        $data['cart'] = $output;
        $data['sub_cart'] = $output_2;
        $data['total'] = $total;
        $data['items'] = $items;
        $data['html_items'] = $output_items;
        $data['count'] = Cart::instance('shopping')->count();
        $data['total_format'] = crf($total);
        return response()->json($data);
    }

    ////////////////////////////////////////
    //////////////////////////////////////

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
            $output .= '<option value="">Chọn Quận</option>';
            foreach (District::where('_province_id', '=', $id)->get() as $dist) {
                $output .= '<option value="' . $dist->id . '">' . $dist->_name . '</option>';
            }
        } else {
            $output .= '<option value="">Chọn Phường/Xã</option>';
            foreach (Ward::where('_district_id', '=', $id)->get() as $ward) {
                $output .= '<option value="' . $ward->id . '">' . $ward->_name . '</option>';
            }
        }
        $data['html'] = $output;
        $data['type'] = $type;
        return response()->json($data);
    }

    ////////////////////////////////////////
    ////////////////////////////////////////

    public function handle_checkout(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fullname' => 'required|string',
                'email' => 'email|required',
                'phone' => 'required|numeric',
                'prov' => 'required',
                'dist' => 'required',
                'address' => 'required|string'
            ],
            [
                'fullname.required' => "Bạn chưa điền Họ và Tên",
                'fullname.string' => "Họ Tên phải là 1 chuỗi kí tự",
                'email.required' => "Bạn chưa điền E-Mail",
                'email.email' => "E-Mail không đúng định dạng",
                'phone.required' => "Bạn chưa điền số điện thoại",
                'phone.numeric' => "Bắt buộc là 1 chuỗi các SỐ",
                'prov.required' => "Bạn chưa chọn Tỉnh",
                'dist.required' => "Bạn chưa chọn Quận",
                'address.required' => "Bạn chưa nhập địa chỉ",
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['name'] = $request->fullname;
            $data['cart'] = serialize(Cart::instance('shopping')->content());
            if (Auth::check()) {
                $data['users_id'] = Auth::id();
            }
            $data['total'] = $this->handle_cart->total();
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['prov'] = Province::where('id', '=', $request->prov)->first()->_name;
            $data['dist'] = District::where('id', '=', $request->dist)->first()->_name;
            if ($request->ward != null) {
                $data['ward'] = Ward::where('id', '=', $request->ward)->first()->_name;
            }
            $data['payment'] = $request->payment;
            $data['note'] = $request->note;
            $data['phone'] = $request->phone;
            $data['status'] = 1;
            $data['paid'] = 1;
            $data['d'] = Carbon::now('Asia/Ho_Chi_Minh')->day;
            $data['m'] = Carbon::now('Asia/Ho_Chi_Minh')->month;
            $data['y'] = Carbon::now('Asia/Ho_Chi_Minh')->year;
            $ordered = Orders::create($data);
            if ($ordered) {
                $data_mail = [
                    'order' => $ordered,
                    'type' => 1,
                    'time' => $ordered->created_at,
                    'text' => "Chúng tôi sẽ gửi cho bạn 1 email khi đơn hàng được vận chuyển"
                ];
                $subject = "Thông tin đơn hàng quý khách vừa đặt từ 2NITE SHOP GAME";
                $to = $ordered->email;
                $template = 'client.mail.order';
                event(new Order($to, $subject, $template, $data_mail));
                Cart::instance('shopping')->destroy();
                $this->handle_cart->store_cart();
                $request->session()->put('last_orderd', $ordered->id);
                return redirect()->route('checkout_s');
            }
        }
    }
    ////////////////////////////////////////
    ////////////////////////////////////////

    public function checkout_s(Request $request)
    {
        $id = session()->get('last_orderd');
        $ordered = Orders::where('id', '=', $id)->first();
        $cart = unserialize($ordered->cart);
        return view('client.cart.checkout-success', compact('ordered', 'cart'));
    }

    ////////////////////////////////////////
    ///////////////////////
}
