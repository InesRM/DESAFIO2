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
        Schema::create('pruebas_puntuales', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->references('id')->on('pruebas')->delete('cascade');
            $table->text('descripcion');
            $table->integer('porcentaje');
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
        Schema::dropIfExists('pruebas_puntuales');
    }
};
