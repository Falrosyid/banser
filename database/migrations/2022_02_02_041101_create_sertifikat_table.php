<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('tempat')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('anggota_id');
            $table->timestamps();

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
        Schema::dropIfExists('sertifikat');
    }
}
