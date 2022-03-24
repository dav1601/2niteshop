<?php

namespace App\Repositories;


use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Ward;
use App\Models\Address;
use App\Models\Api\ApiAdmin;
use App\Models\District;
use App\Models\Province;
use App\Models\PwRsSms;
use Illuminate\Support\Str;
use App\Repositories\UserInterface;
use Illuminate\Support\Facades\Auth;

class DaviUser implements UserInterface
{
    public function __construct()
    {
    }
    public function getUser($id = null)
    {
        if ($id == null)
            return Auth::user();
        return User::where('id', '=', $id)->firstOrFail();
    }
    public function setDefaultAddress($id)
    {
        Address::where('user_id', '=',  Auth::id())->update(['def' => 0]);
        Address::where('id', '=',  $id)->update(['def' => 1]);
        return;
    }
    public function getAllAddressOfUser()
    {
        return User::find(Auth::id())->address();
    }
    public function getAvatarUser($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        if ($user) {
            if ($user->avatar != NULL) {
                return asset($user->avatar) . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
            } else {
                return asset('client/images/user-large.png') . '?ver=' . Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
            }
        }
        return;
    }
    public function getRoleUser($id)
    {
        $user = User::where('id', '=', $id)->first();
        if ($user) {
            return Role::where('id', '=', $user->role_id)->first()->name;
        }
        return;
    }
    public function getNameCity($id)
    {
        $prov =  Province::where('id', '=', $id)->first();
        if ($prov) {
            return   $prov->_name;
        } else {
            return;
        }
    }
    public function getNameDist($id)
    {
        $dist =  District::where('id', '=', $id)->first();
        if ($dist) {
            return  $dist->_name;
        } else {
            return;
        }
    }
    public function getNameWard($id)
    {
        $ward =  Ward::where('id', '=', $id)->first();
        if ($ward) {
            return $ward->_name;
        } else {
            return;
        }
    }
    public function generateSecurityCode()
    {
        $int = '';
        for ($i = 1; $i <= 5; $i++) {
            $int .= random_int(0, 9);
        }
        $sec_code = Auth::id() . $int;
        while (ApiAdmin::where('users_id', Auth::id())->where('security_code', $sec_code)->first()) {
            for ($i = 1; $i <= 5; $i++) {
                $int .= random_int(0, 9);
            }
            $sec_code = Auth::id() . $int;
        }
        return $sec_code;
    }
    public function createApiToken($id_admin)
    {
        $user = User::where('id', $id_admin)->first();
        if (!$user)
            return NULL;
        $token = $user->id . Str::random(10);
        while (ApiAdmin::where('users_id', $user->id)->where('token_api', $token)->first()) {
            $token = $user->id . Str::random(10);
        }
        return $token;
    }
    // /////////////////////////////////////////
    public function ApiExists()
    {
        $api_exists = ApiAdmin::where('users_id', Auth::id())->first();
        if ($api_exists)
            return true;
        return false;
    }
    // //////////////////////////////////////
    public function createPasswordResetCode() {
        $int = '';
        for ($i = 1; $i <= 6; $i++) {
            $int .= random_int(0, 9);
        }
        $sms_code = (int) $int;
        while (PwRsSms::where('code', $sms_code)->first()) {
            $int = '';
            for ($i = 1; $i <= 6; $i++) {
                $int .= random_int(0, 9);
            }
            $sms_code = (int)$int;
        }
        return $sms_code;
    }
    // ////////////////////////////////////
    public static function convertFromE164($E164Number)
    {
        $contryLength = 1;

        $country = substr($E164Number, 1, $contryLength);
        switch ($country) {
            case '1':   $contryLength = 1;  break;
            case '7':   $contryLength = 1;  break;

            case '2':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "20"
                        OR $country === "27")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;

            case '3':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "30"
                        OR $country === "31"
                        OR $country === "32"
                        OR $country === "33"
                        OR $country === "34"
                        OR $country === "36"
                        OR $country === "39")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;

            case '4':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "40"
                        OR $country === "41"
                        OR $country === "43"
                        OR $country === "44"
                        OR $country === "45"
                        OR $country === "46"
                        OR $country === "47"
                        OR $country === "48"
                        OR $country === "49")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;

            case '5':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "51"
                        OR $country === "52"
                        OR $country === "53"
                        OR $country === "54"
                        OR $country === "55"
                        OR $country === "56"
                        OR $country === "57"
                        OR $country === "58")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;

            case '6':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "60"
                        OR $country === "61"
                        OR $country === "62"
                        OR $country === "63"
                        OR $country === "64"
                        OR $country === "65"
                        OR $country === "66")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;

            case '8':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "81"
                        OR $country === "82"
                        OR $country === "84"
                        OR $country === "86")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;

            case '9':   $contryLength = 2;
                        $country = substr($E164Number, 1, $contryLength);

                        if($country === "90"
                        OR $country === "91"
                        OR $country === "92"
                        OR $country === "93"
                        OR $country === "94"
                        OR $country === "95"
                        OR $country === "98")  break;
                        else {
                            $contryLength = 3;
                            $country = substr($E164Number, 1, $contryLength);
                        }
                        break;
            default:
                $country = 0;
                $contryLength = 0;
                break;
        }

        unset($e164);
        $e164["contory"] = substr($E164Number, 1, $contryLength);
        $e164["telNumber"] = "0" . substr($E164Number, $contryLength + 1);

        return $e164;
    }
}
