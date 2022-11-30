<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas_eleccion', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->references('id')->on('pruebas_oraculo')->delete('cascade');
            $table->string('respuestaCorrecta');
            $table->string('respuestaIncorrecta');
            $table->string('atributo');
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
        Schema::dropIfExists('pruebas_eleccion');
    }
};
