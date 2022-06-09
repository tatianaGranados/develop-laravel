<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestion;
use App\Models\PagoExterior;
use Carbon\Carbon;

class ArchivadosTomoPagosExterior extends Component
{
    public $gestiones,$id_gestion;
    public $permisos;

    public $fecha_archivado, $tomo;
    public $agrupadoPe = [];

    
    protected function rules()
    {
        return ['tomo'            => 'required',
                'fecha_archivado' => ['required','date'],
                'agrupadoPe'     => 'required',
            ];
    }
    public function messages()
    {
        return [
            'agrupadoPe.required' => 'Debe seleccionar al menos un registro para inserta un nro tomo',
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
        $this->gestiones = Gestion::orderby('gestion','desc')->get();

        $gastos = PagoExterior::leftJoin('unidades','unidades.id','=', 'pagos_exterior.id_unidad')
                                ->select('pagos_exterior.*', 'unidades.nombre_unidad')                        
                                ->where([['pagos_exterior.id_gestion', $this->id_gestion],['pagos_exterior.enviado_archivo','SI'],['pagos_exterior.archivado','NO']])
                                ->orderBy('pagos_exterior.nro_comprobante','asc')
                                ->get();

        if(is_array($this->agrupadoPe)){
            $gastosSelec = PagoExterior::leftJoin('unidades','unidades.id','=', 'pagos_exterior.id_unidad')
                                        ->select('pagos_exterior.*', 'unidades.nombre_unidad')
                                        ->whereIn('pagos_exterior.id',$this->agrupadoPe)
                                        ->where('pagos_exterior.id_gestion', $this->id_gestion)
                                        ->get();

        }else{
            $gastosSelec =[];
        }
        
        return view('archived.pagosExterior.list',['gastos'=>$gastos, 'gastosSelec'=>$gastosSelec]);
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

        PagoExterior::whereIn('id', $this->agrupadoPe)->update($data);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante agrupados al tomo' .$this->tomo.' con exito ...!!!']);
    }
    public function resetInput()
    {
        $this->agrupadoPe      =[];
        $this->tomo            ='';
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}
