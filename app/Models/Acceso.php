<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    use HasFactory;
    protected  $table = 'accesos';

    protected $fillable = [
        'id_tipo_usuario',
        'id_enlace'
    ];

    protected $hidden = ['id'];

    public function tipoRol() {
    	return $this->belongsTo('App\Models\TipoRol', 'id_tipo_rol');
    }

    public function enlace() {
    	return $this->belongsTo('App\Models\Enlace', 'id_enlace');
    }
}
