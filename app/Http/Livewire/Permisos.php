<?php

namespace App\Http\Livewire;

use App\Models\Acceso;
use App\Models\TipoRol;
use Livewire\Component;
use App\Models\Enlace;
use Illuminate\Validation\Rule;

class Permisos extends Component
{
    
    public $id_tipo_rol;
    public $tipo_rol;
    public $desc_tipo_rol;
    public $permisos = [];
    public $per;
    public $accesos;
    
    public $roles;
    public $enlaceUsuarios;
    public $enlacePermisos;
 

    protected function rules()
    {
        return ['tipo_rol' => ['required',Rule::unique('tipos_roles')->ignore($this->id_tipo_rol ?? null)],
                'desc_tipo_rol' =>'required'
            ];
    }

    public function mount()
    {      
        $this-> accesos = Acceso::select('accesos.id_tipo_rol','accesos.id_enlace','enlaces.nombre_enlace','enlaces.icono','enlaces.tipo_acceso')
                                ->join('enlaces', 'enlaces.id','=','accesos.id_enlace')
                                ->get();
    }
    
    public function render()
    {
        $this->roles = TipoRol::all(); 

        $this->enlaceUsuarios  = Enlace::where('tipo_acceso',1)->get();
        $this->enlacePermisos  = Enlace::where('tipo_acceso',2)->get();
        // $enlaceGestiones    = Enlace::where('tipo_acceso',2)->get();
        // $enlaceGastosConImp = Enlace::where('tipo_acceso',3)->get();
        // $enlaceGastosSinImp = Enlace::where('tipo_acceso',4)->get();
        // $enlacePresDev      = Enlace::where('tipo_acceso',5)->get();
        // $enlacePermisos     = Enlace::where('tipo_acceso',7)->get();

        return view('permisos.list');
    }

    public function storePer()
    {
        $validatedData = $this->validate();

        $rol = TipoRol::create($validatedData);
        $rol -> tipo_rol      = $this-> tipo_rol;
        $rol -> desc_tipo_rol = $this-> desc_tipo_rol;
        $rol -> save();

        if(is_array($this->permisos)){
            foreach ($this->permisos as $permiso) {
                $acceso = new Acceso();
                $acceso -> id_tipo_rol = $rol->id;
                $acceso -> id_enlace   = $permiso;
                $acceso->save();
            }
        }

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Rol Creado con exito ...!!!']);
    }

    public function showPer($id)
    {

        $rol =  TipoRol::where('id',$id)->first();
        $this -> tipo_rol      = $rol-> tipo_rol;
        $this -> desc_tipo_rol = $rol-> desc_tipo_rol;
        $this -> id_tipo_rol   =  $id;

        $this-> accesos = Acceso::select('accesos.id_tipo_rol','accesos.id_enlace','enlaces.nombre_enlace','enlaces.icono','enlaces.tipo_acceso')
                                ->join('enlaces', 'enlaces.id','=','accesos.id_enlace')
                                ->get();
    }

    public function editPer($id)
    {
        $rol =  TipoRol::where('id',$id)->first();
        $this -> id_tipo_rol   =  $id;
        $this -> tipo_rol      = $rol-> tipo_rol;
        $this -> desc_tipo_rol = $rol-> desc_tipo_rol;

        $this->accesos = Acceso::where('id_tipo_rol', $id)->get();
    }

    public function updatePer()
    {
        
        Acceso::where('id_tipo_rol', $this->id_tipo_rol)->delete();
        
        if(is_array($this->permisos)){
            foreach ($this->permisos as $permiso) {
                $acceso = new Acceso();
                $acceso -> id_tipo_rol = $this -> id_tipo_rol;
                $acceso -> id_enlace   = $permiso;
                $acceso->save();
            }
        }
        
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Rol Modificado con exito ...!!!']);     
    }

    public function destroy()
    {
        TipoRol::find($this->id_tipo_rol)->delete();
            $this->dispatchBrowserEvent('close-modal');
            $this->dispatchBrowserEvent('alert',['message'=>'Rol Eliminado con exito ...!!!']); 
    }

    public function resetInput()
    {
        $this->tipo_rol      ='';
        $this->desc_tipo_rol ='';
        $this->permisos      = [];
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
