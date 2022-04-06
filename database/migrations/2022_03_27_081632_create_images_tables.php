<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->string('image', 255);
            $table->timestamps();
        });
        Schema::create('user_images', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('image');
            $table->timestamps();
        });
        Schema::create('product_brand_images', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->unsigned();
            $table->string('image');
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
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('user_images');
        Schema::dropIfExists('product_brand_images');
    }
}
