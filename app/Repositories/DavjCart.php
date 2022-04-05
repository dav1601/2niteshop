<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class DavjCart implements DavjCartInterface
{
    public function add__cart($id, $qty = 1, $ins = 0, $color = 0)
    {
        $product = Products::where('id', '=', $id)->firstOrFail();
        if ($ins != 0) {
            $price_ins = Insurance::where('id',  $ins)->first()->price;
        } else {
            $price_ins = 0;
        }
        $sub_total = ($qty * $product->price) + $price_ins;
        $check =  Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id == $id;
        });
        if (count($check) > 0) {
            foreach ($check as $item) {
                $qty_update = ($item->qty + $qty);
                $this->update__cart($id, $item->rowId,  $qty_update, $ins, 0);
            }
        } else {
            Cart::instance('shopping')->add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'options' => [
                        'ins' => $ins,
                        'color' => $color,
                        'model' => $product->model,
                        'image' => $product->main_img,
                        'sub_total' => $sub_total,
                        'cost' => $product->historical_cost
                    ],
                ]
            );
        }
    }
    //
    public function update__cart($id, $rowId,  $qty = 1, $ins = 0, $color = 0)
    {
        $product = Products::where('id', '=', $id)->first();
        if ($ins != 0) {
            $p_ins = Insurance::where('id', '=', $ins)->first()->price;
        } else {
            $p_ins = 0;
        }
        $sub_total = ($qty * $product->price) + $p_ins;
        return Cart::instance('shopping')->update($rowId, [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
            'options' => [
                'ins' => $ins,
                'color' => $color,
                'model' => $product->model,
                'image' => $product->main_img,
                'sub_total' => $sub_total,
                'cost' => $product->historical_cost
            ],
        ]);
    }
    //
    public function total()
    {
        $total = 0;
        foreach (Cart::instance('shopping')->content() as $cart) {
            $total += $cart->options->sub_total;
        }
        return $total;
    }
    //
    public function store_cart()
    {
        if (Auth::check()) {
            Cart::instance('shopping')->store(Auth::id());
        }
        return;
    }
    // ////////////////////
    public function get_rowID_by_id_product($id)
    {
        $product =  Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id == $id;
        });
        if ($product)
            return $product->first()->rowId;
        return false;
    }
}
