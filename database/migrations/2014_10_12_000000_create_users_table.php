<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('schools_id');
            $table->integer('programs_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('avatar')->default('default.jpg');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('startYear')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('education')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
