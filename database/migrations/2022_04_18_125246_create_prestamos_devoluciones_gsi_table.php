<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosDevolucionesGsiTable extends Migration
{

    public function up()
    {
        Schema::create('prestamos_devoluciones_gsi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_gsi')->unsigned();
            $table->string('unidad_prestada');
            $table->string('funcionario');
            $table->string('responsable_prestamo');
            $table->date('fecha_prestamo');
            $table->string('observacion_prestamo');
            $table->date('fecha_devolucion')->nullable();
            $table->string('responsable_devolucion')->nullable();
            $table->enum('devuelto',['SI','NO'])->default('NO');
            $table->string('obs_devolucion')->nullable();
            $table->integer('nro_prestamo');
            $table->integer('id_agrupado')->nullable();
            $table->string('ult_usuario');
            $table->timestamps();

            $table->foreign('id_gsi')
                  ->references('id')
                  ->on('gastos_sin_imputacion')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamos_devoluciones_gsi');
    }
}
