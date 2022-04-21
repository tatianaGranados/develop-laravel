<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function acceso() {
        return $this->hasMany('App\Models\Acceso','id_enlace');
    }
}
