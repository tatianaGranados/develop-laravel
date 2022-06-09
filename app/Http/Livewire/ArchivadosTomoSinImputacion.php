<?php

namespace App\Http\Livewire;

use App\Models\GastoSinImputacion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestion;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArchivadosTomoSinImputacion extends Component
{
    public $gestiones,$id_gestion;
    public $permisos;

    public $fecha_archivado, $tomo;
    public $agrupadoGsi = [];

    
    protected function rules()
    {
        return ['tomo'            => 'required',
                'fecha_archivado' => ['required','date'],
                'agrupadoGsi'     => 'required',
            ];
    }
    public function messages()
    {
        return [
            'agrupadoGsi.required' => 'Debe seleccionar al menos un registro para inserta un nro tomo',
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
        $gastos = DB::table('view_gastos_sin_imputacion')->where('id_gestion', $this->id_gestion)
                    ->where([['enviado_archivo','SI'],['archivado','NO']])
                    ->orderBy('nro_devengado','asc')
                    ->get();

        $this->gestiones = Gestion::orderby('gestion','desc')->get();

        if(is_array($this->agrupadoGsi)){
            $gastosSelec = DB::table('view_gastos_sin_imputacion')->whereIn('id', $this->agrupadoGsi)->orderBy('nro_devengado','asc')->get();

        }else{
            $gastosSelec =[];
        }

        return view('archived.gastosSinImputacion.list',['gastos'=>$gastos, 'gastosSelec'=>$gastosSelec]);
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

        GastoSinImputacion ::whereIn('id', $this->agrupadoGsi)->update($data);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante agrupados al tomo' .$this->tomo.' con exito ...!!!']);
    }
    public function resetInput()
    {
        $this->tomo        = '';
        $this->agrupadoGsi = [];
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}
