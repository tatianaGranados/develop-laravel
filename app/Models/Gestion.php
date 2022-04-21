<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    use HasFactory;
    protected  $table = 'gestiones';

    protected  $fillable = [
        'gestion',
        'activo'
    ];

    public function gastoConImputacion() {
        return $this->hasMany('App\Models\GastoConImputacion','id_gestion');
    }

    public function gastoSinImputacion() {
        return $this->hasMany('App\Models\GastoSinImputacion','id_gestion');
    }
}
