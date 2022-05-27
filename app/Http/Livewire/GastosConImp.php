<?php

namespace App\Http\Livewire;

use App\Models\GastoConImputacion;
use App\Models\Gestion;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GastosConImp extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $gestiones,$id_gestion;
    public $gastos;
    public $ult_comp;

    public $search = '';

    public $id_unidad, $unidad, $unidades; 
    public $nro_comprobante, $fecha_comprobante, $nro_preventivo, $sello, $beneficiario, $detalle;
    public $emite_factura = 'NO';
    public $enviado_caja = 'NO';
    public $nro_cheque, $fecha_cheque = null;
    public $total_autorizado=0 ;
    public  $iue=0;
    public $it=0;
    public $total_retencion=0;
    public $total_multas=0;
    public $liquido_pagable=0;
    public $total_garantia=0 ;
    public $nro_hojas, $nro_tomo, $observacion_pago, $observacion_archivado, $cheque_listo, $pagado, $archivado, $fecha_entrega_pago;
    public $nro_agrupado_entrega, $fecha_archivado, $ult_usuario;

    protected function rules()
    {
        return ['nro_comprobante' => 'required|max:9000',
                'nro_preventivo' =>'required|max:8000|integer',
                'fecha_comprobante' =>'date|required',
                'sello'=>'required|max:15|regex:/[1-9]/',
                'nro_hojas'=>'integer|max:500|required',
                'id_unidad' => 'required',
                'beneficiario' => 'required|string|max:2000',
                'detalle' => 'required|string',
                'nro_cheque' =>[$this->enviado_caja == 'NO' ? 'nullable' : 'required','integer'],
                'fecha_cheque' =>[$this->enviado_caja == 'NO' ? 'nullable' : 'required','date'],
                'total_autorizado' =>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
                'iue' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
                'it' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
                'total_retencion' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
                'total_multas' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
                'total_garantia' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
                'liquido_pagable' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'
            ];
    }

    public function mount(){      

        $ult_gestion= $this->id_gestion = Gestion::get()->last()->id;
        $this->gastos = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', $ult_gestion)->get();
        $compUltimo = GastoConImputacion::where('id_gestion',$this->id_gestion)->orderby('nro_comprobante', 'desc')->get();
       
        if($compUltimo->isEmpty()){
            $this->nro_comprobante =1;
        }else{
            $compUltimo= $compUltimo->first()->nro_comprobante;
            $this->nro_comprobante = 1 + (int)$compUltimo;
        }
    }

    public function render()
    {
        $this->gastos = DB::table('view_gastos_con_imputacion')->where('id_gestion','=', $this->id_gestion)->get();
        $this->gestiones  = Gestion::orderby('gestion','desc')->get();
        $this->unidades = Unidad::all()->pluck('nombre_unidad','id');

        if( $this->total_autorizado>=0){
            if($this->emite_factura=='SI'){
                $this->iue = 0;
                $this->it = 0;
                $this->total_retencion = 0;
            }else{
                $this->iue = round(($this->total_autorizado)* 0.125,2);
                $this->it  = round(($this->total_autorizado)* 0.03,2);
                $this->total_retencion = round(($this->iue) + ($this->it),2);
            }

            if($this->total_retencion>=0 && $this->total_multas>=0 && $this->total_garantia>=0){
                $this->liquido_pagable = round(($this->total_autorizado) + ($this->total_garantia) - ($this->total_retencion) - ($this->total_multas),2);
            }
        }

        return view('gastosConImputacion.list', compact($this->gastos));
    }

    public function changeEvent($id){
        $this->id_gestion =$id;
        $this->gastos = DB::table('view_gastos_con_imputacion')->where ('id_gestion', $id)->get();
        $compUltimo = GastoConImputacion::where('id_gestion',$this->id_gestion)->orderby('nro_comprobante', 'desc')->get();
        if($compUltimo->isEmpty()){
            $this->nro_comprobante =1;
        }else{
            $compUltimo= $compUltimo->first()->nro_comprobante;
            $this->nro_comprobante = 1 + (int)$compUltimo;
        }
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
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante creado con exito!!']);
    }

    public function resetInput()
    {
        $this->id_unidad             ='';
        $this->fecha_comprobante     ='';
        $this->nro_preventivo        ='';
        $this->sello                 ='';
        $this->beneficiario          ='';
        $this->detalle               ='';
        $this->nro_cheque            ='';
        $this->fecha_cheque          ='';
        $this->total_autorizado      =0;
        $this->emite_factura         ='';
        $this->iue                   =0;
        $this->it                    =0;
        $this->total_retencion       =0;
        $this->total_multas          =0;
        $this->liquido_pagable       =0;
        $this->total_garantia        =0;
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
        $this->changeEvent($this->id_gestion);
    }
}
