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
        // Schema::create('dioses', function (Blueprint $table) {
        //     $table->bigIncrements('id_dios');
        //     $table->unsignedBigInteger('id');
        //     $table->string ('name');
        //     $table->string('sabiduria');
        //     $table->string('nobleza');
        //     $table->string('virtud');
        //     $table->string('maldad');
        //     $table->string('audacia');
        //     $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dios');
    }
};
