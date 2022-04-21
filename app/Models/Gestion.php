<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\GastoConImputacion;
use App\Models\GastoSinImputacion;


class Gestion extends Model
{
    use HasFactory;
    
    protected  $table = 'gestiones';

    protected  $fillable = [
        'gestion',
        'activo'
    ];

    public function gastoConImputacion():HasMany {
        return $this->hasMany(GastoConImputacion::class,'id_gestion');
    }

    public function gastoSinImputacion():HasMany {
        return $this->hasMany(GastoSinImputacion::class,'id_gestion');
    }
}
