<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Acceso;


class Enlace extends Model
{
    use HasFactory;

    protected  $table = 'enlaces';
    
    protected  $fillable = [
        'nombre_enlace',
        'ruta',
        'icono',
        'descripcion'
    ];


    public function acceso():HasMany {
        return $this->hasMany(Acceso::class,'id_enlace');
    }
}
