<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Unidad;
use App\Models\UserUnidad;

use Livewire\Component;

class Users extends Component
{
    public $users, $id_user, $user, $nombres, $materno, $paterno, $username, $genero,$email,$password, $password_confirmation;
    public $id_unidad,$unidad, $unidades;
    protected function rules()
    {
        return ['nombres' => 'required|min:2|max:100',
                'paterno' =>'string',
                'materno' =>'string',
                'username'=>'required|unique:users',
                'genero'  =>'required',
                'email'   =>'required|email|required|unique:users',
                'id_unidad'  =>'required',
                'password'=>'required|confirmed|min:6'
            ];
    }

    public function render()
    {
        $this->users= DB::table('view_users_data')->orderBy('paterno','asc')->get();
        $this->unidades = Unidad::all()->pluck('nombre_unidad','id');

        return view('users.list');

    }

    public function store()
    {
        $validatedData = $this->validate();

        $user = User::create($validatedData);
        $user ->password = bcrypt($this->password);
        $user->save();

        $user_unid = new UserUnidad();
        $user_unid -> id_usuario = $user->id;
        $user_unid -> id_unidad  = $this->id_unidad;
        $user_unid -> save();

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Usuario creada con exito ...!!!']);
    }

    public function edit($id)
    {
        $user = DB::table('view_users_data')->find($id);
        $this->id_usuario            = $user->id_usuario;
        $this->nombres               = $user->nombres;
        $this->paterno               = $user->paterno;
        $this->materno               = $user->materno;
        $this->username              = $user->username;
        $this->genero                = $user->genero;
        $this->email                 = $user->email;
        $this->id_unidad             = $user->id_unidad;
        $this->password              = $user->password;
        $this->password_confirmation = $user->password;

    }

    public function resetInput()
    {
        $this->nombres               ='';
        $this->paterno               ='';
        $this->materno               ='';
        $this->username              ='';
        $this->genero                ='';
        $this->email                 ='';
        $this->id_unidad             ='';
        $this->password              ='';
        $this->password_confirmation ='';
        
    }

    public function closeModal()
    {
        $this->resetInput();
    }

}