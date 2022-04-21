<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected  $table = 'unidades';

    protected $hidden = ['id'];
    
    protected  $fillable = [
        'nombre_unidad',
        'cod_unidad'
    ];

    public function userUnidad() {
        return $this->hasMany('App\Models\UserUnidad','id_unidad');
    }
}
