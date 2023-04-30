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
        Schema::create('pgb_blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("blogs_id");
            $table->foreign('blogs_id')->references('id')->on('blogs')
                ->onDelete('cascade');
            $table->unsignedBigInteger("pgb_id");
            $table->foreign('pgb_id')->references('id')->on('page_builder')
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
        Schema::dropIfExists('pgb_blog');
    }
};
