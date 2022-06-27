<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Gestion;

class PagoExterior extends Model
{
    use HasFactory;
    protected  $table = 'pagos_exterior';

    protected $fillable = [
        'id_unidad',
        'id_gestion',
        'nro_comprobante',
        'fecha_comprobante',
        'nro_preventivo',
        'sello',
        'beneficiario',
        'detalle',
        'total_autorizado',
        'total_retencion',
        'liquido_pagable',
        'pago_comision',
        'pagado',
        'fecha_entrega_pago',
        'observacion_pago',
        'enviado_archivo',
        'nro_hojas',
        'nro_tomo',
        'observacion_archivado',
        'archivado',
        'fecha_archivado',
        'prestado',
        'ult_usuario'
    ];

    public function prestamoDevolucionExterior():HasMany  {
        return $this->hasMany(PrestamoDevolucionExterior::class,'id_pago_exterior');
    }

    public function gestion():BelongsTo {
    	return $this->belongsTo(Gestion::class, 'id_gestion');
    }
}
