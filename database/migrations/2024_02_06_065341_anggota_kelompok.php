<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnggotaKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_kelompoks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelompok')->nullable();
            $table->string('nama_anggota');
            $table->string('nim_anggota');
            $table->string('prodi_ketua');
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
        Schema::dropIfExists('anggota_kelompoks');
    }
}
