<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPendaftar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pendaftar', function (Blueprint $table) {   
            $table->id();
            $table->unsignedBigInteger('id_kelompok');
            $table->unsignedBigInteger('id_mst_lomba');
            $table->enum('status', ['Accept', 'Waiting Approval', 'Decline']);
            $table->foreign('id_kelompok')->references('id')->on('kelompoks');
            $table->foreign('id_mst_lomba')->references('id')->on('master_lomba');
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
        Schema::dropIfExists('data_pendaftar');
    }
}
