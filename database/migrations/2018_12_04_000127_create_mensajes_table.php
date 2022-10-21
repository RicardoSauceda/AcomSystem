<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id_MSG');
            $table->string('proyecto');
            $table->string('codigo');
              $table->string('profesor');
            $table->integer('id_sol');
            $table->string('nombre');
            $table->string('usuario');
            $table->integer('id_alum');
            $table->integer('id_creo');
            $table->text('msg_profesor');
            $table->text('msg_alumno');
            $table->integer('contador');
            $table->string('tipo_MSG');
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
        Schema::dropIfExists('mensajes');
    }
}
