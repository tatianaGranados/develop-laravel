<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GastoSinImputacion;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrestamoDevolucionGsi extends Model
{
    use HasFactory;
    protected  $table = 'prestamos_devoluciones_gsi';
    
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
        'id_agrupado',
        'ult_usuario'
    ];

    public function gastoSinImputacion():BelongsTo {
    	return $this->belongsTo(GastoSinImputacion::class, 'id_gsi');
    }
}
