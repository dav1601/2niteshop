<?php

namespace App\Repositories;

use App\Http\Traits\Product;
use App\Models\Products;
use App\Models\Insurance;
use App\Models\ProductIns;
use Illuminate\Support\Facades\Auth;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;

class DavjCart implements DavjCartInterface
{
    use Product;
    public $file;
    public function __construct(FileInterface $handle_file)
    {

        $this->file = $handle_file;
    }
    public function add__or_update($id = 0, $qty = 1, $op_actives = "", $options = [], $realTimeUpdateProduct = false, $instance = "shopping")
    {
        // $instance = array_key_exists("fake_shopping", $options) ? "fake_shopping" : "shopping";
        $product = Products::select(['id', "image_first",  'slug', 'historical_cost', 'discount', 'id', 'main_img', 'model', 'name', 'price'])->with("img_first")->where('id', $id)->firstOrFail();
        $sub_total = 0;
        $res['act'] = "";
        $res['product'] = "";
        $res['item'] = "";
        $item =  Cart::instance($instance)->search(function ($cartItem) use ($id) {
            return $cartItem->id == $id;
        })->first();
        if ($item) {
            if ($options['type'] === "update") {
                $qty = $qty;
            } else {
                $qty = (int) ($item->qty + $qty);
            }
            $sub_total = $this->price_product($product, $op_actives, ['qty' => $qty]);
            Cart::instance($instance)->update(
                $item->rowId,
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'options' => [
                        'ins' => $op_actives,
                        'model' => $product->model,
                        'image' => $product->path_first,
                        'sub_total' => $sub_total,
                        'other' => $options,
                        'slug' => $product->slug,
                        'discount' => $product->discount
                    ],
                ]
            );
            $res['item'] = $item =  Cart::instance($instance)->search(function ($cartItem) use ($id) {
                return $cartItem->id == $id;
            })->first();
            $res['act'] = "update";
        } elseif (!$item && !$realTimeUpdateProduct) {
            $res['act'] = "add";
            $sub_total = $this->price_product($product, $op_actives, ['qty' => $qty]);
            Cart::instance($instance)->add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'options' => [
                        'ins' => $op_actives,
                        'model' => $product->model,
                        'image' => $product->path_first,
                        'sub_total' => $sub_total,
                        'other' => $options,
                        'slug' => $product->slug,
                        'discount' => $product->discount
                    ],
                ]
            );
        }
        $res['product'] = $product;
        return $res;
    }
    //

    public function full_update()
    {
        $cart = Cart::instance('shopping')->content();
        if (count($cart) <= 0) {
            return false;
        }
        foreach ($cart as  $item) {
            $options = [];
            $arrayIns = explode(",", $item->options->ins);
            if (count($arrayIns) > 0) {
                foreach (explode(",", $item->options->ins) as  $value) {
                    $exist = ProductIns::where("products_id", $item->id)->where("ins_id", (int) $value)->first();
                    if ($exist) {
                        array_push($options, $value);
                    }
                }
            }
            $this->add__or_update($item->id, $item->qty, implode(",", $options), ['type' => "update"], true);
        }
        return true;
    }
    ///
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
                'image' => $product->path_first,
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
