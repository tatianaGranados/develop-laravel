<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoDevolucionGsi extends Model
{
    use HasFactory;
    protected  $table = 'prestamos_devoluciones_gsi';

    protected $hidden = ['id'];
    
    protected  $fillable = [
        'id_gsi',
        'unidad_prestada',
        'funcionario',
        'responsable_prestamo',
        'fecha_prestamo',
        'observacion_prestamo',
        'nro_hojas_prest',
        'tomo_prestado',
        'fecha_devolucion',
        'responsable_devolucion',
        'devuelto',
        'obs_devolucion',
        'ult_usuario'
    ];

    public function gastoSinImputacion() {
    	return $this->belongsTo('App\Models\GastoSinImputacion', 'id_gsi');
    }
}
