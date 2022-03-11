<?php

namespace App\Repositories;


use App\Models\Role;
use App\Models\User;
use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use App\Repositories\UserInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DaviUser implements UserInterface
{
    public function __construct()
    {
    }
    public function getUser($id = null) {
      if ($id == null)
      return Auth::user();
      return User::where('id', '=' , $id)->firstOrFail();
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
                return asset($user->avatar).'?ver='.Carbon::now('Asia/Ho_Chi_Minh')->timestamp  ;
            } else {
                return asset('client/images/user-large.png').'?ver='.Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
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
}
