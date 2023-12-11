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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string("method");
            $table->string("icon")->nullable();
            $table->longText("guide")->nullable();
            $table->boolean("active")->default(true);
            $table->timestamps();
        });

        Schema::create('vnpay_config', function (Blueprint $table) {
            $table->id();
            $table->string("vnp_TmnCode");
            $table->string("vnp_HashSecret");
            $table->string("vnp_Url");
            $table->timestamps();
        });

        Schema::create('vnpay_ordered', function (Blueprint $table) {
            $table->id();
            $table->string("vnp_TmnCode");
            $table->longText("vnp_TxnRef")->comment("order code");
            $table->longText("vnp_BankCode")->nullable();
            $table->longText("vnp_BankTranNo")->nullable();
            $table->string("vnp_CardType")->nullable();
            $table->longText("vnp_SecureHash")->nullable();
            $table->longText("vnp_OrderInfo")->nullable();
            $table->bigInteger("vnp_Amount")->nullable();
            $table->bigInteger("vnp_PayDate")->nullable();
            $table->bigInteger("vnp_TransactionNo")->nullable();
            $table->integer("vnp_ResponseCode")->nullable();
            $table->integer("vnp_TransactionStatus")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_payment_methods');
    }
};
