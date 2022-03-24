<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthApiAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_api_admin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unique();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('token_api' ,11)->unique();
            $table->integer('security_code');
            $table->timestamp('requested_at')->nullable();
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
        Schema::dropIfExists('auth_api_admin');
    }
}
