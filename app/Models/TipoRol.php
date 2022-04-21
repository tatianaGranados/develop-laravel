<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRol extends Model
{
    use HasFactory;

    protected  $table = 'tipos_roles';

    protected $hidden = ['id'];
    
    protected  $fillable = [
        'nombre_tipo_usuario',
        'desc_tipo_usuario'
    ];

    public function acceso() {
        return $this->hasMany('App\Models\Acceso','id_tipo_rol');
    }

    public function tipoRolUsuario() {
        return $this->hasMany('App\Models\TipoRolUsuario','id_tipo_rol');
    }
}
