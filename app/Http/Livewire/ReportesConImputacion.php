<?php

namespace App\Http\Livewire;

use App\Models\Gestion;
use App\Models\Unidad;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\UserUnidad;

class ReportesConImputacion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public $gestiones,$id_gestion;
    public $id_unidad,$unidad, $unidades; 

    public $nro_comprobante, $fecha_comprobante, $nro_preventivo, $sello,$beneficiario, $detalle, $nro_cheque, $fecha_cheque, $liquido_pagable, $nro_tomo;


    public function mount()
    {      
        $this->id_gestion = Gestion::orderBy('gestion','desc')->value('id');
    }

    public function render()
    {
        $id_unidad_auth = UserUnidad::where('id_usuario',Auth::user()->id)->value('id_unidad');
        $query = "CAST(nro_comprobante AS DECIMAL(10,0)) DESC";

        $gastos = '';

        if($id_unidad_auth == 12){
            $gastos = DB::table('view_gastos_con_imputacion')->where([['id_gestion',$this->id_gestion],['pagado','SI']])
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
                    ->orderByRaw($query)
                    ->paginate(50);
        }else{
            $gastos = DB::table('view_gastos_con_imputacion')->where([['id_gestion',$this->id_gestion],['id_unidad',$id_unidad_auth],['pagado','SI']])
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
                    ->orderByRaw($query)
                    ->paginate(50);
        }

        $this->gestiones = Gestion::orderby('gestion','desc')->get();
        $this->unidades  = Unidad::Select('nombre_unidad','id')->orderBy('nombre_unidad','asc')->get();

        return view('reportes.gastosConImputacion.list', ['gastos'=> $gastos, 'id_unidad_auth' =>$id_unidad_auth]);
    }

    public function changeEvent($id){
        $this->id_gestion = $id;
    }

    public function show($id)
    {
        $gci = DB::table('view_gastos_con_imputacion')->where('id',$id)->first();
        $this->nro_comprobante   = $gci->nro_comprobante;
        $this->nro_preventivo    = $gci->nro_preventivo;
        $this->fecha_comprobante = $gci->fecha_comprobante;
        $this->sello             = $gci->sello;
        $this->beneficiario      = $gci->beneficiario;
        $this->detalle           = $gci->detalle;
        $this->nro_cheque        = $gci->nro_cheque;
        $this->fecha_cheque      = $gci->fecha_cheque;
        $this->liquido_pagable   = $gci->liquido_pagable;
        $this->nro_tomo          = $gci->nro_tomo;
        $this->unidad            = $gci->nombre_unidad;
    }

    public function resetInput()
    {
        $this->nro_comprobante   ='';
        $this->id_unidad         ='';
        $this->fecha_comprobante ='';
        $this->nro_preventivo    ='';
        $this->sello             ='';
        $this->beneficiario      ='';
        $this->detalle           ='';
        $this->nro_cheque        = null;
        $this->fecha_cheque      = null;
        $this->liquido_pagable   = 0;
        $this->nro_tomo          ='';
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}
