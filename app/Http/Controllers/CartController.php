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



class CartController extends Controller
{
    public $mailer;
    public $handle_cart;

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
        $checkout = '';
        $error = array();
        $login = 0;
        $id = $request->has('id')  ? (int) $request->get('id') : 0;
        $qty = $request->has('qty')  ? (int) $request->get('qty') : 1;
        $op_actives = $request->has('ops') && $request->get('ops')  ? $request->get('ops') : null;
        $rowId = $request->has('rowId') ? $request->get('rowId') : 0;
        $type = $request->has('type') ? $request->get('type') : "load";
        $realTimeUpdate = $request->has('rtupdate');
        $data['message'] = "Giỏ hàng đã được cập nhật";
        $data['new'] = false;
        $arrayOps = explode(',', $op_actives);
        if ($realTimeUpdate) {
            $qty = 0;
        }
        // return response()->json(['q' => $qty, 'id' => $id, 'ops' => $op_actives, 'rowId' => $rowId]);
        if ($request->type == "load") {
            if (Auth::check()) {
                Cart::instance('shopping')->destroy();
                Cart::instance('shopping')->restore(Auth::id());
            }
        }
        if ($id != 0) {
            $res = $this->handle_cart->add__or_update($id, $qty, $op_actives, ['type' => $type], $realTimeUpdate);
                $item = $res['product'];
                $add_ok .= view('components.addcart', compact('item'));
                $data['add_ok'] = $add_ok;
                $data['new'] = true;

        }

        if ($request->type == "delete") {
            $rowId = $request->rowId;
            Cart::instance('shopping')->remove($rowId);
        }
        $cart = Cart::instance('shopping')->content()->sortBy('id');
        // foreach ($cart as $item) {
        //     $this->handle_cart->add__or_update($item->id, $qty, $op_actives, [], true);
        // }
        if ($realTimeUpdate) {
            $this->handle_cart->add__or_update($id, 0, $op_actives, ['type' => $type], true);
            $data['new'] = true;
        }
        $this->handle_cart->store_cart();
        $total = $this->handle_cart->total();
        $output .= view('components.client.cart.show', ['cart' => $cart]);
        $output_items = '
        ' . Cart::instance('shopping')->count() . ' Sản Phẩm -- Gọi -- ' . getVal('switchboard')->value . '
        ';
        $output_2 .= view('components.client.cart.drop', ['cart' => $cart]);
        $checkout .= view('components.client.cart.checkout', ['cart' => $cart]);
        $data['cart'] = $output;
        $data['test'] = $cart;
        $data['cart_drop'] = $output_2;
        $data['total'] = $total;
        $data['html_items'] = $output_items;
        $data['total_format'] = crf($total);
        $data['checkout'] = $checkout;
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
            $data['total'] = total();
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
        if (!session()->has('last_orderd')) {
            return redirect()->route('purchase');
        }
        $id = session()->get('last_orderd');
        $ordered = Orders::where('id', '=', $id)->first();
        $cart = unserialize($ordered->cart);
        session()->forget('last_orderd');
        return view('client.cart.checkout-success', compact('ordered', 'cart'));
    }

    ////////////////////////////////////////
    ///////////////////////
}
