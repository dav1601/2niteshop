<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use App\Models\Products;
use App\Models\Insurance;

trait Product
{

    protected function statusProduct($date_sold, $qty)
    {
        $status = $qty <= 0 ? 2 : 1;
        return strtotime($date_sold) >= strtotime(Carbon::now()) ? 3 : $status;
    }

    protected function price_product($product,  $ops = "", $options = ['qty' => 1])
    {
        $qty = (int) $options['qty'];
        $price = (int) ($product->price - $product->discount);
        $arrIns = explode(",", $ops);
        if (count($arrIns) > 0) {
            foreach ($arrIns as  $ins_id) {
                $item = Insurance::where('id', $ins_id)->first();
                if ($item) {
                    $price += (int) $item->price;
                }
            }
        }
        return (int)$price * $qty;
    }
    protected function deliver($cart)
    {
        if (!$cart) {
            return false;
        }
        try {
            foreach ($cart as  $item) {
                $product = Products::select(['id', 'qty', 'date_sold'])->where("id", $item->id)->firstOrFail();
                $currentQty = (int) $product->qty;
                $cartQty = (int) $item->qty;
                $deliverQty = (int)  $currentQty - $cartQty;
                Products::where("id", $product->id)->update(["qty" => $deliverQty, "status" => $this->statusProduct($product->date_sold, $deliverQty)]);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    protected function return_orders($cart)
    {
        if (!$cart) {
            return false;
        }
        try {
            foreach ($cart as  $item) {
                $product = Products::select(['id', 'qty', 'date_sold'])->where("id", $item->id)->firstOrFail();
                $currentQty = (int) $product->qty;
                $cartQty = (int) $item->qty;
                $returnQty = (int) $cartQty + $currentQty;
                Products::where("id", $product->id)->update(["qty" => $returnQty, "status" => $this->statusProduct($product->date_sold, $returnQty)]);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
