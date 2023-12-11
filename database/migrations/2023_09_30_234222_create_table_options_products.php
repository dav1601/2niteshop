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
        Schema::create('group_options', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->timestamps();
        });
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("price")->nullable()->default(0);
            $table->string("type")->default("text")->comment("text/image")->nullable();
            $table->unsignedBigInteger("group_id");
            $table->foreign('group_id')->references('id')->on('group_options')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('product_option', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade');
            $table->unsignedBigInteger("option_id");
            $table->foreign('option_id')->references('id')->on('options')
                ->onDelete('cascade');
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
        Schema::dropIfExists('options');
    }
};
