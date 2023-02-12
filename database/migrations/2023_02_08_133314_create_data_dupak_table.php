<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDupakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dupak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pkb_id');
            $table->foreignId('pak_janjun')->nullable();
            $table->foreignId('pak_juldes')->nullable();
            $table->string('tahun')->nullable();
            $table->boolean('verifikasi_pak_janjun')->nullable()->default(false);
            $table->boolean('verifikasi_pak_juldes')->nullable()->default(false);
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_dupak');
    }
}
