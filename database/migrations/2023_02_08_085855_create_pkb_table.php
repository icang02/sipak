<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkb', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 75);
            $table->string('nip', 25)->unique()->nullable();
            $table->foreignId('jabatan_id');
            $table->string('pangkat', 30)->nullable();
            $table->string('golongan', 30)->nullable();
            $table->string('kota', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pkb');
    }
}
