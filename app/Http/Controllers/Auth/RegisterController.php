<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'string', 'numeric', 'min:6', 'unique:users'],

            ],
            [
                'name.required' => "Bạn chưa nhập tên",
                'name.string' => "Tên phải là 1 chuỗi kí tự",
                'name.max' => "Độ dài tối đa 255 ký tự",
                'email.required' => "Không được để trống email",
                'email.string' => "Email phải là 1 chuỗi kí tự",
                'email.max' => "Độ dài email tối đa 255 ký tự",
                'email.unique' => "Email đã tồn tại",
                'password.confirmed' => "Mật khẩu xác nhận không khớp",
                'password.min' => "Ít nhất 8 ký tự",
                'phone.min' => "Ít nhất 6 số",
                'phone.unique' => "Số điện thoại này đã tồn tại"

            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 5,
            'phone' => $data['phone'],
        ]);
    }
    public function ajaxRegister(Request $request)
    {
        $vadlidator = $this->validator($request->all());
        $data['errors'] = [];
        $data['s'] = false;
        if ($vadlidator->fails()) {
            $data['errors'] = $vadlidator->errors();
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 5,
                'phone' => $request->phone,
            ]);
            if ($user) {
                $data['s'] = true;
                $this->guard()->login($user);
            }
        }
        return response()->json($data);
    }
}
