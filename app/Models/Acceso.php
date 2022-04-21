<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TipoRol;
use App\Models\Enlace;

class Acceso extends Model
{
    use HasFactory;
    protected  $table = 'accesos';

    protected $fillable = [
        'id_tipo_usuario',
        'id_enlace'
    ];

    protected $hidden = ['id'];

    public function tipoRol():BelongsTo {
    	return $this->belongsTo(TipoRol::class, 'id_tipo_rol');
    }

    public function enlace():BelongsTo {
    	return $this->belongsTo(Enlace::class, 'id_enlace');
    }
}
