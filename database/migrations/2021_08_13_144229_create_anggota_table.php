<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('no_anggota')->nullable();
            $table->unsignedBigInteger('ranting_id');
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->BigInteger('tg_badan');
            $table->string('tp_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('pkd');
            $table->string('rekom')->nullable();
            $table->string('kta')->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ranting_id')->references('id')->on('ranting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
