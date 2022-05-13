<?php

namespace App\Http\Controllers;

use App\Models\TipoRol;
use App\Models\User;
use App\Models\UserUnidad;
use App\Models\TipoRolUsuario;
use App\Models\Unidad;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $model)
    {
        $users = User::select('users.nombres',
                            'users.paterno',
                            'users.materno',
                            'users.username',
                            'uni.nombre_unidad',
                            'roles.tipo_rol')
                        ->leftjoin('users_unidades as unid','users.id','=','unid.id_usuario')
                        ->leftjoin('unidades as uni','uni.id','=','unid.id_unidad')
                        ->leftjoin('tipos_roles_user as tipo','users.id','=','tipo.id_usuario')
                        ->leftjoin('tipos_roles as roles','tipo.id_tipo_rol','=','roles.id')
                        ->get();
        return view('users.index',compact('users') ,['users' => $model->paginate(15)]);
    }
}
