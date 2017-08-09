<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userInfo', function (Blueprint $table){
            $table->increments('id');
            $table->string('head_image');
            $table->string('user_id')->unique();
            $table->string('name');
            $table->string('nick_name');
            $table->string('sex');
            $table->string('phone_num');
            $table->date('birth_day');
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
        Schema::dropIfExists('userInfo');
    }
}
