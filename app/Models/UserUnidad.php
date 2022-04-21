<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUnidad extends Model
{
    use HasFactory;

    protected  $table = 'users_unidades';

    protected $hidden = ['id'];
    
    protected  $fillable = [
        'id_usuario',
        'id_unidad'
    ];

    public function user() {
    	return $this->belongsTo('App\Models\User', 'id_usuario');
    }

    public function unidad() {
    	return $this->belongsTo('App\Models\Unidad', 'id_unidad');
    }
}
