<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_users', function (Blueprint $table) {
            $table->id();
            $table->char('iin', 255)->nullable();
            $table->char('name', 255);
            $table->char('phone_number', 255)->nullable();
            $table->char('email', 255);
            $table->char('password', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('employer')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('order_orders', function (Blueprint $table) {
            $table->id();
            $table->char('status', 255);
            $table->integer('user_id');
            $table->integer('total_price');
            $table->tinyInteger('is_sent')->default(0);
            $table->tinyInteger('is_paid')->default(0);
            $table->char('payment_method', 255)->nullable();
            $table->char('delivery_method', 255)->nullable();
            $table->char('address', 255)->nullable();
            $table->text('additional_information')->nullable();
            $table->integer('delivery_price')->default(0);
            $table->timestamps();
        });
        Schema::create('product_products', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->char('slug', 255);
            $table->char('image_url', 512);
            $table->text('description');
            $table->smallInteger('brand_id')->unsigned();
            $table->smallInteger('category_id')->unsigned();
            $table->smallInteger('subcategory_id')->unsigned();
            $table->integer('amount_left')->default(0);
            $table->integer('price');
            $table->json('attributes');
            $table->timestamps();
        });
        Schema::create('product_brands', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->char('slug', 255);
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->char('slug', 255);
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('product_category_subcategories', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('category_id')->unsigned();
            $table->char('name', 255);
            $table->char('slug', 255);
            $table->text('description');
            $table->json('attributes');
            $table->timestamps();
        });
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('item_id');
            $table->smallInteger('item_amount');
            $table->timestamps();
        });
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->char('role_name', 255);
            $table->text('role_description');
            $table->timestamps();
        });
        Schema::create('admin_roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->integer('permission_name');
            $table->timestamps();
        });
        Schema::create('admin_roles_employers', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->integer('employer_id');
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
        Schema::dropIfExists('user_users');
        Schema::dropIfExists('users');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('orders_items');
        Schema::dropIfExists('items');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('order_orders');
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('product_products');
        Schema::dropIfExists('product_brands');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('product_category_subcategories');
        Schema::dropIfExists('admin_roles');
        Schema::dropIfExists('admin_roles_permissions');
        Schema::dropIfExists('admin_roles_employers');
    }
}
