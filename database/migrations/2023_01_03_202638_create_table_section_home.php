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
        Schema::create('section_home', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("show_id");
            $table->foreign('show_id')->references('id')->on('show_home')
                ->onDelete('cascade');
            $table->integer("section");
            $table->unsignedBigInteger("category_id");
            $table->foreign('category_id')->references('id')->on('category')
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
        Schema::dropIfExists('section_home');
    }
};
