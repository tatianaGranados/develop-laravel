<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosSinImputacionTable extends Migration
{

    public function up()
    {
        Schema::create('gastos_sin_imputacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unidad');
            $table->integer('id_gestion')->unsigned();
            $table->string('nro_comprobante');
            $table->string('nro_devengado');
            $table->date('fecha_devengado');
            $table->string('sello');
            $table->string('beneficiario');
            $table->string('detalle');
            $table->string('nro_cheque')->nullable();
            $table->date('fecha_cheque')->nullable();
            $table->decimal('liquido_pagable')->default(0);
            $table->integer('nro_hojas')->nullable();
            $table->string('nro_tomo')->nullable();
            $table->string('observacion_pago')->nullable();
            $table->string('observacion_archivado')->nullable();
            $table->enum('enviado_caja',['SI','NO'])->default('NO');
            $table->enum('cheque_listo',['SI','NO'])->default('NO');
            $table->enum('pagado',['SI','NO'])->default('NO');
            $table->date('fecha_entrega_pago')->nullable();
            $table->string('nro_informe')->nullable();
            $table->date('fecha_entrega_informe')->nullable();
            $table->enum('enviado_archivo',['SI','NO'])->default('NO');
            $table->enum('archivado',['SI','NO'])->default('NO');
            $table->date('fecha_archivado')->nullable();
            $table->enum('prestado',['SI','NO'])->default('NO');
            $table->string('ult_usuario');
            $table->timestamps();

            $table->foreign('id_gestion')
                  ->references('id')
                  ->on('gestiones')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gastos_sin_imputacion');
    }
}
