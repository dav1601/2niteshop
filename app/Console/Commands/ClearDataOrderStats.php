<?php

namespace App\Console\Commands;

use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Statistics;
use App\Models\ShoppingCart;
use Illuminate\Console\Command;

class ClearDataOrderStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleardata:orderstats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // clear data xong mới migrate
    public function handle()
    {
        ShoppingCart::truncate();
        Orders::truncate();
        Statistics::truncate();
        Customers::truncate();
        $products = Products::all();
        foreach ($products as  $prd) {
            $c1 = $prd->cat_id;
            $c2 = $prd->sub_1_cat_id;
            $c3 = $prd->sub_2_cat_id;
            if ($c1) {
                if (!ProductCategories::where('products_id', $prd->id)->where('category_id', $c1)->first()) {
                    ProductCategories::create([
                        'products_id' => $prd->id,
                        'category_id' => $c1
                    ]);
                }
            }


            if ($c2) {
                if (!ProductCategories::where('products_id', $prd->id)->where('category_id', $c2)->first()) {
                    ProductCategories::create([
                        'products_id' => $prd->id,
                        'category_id' => $c2
                    ]);
                }
            }
            if ($c3) {
                if (!ProductCategories::where('products_id', $prd->id)->where('category_id', $c3)->first()) {
                    ProductCategories::create([
                        'products_id' => $prd->id,
                        'category_id' => $c3
                    ]);
                }
            }
        }
        return $this->info('Cleaned Data');
    }
}
