<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewPagosExterior extends Migration
{
    public function up()
    {
        DB::statement(
            "CREATE or REPLACE VIEW view_pagos_exterior AS 
            (
                SELECT  p.id, 
                        p.id_unidad,
                        u.nombre_unidad,
                        p.id_gestion,
                        g.gestion,
                        p.nro_comprobante,
                        p.fecha_comprobante,
                        p.nro_preventivo,
                        p.sello,
                        p.beneficiario,
                        p.detalle,
                        p.total_autorizado,
                        p.total_retencion,
                        p.liquido_pagable,
                        p.pago_comision,
                        p.pagado,
                        p.enviado_archivo,

                        p.nro_hojas,
                        p.nro_tomo,
                        p.observacion_archivado,
                        p.archivado,
                        p.fecha_archivado,
                        p.ult_usuario

                FROM pagos_exterior p, gestiones g, unidades u
                WHERE p.id_gestion=g.id
                AND p.id_unidad = u.id
            )
        ");
    }
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_pagos_exterior');
    }
}
