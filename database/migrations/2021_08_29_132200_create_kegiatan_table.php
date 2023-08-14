<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal');
            $table->unsignedBigInteger('anggota_id');
            $table->unsignedBigInteger('ranting_id');
            $table->string('lokasi');
            $table->string('foto');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('ranting_id')->references('id')->on('ranting');
            $table->foreign('anggota_id')->references('id')->on('anggota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
