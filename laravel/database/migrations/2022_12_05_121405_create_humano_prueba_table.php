<?php
// Mario
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
        Schema::create('humano_prueba', function (Blueprint $table) {
            $table->unsignedBigInteger('idHumano')->references('id')->on('users')->delete('cascade');
            $table->unsignedBigInteger('idPrueba')->references('id')->on('pruebas')->delete('cascade');
            $table->enum('tipo', ['puntual', 'eleccion', 'respLibre', 'valoracion']);
            $table->primary(['idHumano', 'idPrueba']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('humano_prueba');
    }
};
