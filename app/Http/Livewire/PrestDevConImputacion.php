<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GastoConImputacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use Livewire\WithPagination;

class PrestDevConImputacion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $gestiones,$id_gestion;

    public function mount()
    {      
        $this->permisos = Auth::user()->AccesosUserAuth;
        $this->id_gestion = Gestion::orderBy('gestion','desc')->value('id');
    }
    
    public function render()
    {
        
        $gastos = DB::table('view_gastos_con_imputacion')->where([['id_gestion','=', $this->id_gestion],['enviado_archivo','=','SI']])
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_comprobante','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_preventivo','LIKE', '%' . $this->search. '%')
                        ->orWhere('sello','LIKE', '%' . $this->search. '%')
                        ->orWhere('beneficiario','LIKE', '%' . $this->search. '%')
                        ->orWhere('detalle','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_cheque','LIKE', '%' . $this->search. '%')
                        ->orWhere('liquido_pagable','LIKE', '%' . $this->search. '%')
                        ->orWhere('nombre_unidad','LIKE', '%' . $this->search. '%');
                    })
                    ->orderBy('nro_comprobante','desc')
                    ->paginate(50);

        $this->gestiones = Gestion::orderby('gestion','desc')->get();

        return view('prestamosDevoluciones.gastosConImputacion.list',['gasto'=>$gastos]);
    }

    public function changeEvent($id)
    {
        $this->id_gestion = $id;
        $this->compUtimo($id);
    }


    public function resetInput()
    {
        $this->unidad_prestada      ='';
        $this->funcionario          ='';
        $this->responsable_prestamo ='';
        $this->fecha_prestamo       ='';
        $this->observacion_prestamo ='';
        $this->observacion_prestamo ='';
        $this->observacion_prestamo ='';
       
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }

}
