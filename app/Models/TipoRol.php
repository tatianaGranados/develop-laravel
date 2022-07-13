<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Acceso;
use App\Models\TipoRolUsuario;

class TipoRol extends Model
{
    use HasFactory;

    protected  $table = 'tipos_roles';
    
    protected  $fillable = [
        'tipo_rol',
        'desc_tipo_usuario'
    ];

    public function acceso() {
        return $this->hasMany(Acceso::class,'id_tipo_rol');
    }

    public function tipoRolUsuario() {
        return $this->hasMany(TipoRolUsuario::class,'id_tipo_rol');
    }
}
