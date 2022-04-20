<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnlacesTable extends Migration
{

    public function up()
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_enlace',70);
            $table->string('ruta',150);
            $table->string('icono',100);
            $table->string('descripcion')->nullable();
            $table->integer('tipo_acceso');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enlaces');
    }
}
