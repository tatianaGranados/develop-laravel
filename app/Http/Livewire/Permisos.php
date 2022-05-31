<?php

namespace App\Http\Livewire;

use App\Models\TipoRol;
use Livewire\Component;

class Permisos extends Component
{
    public $roles;

    public function render()
    {
        $this->roles = TipoRol::all(); 
        return view('permisos.list');
    }

    public function storePer(){

    }

    public function editPer(){

    }


    public function resetInput()
    {
       
        
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
