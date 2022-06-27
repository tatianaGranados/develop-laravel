<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use Carbon\Carbon;
use App\Models\GastoConImputacion;
use App\Models\GastoSinImputacion;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use PDF;

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

    public $informes;
    
    protected function rules()
    {
        return ['nro_informe' => ['required',Rule::unique('gastos_con_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))],
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

        $this->informes = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))
                                                                ->orderBy('fecha_entrega_informe','asc')
                                                                ->groupBy('nro_informe', 'fecha_entrega_informe')
                                                                ->where('nro_informe','!=','')
                                                                ->select('nro_informe','fecha_entrega_informe')
                                                                ->get();

        $this->gastosInf = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', Gestion::orderBy('gestion','desc')->value('id'))->get();                                                       
       
        return view('enviarCompAlmacen.list');
    }

    public function generarReporte()
    {   
        $this->validate();

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Reporte Generado con exito ...!!!']);     
    }

    public function reimpresion($id){
        $nro_informe        = $id;
        $fecha_entrega_informe = GastoConImputacion::where('nro_informe', $id)->value('fecha_entrega_informe');
        $fecha_entrega_informe = Carbon::createFromFormat('Y-m-d', $fecha_entrega_informe)->format('d/m/Y');
        $repAgrupadosGci = DB::table('view_gastos_con_imputacion')->where('nro_informe', $id)->get();
        $repAgrupadosGsi = DB::table('view_gastos_sin_imputacion')->where('nro_informe', $id)->get();    
        $pdf = PDF::loadView('enviarCompAlmacen.reporte', compact('repAgrupadosGci', 'repAgrupadosGsi', 'nro_informe','fecha_entrega_informe'));
        $pdf->setPaper("letter", "portrait");
        return $pdf->stream('informe_nro_'.$nro_informe.'.pdf');
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
