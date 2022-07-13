<?php

namespace App\Http\Livewire;

use App\Models\GastoConImputacion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestion;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon;

class ArchivadosTomoConImputacion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $gestiones,$id_gestion;
    public $permisos;

    public $fecha_archivado, $tomo;
    public $agrupadoGci = [];

    
    protected function rules()
    {
        return ['tomo'            => 'required',
                'fecha_archivado' => ['required','date'],
                'agrupadoGci'     => 'required',
            ];
    }
    public function messages()
    {
        return [
            'agrupadoGci.required' => 'Debe seleccionar al menos un registro para inserta un nro tomo',
        ];
    }

    public function mount()
    {      
        $this->fecha_archivado = Carbon::now()->toDateString();
        $this->permisos = Auth::user()->AccesosUserAuth;
        $this->id_gestion = Gestion::orderBy('gestion','desc')->value('id');
    }

    public function render()
    {
        $query = "CAST(nro_comprobante AS DECIMAL(10,0)) DESC";
        $gastos = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', $this->id_gestion)
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
                    ->where([['enviado_archivo','SI'],['archivado','NO']])
                    ->orderByRaw($query)
                    ->paginate(50);

        $this->gestiones = Gestion::orderby('gestion','desc')->get();

        if(is_array($this->agrupadoGci)){
            $gastosSelec = DB::table('view_gastos_con_imputacion')
                            ->whereIn('id', $this->agrupadoGci)
                            ->orderBy('nro_comprobante','asc')
                            ->get();

        }else{
            $gastosSelec =[];
        }


        return view('archived.gastosConImputacion.list',['gastos'=>$gastos, 'gastosSelec'=>$gastosSelec]);
    }

    public function changeEvent($id){
        $this->id_gestion = $id;
    }

    public function store()
    {
        $this->validate();
        
        $data = [
            'fecha_archivado'=> $this->fecha_archivado,
            'nro_tomo'           => $this->tomo,
            'archivado'      =>'SI',
            'ult_usuario'    => Auth::User()->username,
        ];

        GastoConImputacion::whereIn('id', $this->agrupadoGci)->update($data);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante agrupados al tomo' .$this->tomo.' con exito ...!!!']);
    }
    public function resetInput()
    {
        $this->tomo            ='';
        $this->agrupadoGci     = [];
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}

