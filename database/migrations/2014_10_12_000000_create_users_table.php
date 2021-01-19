<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('name_user');
            $table->string('email_user')->unique();
            $table->string('password_user');
            $table->integer('admin_user');
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
