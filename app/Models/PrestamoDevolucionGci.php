<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoDevolucionGci extends Model
{
    use HasFactory;

    protected  $table = 'prestamos_devoluciones_gci';

    protected $hidden = ['id'];
    
    protected  $fillable = [
        'id_gci',
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

    public function gastoConImputacion() {
    	return $this->belongsTo('App\Models\GastoConImputacion', 'id_gci');
    }
}
