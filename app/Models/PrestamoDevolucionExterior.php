<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PagoExterior;

class PrestamoDevolucionExterior extends Model
{
    use HasFactory;
    protected  $table = 'prestamos_devoluciones_exterior';
    
    protected  $fillable = [
        'id_pago_exterior',
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
    public function pagoExterior():BelongsTo {
    	return $this->belongsTo(PagoExterior::class, 'id_pago_exterior');
    }
}
