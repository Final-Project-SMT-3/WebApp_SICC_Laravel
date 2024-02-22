<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailLomba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_detail_lomba', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mst_lomba');
            $table->longText('detail_lomba');
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('master_detail_lomba');
    }
}
