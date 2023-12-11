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
            $table->unsignedBigInteger("media_700")->nullable();
            $table->foreign('media_700')->references('id')->on('a_media')
                ->onDelete('set null');
            $table->unsignedBigInteger("media_80")->nullable();
            $table->foreign('media_80')->references('id')->on('a_media')
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
        Schema::table('gallery_products', function (Blueprint $table) {
            //
        });
    }
};
