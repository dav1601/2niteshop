<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table -> foreign('users_id') -> references('id') -> on('users') -> onDelete('cascade');
            $table -> string('name');
            $table -> string('phone');
            $table -> string('prov');
            $table -> bigInteger('prov_id');
            $table -> string('dist');
            $table -> bigInteger('dist_id');
            $table -> string('ward');
            $table -> bigInteger('ward_id');
            $table->longText('detail');
            $table->longText('map')->nullable();
            $table->tinyInteger('def')->default(0)->comment('1: Default');
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
        Schema::dropIfExists('address');
    }
}
