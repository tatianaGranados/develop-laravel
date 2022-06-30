<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Gestion;
use App\Models\PagoExterior;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ArchivadosTomoPagosExterior extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

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

        $query = "CAST(nro_comprobante AS DECIMAL(10,0)) DESC";
        $gastos = DB::table('view_pagos_exterior')
                    ->where([['id_gestion', $this->id_gestion],['enviado_archivo','SI'],['archivado','NO']])
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_comprobante','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_preventivo','LIKE', '%' . $this->search. '%')
                        ->orWhere('sello','LIKE', '%' . $this->search. '%')
                        ->orWhere('beneficiario','LIKE', '%' . $this->search. '%')
                        ->orWhere('detalle','LIKE', '%' . $this->search. '%')
                        ->orWhere('liquido_pagable','LIKE', '%' . $this->search. '%')
                        ->orWhere('nombre_unidad','LIKE', '%' . $this->search. '%');
                })
                ->where([['enviado_archivo','SI'],['archivado','NO']])
                ->orderByRaw($query)
                ->paginate(50);


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
