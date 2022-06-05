<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosExteriorTable extends Migration
{
    public function up()
    {
        Schema::create('pagos_exterior', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unidad');
            $table->integer('id_gestion')->unsigned();
            $table->string('nro_comprobante');
            $table->date('fecha_comprobante');
            $table->string('nro_preventivo');
            $table->string('sello');
            $table->string('beneficiario');
            $table->string('detalle');
            $table->double('total_autorizado',13,2)->default(0);
            $table->decimal('total_retencion')->default(0);
            $table->decimal('liquido_pagable')->default(0);
            $table->decimal('pago_comision')->default(0);
            $table->enum('pagado',['SI','NO'])->default('NO');
            $table->date('fecha_entrega_pago')->nullable();
            $table->string('observacion_pago')->nullable();
            $table->enum('enviado_archivo',['SI','NO'])->default('NO');
            
            $table->integer('nro_hojas')->nullable();
            $table->string('nro_tomo')->nullable();
            $table->string('observacion_archivado')->nullable();
            $table->enum('archivado',['SI','NO'])->default('NO');
            $table->date('fecha_archivado')->nullable();
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
        Schema::dropIfExists('pagos_exterior');
    }
}
