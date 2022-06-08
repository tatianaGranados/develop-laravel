<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewGastosConImputacion extends Migration
{

    public function up()
    {
        DB::statement(
            "CREATE or REPLACE VIEW view_gastos_con_imputacion AS 
            (
                SELECT gi.id, 
                        gi.id_unidad,
                        u.nombre_unidad,
                        gi.id_gestion,
                        g.gestion,
                        gi.nro_comprobante,
                        gi.fecha_comprobante,
                        gi.nro_preventivo,
                        gi.sello,
                        gi.beneficiario,
                        gi.detalle,
                        gi.nro_cheque,
                        gi.fecha_cheque,
                        gi.total_autorizado,
                        gi.emite_factura,
                        gi.iue,
                        gi.it,
                        gi.total_retencion,
                        gi.total_multas,
                        gi.liquido_pagable,
                        gi.total_garantia,
                        gi.nro_hojas,
                        gi.nro_tomo,
                        gi.observacion_pago,
                        gi.observacion_archivado,
                        gi.enviado_caja,
                        gi.cheque_listo,
                        gi.pagado,
                        gi.fecha_entrega_pago,
                        gi.nro_informe,
                        gi.fecha_entrega_informe,
                        gi.enviado_archivo,
                        gi.archivado,
                        gi.fecha_archivado,
                        gi.ult_usuario
                FROM gastos_con_imputacion gi, gestiones g, unidades u
                WHERE gi.id_gestion=g.id
                AND gi.id_unidad = u.id
            )
        ");
    }

    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_gastos_con_imputacion');
    }
}
