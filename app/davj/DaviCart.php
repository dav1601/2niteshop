<?php

namespace App\davj;

use App\Models\Insurance;
use App\Models\Products;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DaviCart
{
    public $total = 0;
    public $count = 0;
    public $oldCart = null;
    public function __construct($request)
    {
        $this->request = $request;
        $this->oldCart = $request->session()->has('davi_cart') ? $request->session()->get('davi_cart') : null;
    }
    public function add($id, $qty = 1, $ins = 0, $color = 0)
    {
        $item = Products::where('id', '=', $id)->first();
        if ($ins != 0) {
            $pins = Insurance::where('id', '=', $ins)->first()->price;
        } else {
            $pins = 0;
        }
        $cart[$id] = [
            'id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'qty' => $qty,
            'model' => $item->model,
            'image' => $item->main_img,
            'sub_total' => ($item->price * $qty) + $pins,
            'ins' => $ins,
            'options' => [
                'color' => $color,
            ],
        ];
        $stored = new Collection($cart);
        if ($this->request->session()->put('davi_cart', $stored)) {
            return true;
        } else {
            return false;
        }
    }
   public function content()
    {
        return  $this->request->session()->get('davi_cart');
    }

    public function update($rowId, $qty)
    {
    }


    public function remove($rowId)
    {
    }
}
