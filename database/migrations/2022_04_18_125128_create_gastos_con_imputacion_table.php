<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosConImputacionTable extends Migration
{

    public function up()
    {
        Schema::create('gastos_con_imputacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_unidad');
            $table->integer('id_gestion')->unsigned();
            $table->string('nro_comprobante');
            $table->date('fecha_comprobante');
            $table->string('nro_preventivo');
            $table->string('sello');
            $table->string('beneficiario',200);
            $table->string('detalle',900);
            $table->string('nro_cheque')->nullable();
            $table->date('fecha_cheque')->nullable();
            // $table->decimal('monto_total_cheque')->default(0);
            $table->double('total_autorizado',13,2)->default(0);
            $table->enum('emite_factura',['SI','NO'])->default('NO');
            $table->decimal('iue',12,2)->default(0);
            $table->decimal('it')->default(0);
            $table->decimal('total_retencion')->default(0);
            $table->decimal('total_multas')->default(0);
            $table->double('liquido_pagable',12,2)->default(0);
            $table->double('total_garantia',12,2)->default(0);
            $table->string('nro_hojas')->nullable();
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
        Schema::dropIfExists('gastos_con_imputacion');
    }
}
