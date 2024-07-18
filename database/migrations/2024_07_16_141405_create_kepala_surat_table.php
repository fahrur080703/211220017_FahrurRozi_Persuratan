<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKepalaSuratTable extends Migration
{
    public function up()
    {
        Schema::create('kepala_surat', function (Blueprint $table) {
            $table->increments('id_kop');
            $table->string('nama_kop', 250);
            $table->text('alamat_kop');
            $table->string('nama_tujuan', 200);
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kepala_surat');
    }
}
