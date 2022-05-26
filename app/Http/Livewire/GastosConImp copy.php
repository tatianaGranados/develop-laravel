<?php

namespace App\Http\Livewire;

use App\Models\GastoConImputacion;
use App\Models\Gestion;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class GastosConImp extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $gestiones;
    public $id_gestion=1;
    public $gastos;

    public $search = '';

    public $id_unidad, $unidad, $unidades; 
    public $nro_comprobante, $fecha_comprobante, $nro_preventivo, $sello, $beneficiario, $detalle, $nro_cheque, $fecha_cheque;
    public $emite_factura, $total_autorizado, $iue, $it, $total_retencion, $total_multas, $liquido_pagable, $total_garantia;
    public $nro_hojas, $nro_tomo, $observacion_pago, $observacion_archivado, $enviado_caja, $cheque_listo, $pagado, $archivado, $fecha_entrega_pago;
    public $nro_agrupado_entrega, $fecha_archivado, $ult_usuario;


    protected function rules()
    {
        return ['nro_comprobante' => 'required',
                
            ];
    }

    public function mount()
    {                
        // $this->id_gestion = Gestion::get()->last()->id;
        $this->gestiones = Gestion::orderby('created_at','desc')->get();
        $this->database( $this->id_gestion);
        $this->unidades = Unidad::all()->pluck('nombre_unidad','id');
    }

    public function render()
    {
        return view('gastosConImputacion.list');
    }

    public function database($id)
    {
        $this->gastos = GastoConImputacion::where ('id_gestion', $id)
            ->join('unidades','unidades.id','=','id_unidad')->get();

        $compUltimo = GastoConImputacion::where('id_gestion',$id)->get();
        if($compUltimo->isEmpty()){
            $this->nro_comprobante =1;
        }else{
            $compUltimo= $compUltimo->last()->nro_comprobante;
            $this->nro_comprobante = 1 + (int)$compUltimo;
        } 
    }

    public function changeEvent()
    {
        $this->gastos = GastoConImputacion::where ('id_gestion', $this->id_gestion)
            ->join('unidades','unidades.id','=','id_unidad')->get();
        
    }

    public function store(){

        $this->validate();
        $compGasto= new GastoConImputacion([
            'id_gestion' => $this->id_gestion,
            'id_unidad' => $this->id_unidad,
            'nro_comprobante' => $this->nro_comprobante,
            'nro_preventivo' =>$this->nro_preventivo,
            'fecha_comprobante' => $this->fecha_comprobante,
            'sello' => $this->sello,
            'nro_hojas' => $this->nro_hojas,
            'beneficiario' => $this->beneficiario,
            'detalle' =>$this->detalle,
            'nro_cheque' =>$this-> nro_cheque,
            'fecha_cheque' => $this-> fecha_cheque,
            'total_autorizado' => $this->total_autorizado,
            'emite_factura' =>$this->emite_factura,
            'iue' =>$this->iue,
            'it' =>$this->it,
            'total_retencion' =>$this->total_retencion,
            'total_multas' => $this->total_multas,
            'total_garantia' => $this->total_garantia,
            'liquido_pagable' => $this->liquido_pagable,
            'ult_usuario' =>Auth::User()->username,
        ]);

        $compGasto->save();
        $this->changeEvent($this->id_gestion);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante creado con exito ...!!!']);
    }

    public function resetInput()
    {
        // $this->id_gestion            ='';
        $this->id_unidad             ='';
        // $this->nro_comprobante       ='';
        $this->fecha_comprobante     ='';
        $this->nro_preventivo        ='';
        $this->sello                 ='';
        $this->beneficiario          ='';
        $this->detalle               ='';
        $this->nro_cheque            ='';
        $this->fecha_cheque          ='';
        $this->total_autorizado      ='';
        $this->emite_factura         ='';
        $this->iue                   ='';
        $this->it                    ='';
        $this->total_retencion       ='';
        $this->total_multas          ='';
        $this->liquido_pagable       ='';
        $this->total_garantia        ='';
        $this->nro_hojas             ='';
        $this->nro_tomo              ='';
        $this->observacion_pago      ='';
        $this->observacion_archivado ='';
        $this->enviado_caja          ='';
        $this->cheque_listo          ='';
        $this->pagado                ='';
        $this->archivado             ='';
        $this->fecha_entrega_pago    ='';
        $this->nro_agrupado_entrega  ='';
        $this->fecha_archivado       ='';
        $this->ult_usuario           ='';
    }

    public function closeModal()
    {
        $this->resetInput();
    }
}
