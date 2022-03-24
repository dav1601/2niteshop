<?php

namespace App\Http\Controllers\Api;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PwRsSms;
use Aloha\Twilio\Twilio;
use Illuminate\Http\Request;
use App\Repositories\UserInterface;
use libphonenumber\PhoneNumberUtil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\NumberParseException;
use Illuminate\Support\Facades\Validator;

class PasswordResetSmsController extends Controller
{
    /**
     * Forgot Password.
     * Api dùng để xác nhận số điện thoại và gửi OTP để khôi phục mật khẩu.
     * @group Reset Password Api
     * @bodyParam phone string required max:15 Example: 0986868568
     * @responseFile 200 responses/forgot.json
     */
    public function forgot(Request $request, UserInterface $user)
    {
        $country = $request->has('country') ? $request->country : "VN";
        $validator = Validator::make(
            $request->all(),
            [
                'phone' => 'required|numeric|exists:users,phone',
            ],
            [
                'phone.required' => "Không Được Để Trống số điện thoại",
                'phone.numeric' => "Số điện thoại bắt buộc phải là số",
                'phone.exists' => "Số điện thoại không tồn tại trong hệ thống",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'check' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ]);
        }
        $phone = $request->phone;
        $check_exists_reset = PwRsSms::where('phone', 'LIKE', $phone)->first();
        if ($check_exists_reset) {
            $code = $check_exists_reset->code;
        } else {
            $code = $user->createPasswordResetCode();
            PwRsSms::where('phone',  $phone)->create(['phone' => $phone, 'code' => $code, 'created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        }
        try {
            $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $swissNumberProto = $phoneUtil->parse($phone, $country);
            $phone_format =  $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::E164);
        } catch (\libphonenumber\NumberParseException $e) {
            return response()->json([
                'format' => false,
                'message' => "Lỗi Format E164 số điện thoại",
                'errors' => $e,
            ]);
        }
        $accountId = "ACf4884a8214fb836955308d0e2fe14cf7";
        $token = "3c044ddfaafaa6e1974e5fde2ffeece0";
        $twilio = new \Aloha\Twilio\Twilio($accountId, $token, "+15626009418");
        $twilio->message($phone_format, 'Mã OTP khôi phục mật khẩu của bạn là:' . $code);
        $response['check'] = true;
        $response['send_code'] = true;
        $response['code'] = $code;
        $response['phone'] = $phone;
        $response['message'] = "Gửi mã OTP thành công";
        $response['phone_format'] = $phone_format;
        return response()->json($response, 200);
    }
    /**
     * Api Verification OTP.
     * Api dùng đẻ xác nhận mã OTP có trong hệ thống.
     * @group Reset Password Api
     * @bodyParam code int required max:6 Example: 160101
     * @responseFile 200 responses/verification.json
     */
    public function verification(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code' => 'required|numeric|exists:password_sms_resets,code',
            ],
            [
                'code.required' => "Không Được Để Trống mã OTP",
                'code.numeric' => "Mã OTP bắt buộc phải là số",
                'code.exists' => "Mã OTP không chính xác",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'verification' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ]);
        }
        $response['info'] = PwRsSms::where('code', '=', $request->code)->first();
        $response['code'] = $request->code;
        $response['verification'] = true;
        return response()->json($response, 200);
    }
    /**
     * Api New Password.
     * Api dùng để thay đổi mật khẩu mới.
     * @group Reset Password Api
     * @bodyParam code int required max:6 Example: 160101
     * @bodyParam phone string required max:15 Example: 0801160169
     * @bodyParam password string required Example: TestApi1612001
     * @responseFile 200 responses/new_password.json
     */
    public function new_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code' => 'required|numeric|exists:password_sms_resets,code',
                'phone' => 'required|numeric|exists:password_sms_resets,phone',
                'password' => 'required'
            ],
            [
                'code.required' => "Không Được Để Trống mã OTP",
                'code.numeric' => "Mã OTP bắt buộc phải là số",
                'code.exists' => "Mã OTP không chính xác",
                'phone.required' => "Không Được Để Trống mã SDT",
                'phone.numeric' => "SDT bắt buộc phải là số",
                'phone.exists' => "SDT không chính xác",
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'verification' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ]);
        }
        $user = User::where('phone', 'LIKE', $request->phone)->first();
        $info = PwRsSms::where('phone', '=', $request->phone)->where('code', '=', $request->code)->first();
        if ($info) {
            if (Hash::check($request->password, $user->password)) {
                $response['errors'] = "Bạn vừa nhập password cũ";
                $response['isPassOld'] = true;
                return response()->json($response);
            }
            $password = Hash::make($request->password);
            if (User::where('phone', 'LIKE', $request->phone)->update(['password' => $password])) {
                PwRsSms::where('code', $request->code)->delete();
                $response['changed_password'] = true;
                $response['message'] = "Đã thay đổi mật khẩu thành công";
                return response()->json($response);
            } else {
                $response['changed_password'] = false;
                $response['message'] = "Thay đổi mật khẩu thất bại";
                return response()->json($response);
            }
        } else {
            return response()->json([
                'verification' => false,
                'message' => "Số điện thoại hoặc mã code không tồn tại",
            ]);
        }
    }
}
