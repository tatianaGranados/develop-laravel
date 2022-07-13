<?php

namespace App\Http\Livewire;

use App\Models\TipoRol;
use App\Models\TipoRolUsuario;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserUnidad;
use App\Models\Unidad;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_user, $user, $nombres, $materno, $paterno, $username, $genero,$email,$password, $password_confirmation;
    public $id_unidad,$unidad, $unidades, $roles, $id_tipo_rol, $tipo_rol, $id_tipo_user;

    public $search = '';

    protected function rules()
    {
        return ['nombres' => 'required|min:2|max:100',
                'paterno' =>'string',
                'materno' =>'string',
                'username'=>['required',Rule::unique('users')->ignore($this->id_user ?? null)],
                'genero'  =>'required',
                'email'   => ['required','email', Rule::unique('users')->ignore($this->id_user ?? null)],
                'id_unidad'  =>'required',
                'password'=>'required|confirmed|min:6'
            ];
    }

    public function render()
    {
        $users = DB::table('view_users_data')->where('nombres', 'like', '%'.$this->search.'%')
                                            ->orderBy('paterno','asc')
                                            ->paginate(30);

        $tipo_roles = TipoRolUsuario::select('tipos_roles_user.id','tipos_roles_user.id_usuario', 'tipos_roles_user.id_tipo_rol','tipos_roles.tipo_rol')
                                    ->join('tipos_roles', 'tipos_roles.id','=','tipos_roles_user.id_tipo_rol')
                                    ->get();

        $this->unidades = Unidad::all()->pluck('nombre_unidad','id');
        $this->roles = TipoRol::all()->pluck('tipo_rol','id');
        $permisos = Auth::user()->AccesosUserAuth;

        return view('users.list', ['users' => $users, 'tipo_roles'=>$tipo_roles, 'permisos'=>$permisos]);
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

    public function show($id){
        $user =  DB::table('view_users_data')->where('id_usuario', $id)->first();
        $this->id_user  = $user->id_usuario;
        $this->nombres  = $user->nombres;
        $this->paterno  = $user->paterno;
        $this->materno  = $user->materno;
        $this->username = $user->username;
        $this->genero   = $user->genero;
        $this->email    = $user->email;
        $this->unidad   = $user->nombre_unidad;
    }

    public function edit($id)
    {
        $user =  DB::table('view_users_data')->where('id_usuario', $id)->first();
        $this->id_user               = $user->id_usuario;
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

    public function update()
    {
        $validatedData = $this->validate();

        User::where('id',$this->id_user)->update([
            'nombres'  => $validatedData['nombres'],
            'paterno'  => $validatedData['paterno'],
            'materno'  => $validatedData['materno'],
            'genero'   => $validatedData['genero'],
            'email'    => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password'])
        ]);

        $user_unid = UserUnidad::where('id_usuario',$this->id_user)->first();

        if(empty($user_unid)){
            $user_unid = new UserUnidad();
            $user_unid -> id_usuario = $this->id_user;
            $user_unid -> id_unidad  = $this->id_unidad;
            $user_unid -> save();
        }else{
            $user_unid -> id_unidad  = $this->id_unidad;
            $user_unid -> update();
        }

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Usuario'.$this->nombres.' actualizado con exito ...!!!']);
    }

    public function destroy()
    {
        
        if(Auth::User()->id == $this->id_user){
            $this->dispatchBrowserEvent('error',['message'=>'No puede eliminarse a uno mismo ...!!!']);
        }else{
            User::find($this->id_user)->delete();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('alert',['message'=>'Usuario Eliminado con exito ...!!!']);    
        }
    }

    public function showRol($id){
        $user =  DB::table('view_users_data')->where('id_usuario', $id)->first();
        $this->id_user = $user->id_usuario;  
    }
    public function storeRol()
    {
        $role_exists = TipoRolUsuario::where([['id_usuario',$this->id_user],['id_tipo_rol',$this->id_tipo_rol]])->get();

        if( $role_exists->isEmpty()){
            $userRol =  new TipoRolUsuario();
            $userRol -> id_usuario =  $this->id_user;
            $userRol -> id_tipo_rol=  $this->id_tipo_rol;
            $userRol->save();
            $this->dispatchBrowserEvent('alert',['message'=>'Rol asignado con exito ...!!!']);
        }else{
            $this->dispatchBrowserEvent('error',['message'=>'Usuario ya Asignado a ese rol ...!!!']);
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal'); 
    }

    public function editRol($id){
        $user_rol = TipoRolUsuario::findOrFail($id);
        $this->id_tipo_user = $user_rol->id;
        $this->id_tipo_rol  = $user_rol->id_tipo_rol;
        $this->id_user      = $user_rol->id_usuario;
    }

    public function updateRol()
    {
        $validatedData = $this->validate(
            ['id_tipo_rol' => 'required']
        );

        $role_exists = TipoRolUsuario::where([['id_usuario',$this->id_user],['id_tipo_rol',$this->id_tipo_rol]])->get();

        if( $role_exists->isEmpty())
        {
            TipoRolUsuario::where('id',$this->id_tipo_user)
                            ->update(['id_tipo_rol'  => $validatedData['id_tipo_rol']]);
            
            $this->dispatchBrowserEvent('alert',['message'=>'Rol modificado con exito ...!!!']);

        }else{
            $this->dispatchBrowserEvent('error',['message'=>'Usuario ya Asignado a ese rol ...!!!']);
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal'); 
    }

    public function deleteRol(){
        TipoRolUsuario::find($this->id_tipo_user)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Rol Eliminado con exito ...!!!']); 
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