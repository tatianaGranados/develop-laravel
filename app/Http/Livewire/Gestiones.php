<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gestion;

class Gestiones extends Component
{

    public $gestion, $gestiones, $id_gestion;

    protected function rules()
    {
        return ['gestion' => 'required|numeric|min:2000|max:2100|unique:gestiones'];
    }

    public function render()
    {
        $this->gestiones = Gestion::all();
        return view('gestiones.list');
    }

    public function store()
    {
        $validatedData = $this->validate();

        Gestion::create($validatedData);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'gestion creada con exito ...!!!']);
    }

    public function edit($id)
    {
        $gestion = Gestion::findOrFail($id);
        $this->id_gestion = $gestion->id;
        $this->gestion = $gestion->gestion;
    }

    public function update()
    {
        $validatedData = $this->validate();

        Gestion::where('id',$this->id_gestion)->update(['gestion'=> $validatedData['gestion']]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'gestion actualizada con exito ...!!!']);
    }

    public function destroy()
    {
        Gestion::find($this->id_gestion)->delete();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'gestion Eliminada con exito ...!!!']);
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->gestion= '';
    }
}
