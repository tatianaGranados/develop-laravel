<?php

namespace App\Http\Livewire;

use App\Models\GastoConImputacion;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;

class EnviarCompAlmacen extends Component
{
    public $agrupadoGci=[];
    public $agrupadoSci=[];
    public $nro_informe;
    public $fecha_entrega_informe;

    public function mount()
    {      
        
    }
    
    public function render()
    {
        $gastosCi = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))
                    ->where([['pagado','SI'],['enviado_archivo','NO']])
                    ->orderBy('fecha_entrega_pago','desc')
                    ->get();
        
        $gastosSi = DB::table('view_gastos_sin_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))
                    ->where([['pagado','SI'],['enviado_archivo','NO']])
                    ->orderBy('fecha_entrega_pago','desc')
                    ->get();

        
        return view('enviarCompAlmacen.list', ['gastosCi'=>$gastosCi,'gastosSi'=>$gastosSi]);
    }

    public function generarReporte()
    {

    }
    
    public function closeModal()
    {
        $this->nro_informe           ='';
        $this->fecha_entrega_informe =''; 
        $this->agrupadoGci = '';
        $this->agrupadoSci = '';
    }


}
