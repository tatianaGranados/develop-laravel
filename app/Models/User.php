<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TipoRolUsuario;
use App\Models\UserUnidad;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombres',
        'paterno',
        'materno',
        'genero',
        'email',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipoRolUsuario():HasMany {
        return $this->hasMany(TipoRolUsuario::class,'id_usuario');
    }

    public function userUnidad():HasMany {
        return $this->hasMany(UserUnidad::class,'id_usuario');
    }
}
