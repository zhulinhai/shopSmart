<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nick_name');
            $table->string('head_image');
            $table->string('sex');
            $table->string('phone');
            $table->integer('level')->unsigned()->default(0);
            $table->integer('score')->unsigned()->default(0);
            $table->string('password')->default(MD5('123456'));
            $table->integer('deviceType')->unsigned()->default(0);
            $table->integer('locked')->unsigned()->default(0); /*0 - 正常  1 - 锁定*/
            $table->string('note')->nullable(); /* 备注信息： 如锁定原因、账号异常  */
            $table->date('birthday');
            $table->date('last_login_time');
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
        Schema::dropIfExists('members');
    }
}
