<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartAndWishlistTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_cart', function (Blueprint $table) {
            $table->id();
            $table->char('status', 255);
            $table->integer('user_id');
            $table->integer('total_price');
            $table->timestamps();
        });

        Schema::create('user_wishlist', function (Blueprint $table) {
            $table->id();
            $table->char('status', 255);
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('user_cart_products', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('item_id');
            $table->smallInteger('item_amount');
            $table->timestamps();
        });

        Schema::create('user_wishlist_products', function (Blueprint $table) {
            $table->id();
            $table->integer('wishlist_id');
            $table->integer('item_id');
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
        Schema::dropIfExists('user_cart');
        Schema::dropIfExists('user_wishlist');
        Schema::dropIfExists('user_cart_products');
        Schema::dropIfExists('user_wishlist_products');
    }
}
