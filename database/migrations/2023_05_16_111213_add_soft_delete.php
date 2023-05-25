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
        
        Schema::table('page_builder', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('category', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('statistics', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropSoftDeletes();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('page_builder', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('category', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('customers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
