<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoConImputacion extends Model
{
    use HasFactory;

    protected  $table = 'gastos_con_imputacion';

    protected $hidden = ['id'];

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
        'monto_total_cheque',
        'emite_factura',
        'iue',
        'it',
        'total_retencion',
        'total_multas',
        'liquido_pagable',
        'nro_hojas',
        'nro_tomo',
        'observacion_pago',
        'observacion_archivado',
        'enviado_caja',
        'cheque_listo',
        'pagado',
        'archivado',
        'ult_usuario'
    ];

    public function prestamoDevolucionGci() {
        return $this->hasMany('App\Models\PrestamoDevolucionGci','id_gci');
    }

    public function gestion() {
    	return $this->belongsTo('App\Models\Gestion', 'id_gestion');
    }

}
