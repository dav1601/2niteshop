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
            $table->unsignedBigInteger('image_first')->nullable()->after('main_img');
            $table->foreign('image_first')->references('id')->on('a_media')
                ->onDelete('set null');
            $table->unsignedBigInteger('image_second')->nullable()->after('sub_img');
            $table->foreign('image_second')->references('id')->on('a_media')
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
