<?php

use App\Models\Products;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['cat_id']);
            $table->dropColumn('cat_id');
            $table->dropForeign(['sub_1_cat_id']);
            $table->dropColumn('sub_1_cat_id');
            $table->dropColumn('sub_2_cat_id');
            $table->dropColumn('cat_name');
            $table->dropColumn('sub_2_cat_name');
            $table->dropColumn('sub_1_cat_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
