<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRelatedPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_posts', function (Blueprint $table) {
            $table->id();
            $table->longText('posts');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('cat_id');
            $table->string('for');
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
        Schema::dropIfExists('related_posts');
    }
}
