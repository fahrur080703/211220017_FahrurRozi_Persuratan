<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_surat')->unique()->nullable();
            $table->date('tanggal');
            $table->string('no_surat', 200);
            $table->string('perihal', 150);
            $table->string('tujuan', 50);
            $table->text('isi_surat');
            $table->unsignedInteger('id_tandatangan');
            $table->foreign('id_tandatangan')->references('id_tandatangan')->on('nama_tandatgn');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('user');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_keluar');
    }
}
