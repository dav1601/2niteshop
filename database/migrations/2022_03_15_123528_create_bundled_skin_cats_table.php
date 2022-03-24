<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundledSkinCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundled_skin_cats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skin_cat_id');
            $table->foreign('skin_cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->unsignedBigInteger('cat_id')->unique();
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
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
        Schema::dropIfExists('bundled_skin_cats');
    }
}
