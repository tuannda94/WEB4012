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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('username');
            $table->timestamp('birthday')->nullable();
            $table->string('phone');
            $table->unsignedInteger('role');
            $table->unsignedInteger('status');
            $table->unsignedBigInteger('room_id');
            // Khoá ngoại là gì, liên kết với trường nào của bảng nào
            // $table->foreign('room_id')->references('id')->on('rooms');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
