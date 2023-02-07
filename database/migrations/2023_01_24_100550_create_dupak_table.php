<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDupakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dupak', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->foreignId('jabatan_id');
            $table->string('kota')->nullable();
            $table->foreignId('pak_janjun')->nullable();
            $table->foreignId('pak_juldes')->nullable();
            $table->string('tahun');
            $table->boolean('skp')->nullable()->default(false);
            $table->boolean('verifikasi')->nullable()->default(false);
            $table->string('pangkat')->nullable();
            $table->string('golongan')->nullable();

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
        Schema::dropIfExists('dupak');
    }
}
