<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PrestamoDevolucionGci;
use App\Models\Gestion;


class GastoConImputacion extends Model
{
    use HasFactory;

    protected  $table = 'gastos_con_imputacion';

    protected $fillable = [
        'id_unidad',
        'id_gestion',
        'nro_comprobante',
        'fecha_comprobante',
        'nro_preventivo',
        'sello',
        'beneficiario',
        'detalle',
        'nro_cheque',
        'fecha_cheque',
        // 'monto_total_cheque',
        'emite_factura',
        'iue',
        'it',
        'total_retencion',
        'total_multas',
        'liquido_pagable',
        'total_garantia',
        'nro_hojas',
        'nro_tomo',
        'observacion_pago',
        'observacion_archivado',
        'enviado_caja',
        'cheque_listo',
        'pagado',
        'fecha_entrega_pago',
        'nro_agrupado_entrega',
        'archivado',
        'fecha_archivado',
        'ult_usuario'
    ];

    public function prestamoDevolucionGci():HasMany  {
        return $this->hasMany(PrestamoDevolucionGci::class,'id_gci');
    }

    public function gestion():BelongsTo {
    	return $this->belongsTo(Gestion::class, 'id_gestion');
    }

}
