<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\TipoRol;

class TipoRolUsuario extends Model
{
    use HasFactory;

    protected  $table = 'tipos_roles_usuario';

    protected $hidden = ['id'];

    protected $fillable = [
        'id_usuario',
        'id_tipo_rol',
        'activo'
    ];

    public function tipoRol(): BelongsTo {
    	return $this->belongsTo(TipoRol::class, 'id_tipo_rol');
    }

    public function user(): BelongsTo {
    	return $this->belongsTo(User::class, 'id_usuario');
    }
}
