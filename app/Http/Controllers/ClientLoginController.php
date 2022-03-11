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
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $remember = false;
            if ($request->has('remember')) {
                $remember = true;
            }
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $remember)) {
                Cart::instance('shopping')->destroy();
                Cart::instance('shopping')->restore(Auth::id());
                $user = Auth::user();
                if ($user->role_id <= 3) {
                    return redirect()->route('dashboard');
                }
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('error', '1');
            }
        }
    }

    ////////////////////////////////////////
}
