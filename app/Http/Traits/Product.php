<?php

namespace App\Http\Traits;

use Carbon\Carbon;
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
}
