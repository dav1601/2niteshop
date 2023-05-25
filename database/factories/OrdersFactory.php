<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Province;
use App\Models\Ward;
use App\Repositories\DavjCart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\DavjCartInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Orders::class;

    public function definition()
    {
        $user = User::where('id', '!=', 1)->inRandomOrder()->first();
        $products = Products::inRandomOrder()->limit(5)->get();
        $prov = Province::inRandomOrder()->first();
        $dist = District::where("_province_id", $prov->id)->inRandomOrder()->first();
        $ward = Ward::where("_province_id", $prov->id)->where('_district_id', $dist->id)->inRandomOrder()->first();
        foreach ($products as  $product) {
            $sub_total = price_product($product, "", ['qty' => rand(1, 5)]);
            Cart::instance('fake_shopping')->add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => 1,
                    'options' => [
                        'ins' => "",
                        'model' => $product->model,
                        'image' => $product->main_img,
                        'sub_total' => $sub_total,
                        'other' => [],
                        'slug' => $product->slug,
                        'cost' => $product->historical_cost,
                        'discount' => $product->discount
                    ],
                ]
            );
        }
        $total = 0;
        $cart_content = Cart::instance('fake_shopping')->content();
        foreach ($cart_content as $cart) {
            $total += $cart->price * $cart->qty;
        }
        $status = array_rand(config('orders.status'), 1);
        $paid = 1;
        if ($status === 3) {
            $paid = 2;
        }
        Cart::instance('fake_shopping')->destroy();
        // lam prov dist ward
        return [
            'name' => $user->name,
            'cart' => serialize($cart_content),
            'users_id' => $user->id,
            'total' => $total,
            'email' => "niteshopreport@gmail.com",
            'address' => $user->name . " address",
            'prov' => $prov->_name,
            'dist' => $dist->_name,
            'ward' => $ward->_name,
            'payment' => 'cod',
            'note' => $user->name . " note",
            'phone' => $this->faker->numerify('0' . rand(8, 9) . '########'),
            'status' => $status,
            'paid' => $paid,
            'd' => Carbon::now('Asia/Ho_Chi_Minh')->day,
            'm' => Carbon::now('Asia/Ho_Chi_Minh')->month,
            'y' => Carbon::now('Asia/Ho_Chi_Minh')->year,

        ];
    }
}
