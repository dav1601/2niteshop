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
    public $vips;
    public function __construct()
    {
    }
    public function vip($amount)
    {
        if (!$amount != 0 || $amount != '') {
            if ($amount >= 10000000 && $amount < 50000000) {
                return 1;
            } elseif ($amount >= 50000000 && $amount < 100000000) {
                return 2;
            } elseif ($amount >= 100000000 && $amount < 2500000000) {
                return 3;
            } elseif ($amount >= 2500000000) {
                return 4;
            }
        }
        return;
    }
    public function UpdateOrCreateCustomer($ordered)
    {

        $user = Customers::where('phone', 'LIKE', $ordered->phone)->first();
        if ($user) {
            $total = $user->wallet + $ordered->total;
            Customers::where('phone', 'LIKE', $ordered->phone)->update([
                'wallet' => $total,
                'vip' => $this->vip($total)
            ]);
        } else {
            $data_create['name'] = $ordered->name;
            $data_create['wallet'] = $ordered->total;
            $data_create['phone'] = $ordered->phone;
            $data_create['email'] = $ordered->email;
            $data_create['users_id'] = $ordered->users_id;
            $data_create['vip'] = $this->vip($ordered->total);
            $data_create['address'] = $ordered->address;
            $data_create['p'] = $ordered->prov;
            $data_create['d'] = $ordered->dist;
            $data_create['w'] = $ordered->ward;
            Customers::create($data_create);
        }
        return;
    }
    public function stats($total, $total_cost)
    {
        $day = Carbon::now('Asia/Ho_Chi_Minh')->day;
        $month = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $stat = Statistics::where('day', '=', $day)->where('month', '=', $month)->where('year', '=', $year)->first();
        if ($stat) {
            $total_day = $stat->total_day + $total;
            $total_cost = $stat->total_cost + $total_cost;
            Statistics::where('id', '=', $stat->id)->update(['total_day' => $total_day, 'total_cost' => $total_cost]);
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
    public function updateNameAuthor()
    {
        $user = User::where('id', '=', Auth::id())->firstOrFail();
        Products::where('author_id', '=', Auth::id())->update(['author' => $user->name]);
        Blogs::where('users_id', '=', Auth::id())->update(['author' => $user->name]);
        return;
    }
}
