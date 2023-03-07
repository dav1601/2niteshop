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
        Cart::instance('shopping')->destroy();
        foreach ($products as  $product) {
            $sub_total = price_product($product, "", ['qty' => 1]);
            Cart::instance('shopping')->add(
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
        Cart::instance('shopping')->store($user->id);
        Cart::instance('shopping')->restore($user->id);
        $total = 0;
        foreach (Cart::instance('shopping')->content() as $cart) {
            $total += $cart->price;
        }
        // lam prov dist ward
        return [
            'name' => $user->name,
            'cart' => serialize(Cart::instance('shopping')->content()),
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
            'status' => 1,
            'paid' => 1,
            'd' => Carbon::now('Asia/Ho_Chi_Minh')->day,
            'm' => Carbon::now('Asia/Ho_Chi_Minh')->month,
            'y' => Carbon::now('Asia/Ho_Chi_Minh')->year,

        ];
    }
}
