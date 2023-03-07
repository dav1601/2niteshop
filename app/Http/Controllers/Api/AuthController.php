<?php

namespace App\Http\Controllers\Api;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Repositories\FileInterface;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @group Auth
 *
 * APIs for Auth
 */
class AuthController extends Controller
{
    /**
     * Singup.
     * Api này cho phép bạn đăng ký tài khoản user trong hệ thống.
     * @bodyParam name string required max 255 Example: Vuong Anh
     * @bodyParam email string required max 255 Example: 2niteshop@gmail.com
     * @bodyParam password string required min:6  Example: Anh$1234
     * @bodyParam password_confirmation string required min:6  Example: Anh$1234
     * @bodyParam phone string required min:6  Example: 0987687679
     * @responseFile 200 responses/reg.json
     */
    public function signup(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'confirmed', 'min:6'],
                'phone' => ['required', 'string', 'unique:users', 'numeric'],

            ],
            [
                'name.required' => "Bạn chưa nhập tên",
                'password.required' => "Bạn chưa nhập mật khẩu",
                'name.string' => "Tên phải là 1 chuỗi kí tự",
                'name.max' => "Độ dài tối đa 255 ký tự",
                'email.required' => "Không được để trống email",
                'email.string' => "Email phải là 1 chuỗi kí tự",
                'email.max' => "Độ dài email tối đa 255 ký tự",
                'email.unique' => "Email đã tồn tại",
                'password.confirmed' => "Mật khẩu xác nhận không khớp",
                'phone.unique' => "Số điện thoại này đã tồn tại"

            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'fails' => true,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
                'success' => 0
            ]);
        }
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 5,
            'phone' => $request->phone,
        ]);
        return response()->json([
            'message' => 'Đăng ký thành công',
            'success' => true
        ]);
    }
    /**
     * Login.
     * Api cho phép bạn đăng nhập vào hệ thống.
     * @bodyParam email string required max 255 Example: 2niteshop@gmail.com
     * @bodyParam password string required min:6  Example: Anh$1234
     * @responseFile 200 responses/login.json
     */
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
            return response()->json([
                'is_login' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ]);
        }
        if ($request->has('remember_me')) {
            $remember_me = true;
        } else {
            $remember_me = false;
        }
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials, $remember_me)) {
            return response()->json([
                'is_login' => false,
                'message' => 'Sai tài khoản hoặc mật khẩu'
            ], 401);
        }
        Cart::instance('shopping')->destroy();
        Cart::instance('shopping')->restore(Auth::id());
        $user = Auth::user();
        $tokenResult = $user->createToken('Personal Access Token 2');
        $token = $tokenResult->token;
        if ($remember_me == true) {
            $token->expires_at = Carbon::now()->addMonth(120);
        }
        $token->save();
        return response()->json([
            'is_login' => true,
            'status' => 'success',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'cart' => Cart::instance('shopping')->content()->sortBy('id'),
            'user' => $user,
            'remember' => $remember_me
        ]);
    }
    /**
     *Logout.
     * Api cho phép bạn logout và xoá token user trong hệ thống.
     * @group Auth Api
     * @header Authorization Bearer {token}
     * @authenticated
     * @response{
     * is_logout => true
     * }
     */
    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return response()->json([
            'is_logout' => true,
        ]);
    }
    /**
     * GET USER LOGGED.
     * Api này cho phép lấy user đã đăng nhập.
     * @group Auth Api
     * @header Authorization Bearer {token}
     * @authenticated
     * @responseFile 200 responses/me.json
     */
    public function me($id, Request $request)
    {
        $user = User::where('id', $id)->where('role_id', '>', 3)->first();
        if (!$user)
            return response()->json(['find' => false, 'message' => "Không tìm thấy user"], 401);
        $data['user'] = $user;
        return response()->json($data);
    }
    /**
     * POST UPDATE INFO USER.
     * Api này cho phép cập nhật thông tin của user.
     * @group Auth Api
     * @header Authorization Bearer {token}
     * @authenticated
     * @bodyParam name string required max 255 Example: VUong Anh
     * @bodyParam phone string required min:6  Example: 0987687678
     * @bodyParam avatar file
     * @responseFile 200 responses/update_user.json
     */
    public function update(Request $request, $id, FileInterface $file)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
                'phone' => 'required|numeric|unique:users,phone,' . $id,
                'avatar' => 'image|mimes:jpeg,png,jpg,tiff,svg|max:1000',
            ],
            [
                'name.required' => "Không Được Để Trống Tên",
                'name.string' => "Tên phải là 1 chuỗi kí tự",
                'phone.unique' => "Số điện thoại này đã tồn tại",
                'phone.required' => "Bạn chưa điền số điện thoại",
                'phone.numeric' => "Bắt buộc là 1 chuỗi các SỐ",
                'avatar.image' => "File không phải là file ảnh",
                'avatar.mimes' => "Ảnh sai định dạng các đuôi ảnh cho phép : jpeg,png,jpg,tiff,svg",
                'avatar.max' => "File ảnh không vượt quá 1000kb",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'updated_fail' => true,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
                'success' => 0
            ]);
        }
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        if ($request->has('avatar') && $request->avatar != Null) {
            if ($user->avatar != NULL)
                unlink("" . $user->avatar);
            $path = "admin/images/avatar/";
            $data['avatar'] = $file->storeFileImg($request->avatar, $path);
        }
        if (User::where('id', '=', $id)->update($data)) {
            return response()->json([
                'success' => 1,
                'updated_fail' => false,
                'user' => User::where('id', '=', $id)->first(),
            ]);
        }
    }
    /**
     * GET ORDERS USER LOGGED.
     * Api này cho phép lấy danh sách đơn hàng user đã đăng nhập.
     * @group Auth Api
     * @header Authorization Bearer {token}
     * @authenticated
     * @responseFile 200 responses/me_orders.json
     */
    public function me_orders($id, Request $request)
    {
        $orders = User::findOrFail($id)->orders()->get();
        foreach ($orders as $item) {
            $item->cart = unserialize($item->cart);
        }
        return $orders;
        $data['orders'] = $orders;
        $data['item_orders'] = collect(unserialize($orders->cart));
        return response()->json($data);
    }
}
