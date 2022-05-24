<?php

namespace App\Http\Livewire;

use App\Models\Gestion;
use Livewire\Component;

class GastosConImp extends Component
{
    public $gestiones;

    public function render()
    {
        $this->gestiones = Gestion::all();
        return view('gastosConImputacion.list');
    }
}
