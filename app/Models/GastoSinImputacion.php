<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PrestamoDevolucionGsi;
use App\Models\Gestion;

class GastoSinImputacion extends Model
{
    use HasFactory;

    protected  $table = 'gastos_sin_imputacion';

    protected $fillable = [
        'id_unidad',
        'id_gestion',
        'nro_devengado',
        'fecha_devengado',
        'sello',
        'beneficiario',
        'detalle',
        'nro_cheque',
        'fecha_cheque',
        'liquido_pagable',
        'nro_hojas',
        'nro_tomo',
        'observacion_pago',
        'observacion_archivado',
        'enviado_caja',
        'cheque_listo',
        'pagado',
        'fecha_entrega_pago',
        'nro_informe',
        'enviado_archivo',
        'fecha_entrega_informe',
        'archivado',
        'fecha_archivado',
        'prestado',
        'ult_usuario'
    ];

    public function prestamoDevolucionGsi():HasMany {
        return $this->hasMany(PrestamoDevolucionGsi::class,'id_gsi');
    }

    public function gestion():BelongsTo {
    	return $this->belongsTo(Gestion::class, 'id_gestion');
    }
}
