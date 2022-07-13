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
use Illuminate\Support\Facades\Auth;


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

    public function getAccesosUserAuthAttribute(){
        $accesos = user::where('users.id',Auth::user()->id)
                        ->join('tipos_roles_user as a','a.id_usuario','=','users.id')
                        ->join('tipos_roles as b','b.id', '=','a.id_tipo_rol')  
                        ->join('accesos as c','c.id_tipo_rol','=','b.id')
                        ->select('c.id_enlace as enlace')
                        ->get();
        
        $accesosUsuario=array();
        foreach ($accesos as $key => $value) {
            $accesosUsuario[$key]=$value->enlace;
        }
        return $accesosUsuario;
    }
}
