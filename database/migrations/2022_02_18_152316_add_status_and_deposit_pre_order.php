<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndDepositPreOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_order', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->comment('0: Chưa xử Lý , 1:Đã xử lý');
            $table->tinyInteger('deposit')->default(0)->comment('0: Chưa cọc , 1:Đã cọc , 2:Rút cọc');
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
