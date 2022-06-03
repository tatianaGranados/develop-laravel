<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewGastosSinImputacion extends Migration
{
    public function up()
    {
        DB::statement(
            "CREATE or REPLACE VIEW view_gastos_sin_imputacion AS 
            (
                SELECT  gi.id, 
                        gi.id_unidad,
                        u.nombre_unidad,
                        gi.id_gestion,
                        g.gestion,
                        gi.nro_devengado,
                        gi.fecha_devengado,
                        gi.sello,
                        gi.beneficiario,
                        gi.detalle,
                        gi.nro_cheque,
                        gi.fecha_cheque,
                        gi.liquido_pagable,
                        gi.nro_hojas,
                        gi.nro_tomo,
                        gi.observacion_pago,
                        gi.observacion_archivado,
                        gi.enviado_caja,
                        gi.cheque_listo,
                        gi.pagado,
                        gi.fecha_entrega_pago,
                        gi.nro_agrupado_entrega,
                        gi.fecha_entrega_agrupado,
                        gi.enviado_archivo,
                        gi.archivado,
                        gi.fecha_archivado,
                        gi.ult_usuario
                FROM gastos_sin_imputacion gi, gestiones g, unidades u
                WHERE gi.id_gestion=g.id
                AND gi.id_unidad = u.id
            )
        ");
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_gastos_sin_imputacion');
    }
}
