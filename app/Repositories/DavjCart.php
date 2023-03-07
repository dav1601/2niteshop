<?php

namespace App\Repositories;

use App\Models\Products;
use App\Models\Insurance;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class DavjCart implements DavjCartInterface
{
    public $file;
    public function __construct(FileInterface $handle_file)
    {

        $this->file = $handle_file;
    }
    public function add__or_update($id = 0, $qty = 1, $op_actives = "", $options = [], $realTimeUpdateProduct = false)
    {
        $op_actives = !$op_actives ? '' : $op_actives;
        $product = Products::select(['slug', 'historical_cost', 'discount', 'id', 'main_img', 'model', 'name', 'price'])->where('id', $id)->firstOrFail();
        $sub_total = 0;
        $res['act'] = "";
        $res['product'] = "";
        $res['item'] = "";
        $check =  Cart::instance('shopping')->search(function ($cartItem) use ($id) {
            return $cartItem->id == $id;
        });
        if ($realTimeUpdateProduct) {
            foreach ($check as  $rtitem) {
                $op_actives = $rtitem->options->ins;
            }
            $qty = 0;
        }
        if (count($check) > 0) {
            foreach ($check as $item) {

                if ($options['type'] === "update") {
                    $qty = $qty;
                } else {
                    $qty = (int) ($item->qty + $qty);
                }
                $sub_total = price_product($product, $op_actives, ['qty' => $qty]);
                if ($realTimeUpdateProduct) {
                    Cart::instance('shopping')->update(
                        $item->rowId,
                        [
                            'id' => $product->id,
                            'name' => $product->name,
                            'price' => $product->price,
                            'options' => [
                                'ins' => $op_actives,
                                'model' => $product->model,
                                'image' => $product->main_img,
                                'sub_total' => $sub_total,
                                'slug' => $product->slug,
                                'cost' => $product->historical_cost,
                                'discount' => $product->discount
                            ],
                        ]
                    );
                } else {
                    Cart::instance('shopping')->update(
                        $item->rowId,
                        [
                            'id' => $product->id,
                            'name' => $product->name,
                            'price' => $product->price,
                            'qty' => $qty,
                            'options' => [
                                'ins' => $op_actives,
                                'model' => $product->model,
                                'image' => $product->main_img,
                                'sub_total' => $sub_total,
                                'other' => $options,
                                'slug' => $product->slug,
                                'cost' => $product->historical_cost,
                                'discount' => $product->discount
                            ],
                        ]
                    );
                }
            }
            $res['item'] = $check;
            $res['act'] = "update";
        } elseif (count($check) <= 0 && !$realTimeUpdateProduct) {
            $res['act'] = "add";
            $sub_total = price_product($product, $op_actives, ['qty' => $qty]);
            Cart::instance('shopping')->add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'options' => [
                        'ins' => $op_actives,
                        'model' => $product->model,
                        'image' => $product->main_img,
                        'sub_total' => $sub_total,
                        'other' => $options,
                        'slug' => $product->slug,
                        'cost' => $product->historical_cost,
                        'discount' => $product->discount
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
