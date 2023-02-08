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
            $table->boolean('skp')->nullable()->default(false);
            $table->boolean('verifikasi')->nullable()->default(false);
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
