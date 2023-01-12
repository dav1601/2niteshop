<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class DavjCart implements DavjCartInterface
{
    public function add__or_update($id = 0, $qty = 1, $op_actives = "", $options = [])
    {
        $product = Products::select(['slug', 'id', 'main_img', 'model', 'name', 'price'])->where('id', $id)->firstOrFail();
        $op_actives = explode(',', $op_actives);
        $price = (int) $product->price;
        $price_op = 0;
        $sub_total = 0;
        $res['act'] = "";
        $res['product'] = "";
        $res['item'] = "";
        if (count($op_actives) > 0) {
            foreach ($op_actives as  $ins_id) {
                $item = Insurance::where('id', $ins_id)->first();
                if ($item) {
                    $price_op += (int) Insurance::where('id', $ins_id)->first()->price;
                }
            }
        }
        $check =  Cart::instance('shopping')->search(function ($cartItem) use ($id) {
            return $cartItem->id == $id;
        });
        if (count($check) > 0) {
            foreach ($check as $item) {
                $qty = (int) ($item->qty + $qty);
                $sub_total = (int) ($price_op + $price) * $qty;
                Cart::instance('shopping')->update(
                    $item->rowId,
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'qty' => $qty,
                        'options' => [
                            'ins' => implode(",", $op_actives),
                            'model' => $product->model,
                            'image' => $product->main_img,
                            'sub_total' => $sub_total,
                            'option' => $options
                        ],
                    ]
                );
            }
            $res['item'] = $check;
            $res['act'] = "update";
        } else {
            $res['act'] = "add";
            $sub_total = (int) ($price_op + $price) * $qty;
            Cart::instance('shopping')->add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'options' => [
                        'ins' => implode(",", $op_actives),
                        'model' => $product->model,
                        'image' => $product->main_img,
                        'sub_total' => $sub_total,
                        'other' => $options
                    ],
                ]
            );
        }
        $res['product'] = $product;
        return $res;
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
            $total += (int) $cart->options->sub_total;
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
