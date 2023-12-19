<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstFaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_faq', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan')->nullable();
            $table->string('jawaban')->nullable();
            $table->enum('tipe', ['faq', 'tips']);
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
        Schema::dropIfExists('mst_faq');
    }
}
