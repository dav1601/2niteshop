<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Http\Traits\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    use Product;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orders::truncate();
        Orders::factory()->count(50)->create();
        // foreach (Orders::all() as  $value) {
        //     Orders::where("id", $value->id)->update(['code' => randCodeOrder($value->id)]);
        // }
    }
}
