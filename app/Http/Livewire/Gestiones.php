<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gestion;

class Gestiones extends Component
{

    public $gestion, $gestiones, $id_gestion;

    protected function rules()
    {
        return [
            'gestion' => 'required|numeric|min:2000|max:2100|unique:gestiones',
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        Gestion::create($validatedData);
        session()->flash('message','Getion Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
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

        Gestion::where('id',$this->id_gestion)
                ->update(['gestion'=> $validatedData['gestion']]);

        session()->flash('message','Gestión Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function destroy()
    {
        Gestion::find($this->id_gestion)->delete();
        session()->flash('message','Gestión Delete Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->gestion= '';
    }

    public function render()
    {
        $this->gestiones = Gestion::all();
        return view('gestiones.list');
    }
}
