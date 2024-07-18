<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username', 50);
            $table->string('password', 150);
            $table->string('status', 7);
            $table->string('nama_ptgs', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
}
