<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\UserUnidad;


class Unidad extends Model
{
    use HasFactory;

    protected  $table = 'unidades';

    protected $hidden = ['id'];
    
    protected  $fillable = [
        'nombre_unidad',
        'cod_unidad'
    ];

    public function userUnidad():HasMany {
        return $this->hasMany(UserUnidad::class,'id_unidad');
    }
}
