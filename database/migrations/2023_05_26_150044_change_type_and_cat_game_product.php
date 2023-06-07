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
            $table->unsignedBigInteger('type')->nullable()->change();
            $table->foreign('type')->references('id')->on('type_product')
                ->onDelete('set null');
            $table->unsignedBigInteger('cat_game_id')->nullable()->change();
            $table->foreign('cat_game_id')->references('id')->on('cat_game')
                ->onDelete('set null');
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
