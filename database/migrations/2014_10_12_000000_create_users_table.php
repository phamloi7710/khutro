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
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->integer('goidichvu_id')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('job')->nullable();
            $table->string('number_id')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', array('Nam', 'Nữ', 'Khác'))->nullable();
            $table->integer('room_id')->nullable();
            $table->longText('note')->nullable();
            $table->enum('isAdmin', array('true', 'false'))->default('false');
            $table->integer('group_id')->nullable();
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
