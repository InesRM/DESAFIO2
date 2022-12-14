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
        Schema::create('pruebas_resp_libre', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->references('id')->on('pruebas_oraculo')->delete('cascade');
            $table->integer('porcentaje');
            $table->string('palabras_clave');
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
        Schema::dropIfExists('pruebas_resp_libre');
    }
};
