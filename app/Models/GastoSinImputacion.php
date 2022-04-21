<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoSinImputacion extends Model
{
    use HasFactory;

    protected  $table = 'gastos_sin_imputacion';
    
    protected $hidden = ['id'];

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
        'archivado',
        'ult_usuario'
    ];

    public function prestamoDevolucionGsi() {
        return $this->hasMany('App\Models\PrestamoDevolucionGsi','id_gsi');
    }

    public function gestion() {
    	return $this->belongsTo('App\Models\Gestion', 'id_gestion');
    }
}
