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
