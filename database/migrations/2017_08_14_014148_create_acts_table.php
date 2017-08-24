<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('content');
            $table->string('privilege'); /*活动优惠*/
            $table->string('head_image');
            $table->string('images');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('counts');
            $table->integer('sale_count');
            $table->integer('status'); /* 活动状态--审核中 0、进行中 1、已结束 2、下架 3 */
            $table->integer('merchant_id')->unsigned()->default(0);
            $table->foreign('merchant_id')->references('id')->on('merchants');
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
        Schema::dropIfExists('acts');
    }
}
