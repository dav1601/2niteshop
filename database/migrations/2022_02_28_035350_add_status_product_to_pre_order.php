<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusProductToPreOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_order', function (Blueprint $table) {
            $table->tinyInteger('status_product')->default(0)->after('status')->comment('0: Hàng chưa có 1: Hàng đã về tới shop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pre_order', function (Blueprint $table) {
            //
        });
    }
}
