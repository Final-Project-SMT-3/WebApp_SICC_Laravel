<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PelaksanaanLomba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaksanaan_lomba', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mst_lomba');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('info');
            $table->enum('status', ['Soon', 'On Going', 'Done']);
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
        Schema::dropIfExists('pelaksanaan_lomba');
    }
}
