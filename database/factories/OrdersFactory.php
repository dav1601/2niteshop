<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ward;
use App\Models\Orders;
use App\Models\Address;
use App\Models\District;
use App\Models\Products;
use App\Models\Province;
use App\Http\Traits\Product;
use App\Repositories\DavjCart;
use Illuminate\Support\Carbon;
use Buihuycuong\Vnfaker\VNFaker;
use Illuminate\Support\Facades\DB;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrdersFactory extends Factory
{
    use Product;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Orders::class;

    public function definition()
    {
        // $users = User::with("address")->where("id", "!=", 1)->orderBy("id", 'asc')->limit(10)->get();
        // $user = collect($users)->random();
        // $address = collect($user->address)->filter(function ($item, $key) {
        //     return $item->def === 1;
        // })->first();
        $users = Address::with("user")->where("def", true)->get();
        $user = collect($users)->random();
        $products = Products::where("status", "=", 1)->inRandomOrder()->limit(5)->get();
        $prov = Province::inRandomOrder()->first();
        $dist = District::where("_province_id", $prov->id)->inRandomOrder()->first();
        $ward = Ward::where("_province_id", $prov->id)->where('_district_id', $dist->id)->inRandomOrder()->first();
        foreach ($products as  $product) {
            $qty = rand(1, (int) $product->qty);
            $sub_total = $this->price_product($product, "", ['qty' => $qty]);
            Cart::instance('fake_shopping')->add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => $qty,
                    'options' => [
                        'ins' => "",
                        'model' => $product->model,
                        'image' => $product->path_first,
                        'sub_total' => $sub_total,
                        'other' => [],
                        'slug' => $product->slug,
                    ],
                ]
            );
        }
        $total = 0;
        $now = Carbon::now();
        $date_s = null;
        $date_ship = null;
        $cart_content = Cart::instance('fake_shopping')->content();
        foreach ($cart_content as $cart) {
            $total += $cart->options->sub_total;
        }
        $status = rand(1, 4);
        $paid = $status === 3 ? 2 : 1;
        $created_at = $now;
        $updated_at = $now;
        if ($status === 3) {
            $date_s = Carbon::create($now)->addDays(5);
            $updated_at = $date_s;
        } else if ($status === 2) {
            $date_ship = Carbon::create($now)->addDays(2);
            $updated_at = $date_ship;
        }
        $note = ["giao hang gio hanh chinh", "giao hang cuoi tuan", "giao hang buoi toi", "giao hang buoi trua", "giao hang buoi sang", "giao hang buoi chieu"];
        Cart::instance('fake_shopping')->destroy();
        // lam prov dist ward
        return [
            'cart' => serialize($cart_content),
            'users_id' => $user->user_id,
            "name" => $user->name,
            'total' => $total,
            'email' => $user->user->email,
            'address' => $user->detail,
            'prov' => $user->prov,
            'dist' => $user->dist,
            'ward' => $user->ward,
            'payment' => 'cod',
            'note' => $note[array_rand($note, 1)],
            'phone' => $user->phone,
            'status' => $status,
            'paid' => $paid,
            "date_ship" => $date_ship,
            "date_s" => $date_s,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ];
    }
}
