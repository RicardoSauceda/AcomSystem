<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiberadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liberados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('usuario');
            $table->string('proyecto');
            $table->string('codigo');
            $table->string('id_sol');
            $table->string('id_alum');
            $table->string('tipo');
            $table->string('credito');
            $table->string('id_creo');
            $table->string('calificacion');
            $table->binary('archivo');
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
        Schema::dropIfExists('liberados');
    }
}
