<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_products', function (Blueprint $table) {
            $table->mediumText("image_700")->nullable()->after('products_id');
            $table->mediumText("image_80")->after('image_700')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_products', function (Blueprint $table) {
            //
        });
    }
};
