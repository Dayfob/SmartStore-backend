<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('admin_employers')) {
            Schema::create('admin_employers',
                function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->string('email');
                    $table->string('name')->nullable();
                    $table->string('password');
                    $table->string('avatar')->nullable();
                    $table->string('remember_token')->nullable();
                    $table->string('phone_number', 20)->unique()->nullable();

                    $table->timestamp('email_verified_at')->nullable();
                    $table->timestamp('phone_number_verified_at')->nullable();

                    $table->string('telegram_id')->nullable();
                    $table->boolean('is_telegram_enabled')->default(false);

                    $table->index('email');
                    $table->index('phone_number');

                    $table->softDeletes();
                    $table->timestamps();
                }
            );
        }
    }

    public function down()
    {
        Schema::dropIfExists('admin_employers');
    }
}
