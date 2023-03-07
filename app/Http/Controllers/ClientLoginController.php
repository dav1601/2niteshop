<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class ClientLoginController extends Controller
{
    ////////////////////////////////////////

    public function login(Request $request)
    {
        $isAjax = $request->has('ajax');
        $errors = [];
        $data['errors']['input'] = [];
        $data['s'] = false;
        $data['errors']['login'] = "";
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|string',
                'password' => 'required|string|min:6',
            ],
            [
                'email.required' => "Bạn chưa nhập tài khoản",
                'email.string' => "Tài khoản phải là 1 chuỗi kí tự",
                'password.required' => "Bạn chưa nhập mật khẩu",
                'password.string' => "Mật khẩu phải là 1 chuỗi kí tự",
            ]
        );
        if ($validator->fails()) {
            if ($isAjax) {
                $data['errors']['input'] = $validator->errors();
                return response()->json($data);
            }
            return redirect()->route("login")->withInput()->withErrors($validator);
        } else {
            $remember = false;
            if ($request->has('remember')) {
                $remember = true;
            }
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $remember)) {
                Cart::instance('shopping')->destroy();
                Cart::instance('shopping')->restore(Auth::id());
                if ($isAjax) {
                    $data['role']  = Auth::user()->role_id;
                    $data['s'] = true;
                    return response()->json($data);
                }
                if (Auth::user()->role_id <= 3) {
                    return redirect()->route('dashboard');
                }
                return redirect()->route('home');
            } else {
                if ($isAjax) {
                    $data['errors']['login'] = "Sai tên tài khoản hoặc mật khẩu";
                    return response()->json($data);
                }
                return redirect()->route("login")->with('error', '1');
            }
        }
    }
    //    ///////////////////////////////////////
    public function load_auth_template(Request $request)
    {
        $type = $request->type;
        $html = "";
        switch ($type) {
            case 'login':
                $html .= view('components.admin.modal.auth.login', ['modal' => true]);
                break;
            case 'reg':
                $html .= view('components.admin.modal.auth.reg', ['isModal' => true]);
                break;
        }
        $data['html'] = $html;
        return response()->json($data);
    }
    //  //////////////////////////////////////// end load_auth_template

    ////////////////////////////////////////
}
