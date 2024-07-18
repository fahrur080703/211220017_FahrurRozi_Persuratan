<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasukTable extends Migration
{
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_kop');
            $table->foreign('id_kop')->references('id_kop')->on('kepala_surat');
            $table->date('tanggal');
            $table->string('no_surat', 50);
            $table->string('asal_surat', 150);
            $table->string('perihal', 150);
            $table->string('disp1', 70);
            $table->string('disp2', 70);
            $table->unsignedInteger('id_tandatangan');
            $table->foreign('id_tandatangan')->references('id_tandatangan')->on('nama_tandatgn');
            $table->string('image', 60);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_masuk');
    }
}
