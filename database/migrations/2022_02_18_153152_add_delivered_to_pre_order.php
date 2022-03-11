<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveredToPreOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_order', function (Blueprint $table) {
            $table->timestamp('delivery_time')->nullable()->comment('Thời gian nhận hàng');
            $table->tinyInteger('delivered')->default(0)->comment('0:Chưa lấy hàng , 1: Đã lấy hàng , 2:Rút cọc');
            $table->bigInteger('price')->nullable();
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
