<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Unidad;


class UserUnidad extends Model
{
    use HasFactory;

    protected  $table = 'users_unidades';
    
    protected  $fillable = [
        'id_usuario',
        'id_unidad'
    ];

    public function user():BelongsTo {
    	return $this->belongsTo(User::class, 'id_usuario');
    }

    public function unidad():BelongsTo {
    	return $this->belongsTo(Unidad::class, 'id_unidad');
    }
}
