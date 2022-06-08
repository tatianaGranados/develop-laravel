<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use Carbon\Carbon;

class EnviarCompAlmacen extends Component
{
    public array $agrupadoGci=[];
    public array $agrupadoGsi=[];
    public $repAgrupadosGci;
    public $repAgrupadosGsi;

    public $gastosCi;
    public $gastosSi;
    
    public $nro_informe;
    public $fecha_entrega_informe;
    
    protected function rules()
    {
        return ['nro_informe' => 'required',
                'fecha_entrega_informe' =>'required|date',
            ];
    }
    
    public function mount(){
        $this->fecha_entrega_informe = Carbon::now()->toDateString();
    }
    public function render()
    {
        
        $this->gastosCi = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))
        ->where([['pagado','SI'],['enviado_archivo','NO']])
        ->orderBy('fecha_entrega_pago','asc')
        ->get();

        $this->gastosSi = DB::table('view_gastos_sin_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))
                ->where([['pagado','SI'],['enviado_archivo','NO']])
                ->orderBy('fecha_entrega_pago','asc')
                ->get();

        $this->repAgrupadosGci = DB::table('view_gastos_con_imputacion')->whereIn('id', $this->agrupadoGci)->get();
        $this->repAgrupadosGsi = DB::table('view_gastos_sin_imputacion')->whereIn('id', $this->agrupadoGsi)->get();
       
        return view('enviarCompAlmacen.list');
    }

    public function generarReporte()
    {   
        $this->validate();

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Reporte Generado con exito ...!!!']); 

        
    }


    public function resetInput()
    {
        $this->nro_informe           ='';
        $this->fecha_entrega_informe = Carbon::now()->toDateString();
        $this->agrupadoGci = [];
        $this->agrupadoSci = [];
    }
    
    public function closeModal()
    {
        $this->resetInput();
    }


}
