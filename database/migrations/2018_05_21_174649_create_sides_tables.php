<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('cate_slide_id')->unsigned()->nullable();
            $table->string('image');
            $table->boolean('status')->default(0);
            $table->integer('position')->unique()->nullable();
            $table->foreign('cate_slide_id')->references('id')->on('cate_slides')->onDelete('cascade');
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
        Schema::dropIfExists('sides');
    }
}
