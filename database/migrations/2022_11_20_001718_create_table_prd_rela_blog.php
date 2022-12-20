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
        Schema::create('prd_rela_blog', function (Blueprint $table) {
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products')
                ->onDelete('cascade');
            $table->unsignedBigInteger('blogs_id');
            $table->foreign('blogs_id')->references('id')->on('blogs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prd_rela_blog', function (Blueprint $table) {
            //
        });
    }
};
