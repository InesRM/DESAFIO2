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
     * @author Ines
     */


    public function up()
    {
        Schema::create('humanos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_humano')->primary()->references('id')->on('users')->delete('cascade');
            // $table->string ('name');
            $table->integer('destino')->nullable();
            $table->string('dios-protector')->nullable();
            $table->string('cielo-infierno')->nullable();
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
        Schema::dropIfExists('humanos');
    }
};
