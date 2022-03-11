<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Blogs;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Customers;
use App\Models\Statistics;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Repositories\CustomerInterface;

class Customer implements CustomerInterface
{
    public function vip($amount)
    {
        if (!$amount != 0 || $amount != '') {
            if ($amount >= 10000000 && $amount < 50000000) {
                return 1;
            }
            if ($amount >= 50000000 && $amount < 250000000) {
                return 2;
            }
            if ($amount >= 250000000 && $amount < 1000000000) {
                return 3;
            }
            if ($amount >= 1000000000) {
                return 4;
            }
        }
        return;
    }
    public function UpdateOrCreateCustomer($id)
    {
        $data = Orders::where('id', '=', $id)->first();
        $user_id = $data->users_id;
        $phone  = $data->phone;
        $user = Customers::where(function ($query) use ($user_id, $phone) {
            $query->where('users_id', '=', $user_id)
                ->orWhere('phone', '=', $phone);
        })->first();
        if ($user) {
            $total = $user->wallet + $data->total;
            Customers::where(function ($query) use ($user_id, $phone) {
                $query->where('users_id', '=', $user_id)
                    ->orWhere('phone', '=', $phone);
            })->update([
                'wallet' => $total,
                'vip' => $this->vip($total)
            ]);
        } else {
            $data_create['name'] = $data->name;
            $data_create['wallet'] = $data->total;
            $data_create['phone'] = $data->phone;
            $data_create['email'] = $data->email;
            $data_create['users_id'] = $data->users_id;
            $data_create['vip'] = $this->vip($data->total);
            $data_create['address'] = $data->address;
            $data_create['p'] = $data->prov;
            $data_create['d'] = $data->dist;
            $data_create['w'] = $data->ward;
            Customers::create($data_create);
        }
        return;
    }
    public function stats($total , $total_cost) {
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $month = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $stat = Statistics::where('day' , '=' , $day)->where('month' , '=' , $month)->where('year' , '=' , $year)->first();
        if ($stat){
        $total_day = $stat->total_day + $total;
        $total_cost = $stat->total_cost + $total_cost;
        Statistics::where('id', '=', $stat->id )->update(['total_day' => $total_day , 'total_cost' => $total_cost]);
        } else {
         $data['day'] = $day;
         $data['month'] = $month;
         $data['year'] = $year;
         $data['total_day'] = $total;
         $data['total_cost'] = $total_cost;
         Statistics::create($data);
        }
        return;
    }
    public function updateNameAuthor() {
    $user = User::where('id' , '=' , Auth::id())->firstOrFail();
    Products::where('author_id' , '=' , Auth::id())->update(['author' => $user->name]);
    Blogs::where('users_id' , '=' , Auth::id())->update(['author' => $user->name]);
    return;
    }
}
