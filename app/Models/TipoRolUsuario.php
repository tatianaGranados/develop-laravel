<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRolUsuario extends Model
{
    use HasFactory;


    use HasFactory;
    protected  $table = 'tipos_roles_usuario';

    protected $fillable = [
        'id_usuario',
        'id_tipo_rol',
        'activo'
    ];

    public function tipoRol() {
    	return $this->belongsTo('App\Models\TipoRol', 'id_tipo_rol');
    }

    public function user() {
    	return $this->belongsTo('App\Models\User', 'id_usuario');
    }
}
