<?php

namespace App\Http\Livewire;

use App\Models\GastoConImputacion;
use App\Models\Gestion;
use App\Models\Unidad;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GastosConImp extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $permisos;

    public $gestiones,$id_gestion;
    public $id_gasto;
    public $ult_comp;
    public $search = '';

    public $id_unidad, $unidad, $unidades; 
    public $nro_comprobante, $fecha_comprobante, $nro_preventivo, $sello,$nro_hojas, $beneficiario, $detalle;
    public $nro_cheque = null;
    public $fecha_cheque = null;
    public $total_autorizado=0;
    public $total_retencion =0;
    public $total_multas = 0;
    public $liquido_pagable;
    public $total_garantia = 0;
    
    public $emite_factura = 'NO';
    public $enviado_caja = 0;

    public $cheque_listo = 0;
    public $observacion_pago, $fecha_entrega_pago, $nro_informe;
    public $pagado = 0;

    public $archivado ='NO';
    public $nro_tomo, $observacion_archivado; 
    public $fecha_archivado;
    public $iue = 0;
    public $it = 0;



    public $total_g;

    protected function rules()
    {
        return ['nro_comprobante'   => ['required','max:9000'],
                'nro_preventivo'    => ['required','max:8000','integer'],
                'fecha_comprobante' => ['date','required'],
                'sello'             => ['required','max:15','regex:/[1-9]/'],
                'nro_hojas'         => ['integer','max:9999','required'],
                'id_unidad'         => 'required',
                'beneficiario'      => ['required','string','max:200'],
                'detalle'           => ['required','string','max:900'],
                'emite_factura'     => 'required',
                'nro_cheque'        => [$this->enviado_caja == 0 || $this->enviado_caja == '' ? 'nullable' : 'required','integer'],
                'fecha_cheque'      => [$this->enviado_caja == 0 || $this->enviado_caja == '' ? 'nullable' : 'required','date'],
                'total_autorizado'  => ['required','numeric','regex:/^[\d]{0,12}(\.[\d]{1,2})?$/'],
                'iue'               => ['required','numeric','regex:/^[\d]{0,11}(\.[\d]{1,2})?$/'],
                'it'                => ['required','numeric','regex:/^[\d]{0,8}(\.[\d]{1,2})?$/'],
                'total_retencion'   => ['required','numeric','regex:/^[\d]{0,8}(\.[\d]{1,2})?$/'],
                'total_multas'      => ['required','numeric','regex:/^[\d]{0,8}(\.[\d]{1,2})?$/'],
                'total_garantia'    => ['required','numeric','regex:/^[\d]{0,12}(\.[\d]{1,2})?$/'],
                'liquido_pagable'   => ['required','numeric','regex:/^[\d]{0,12}(\.[\d]{1,2})?$/'],
                
                // validacion caja
                'fecha_entrega_pago' => [$this->pagado == 0 ? 'nullable' : 'required','date'],
            ];
    }

    public function mount()
    {      
        $this->permisos = Auth::user()->AccesosUserAuth;
        $this->id_gestion = Gestion::orderBy('gestion','desc')->value('id');
        $this->compUtimo($this->id_gestion);
    }

    public function render()
    {
        $query = "CAST(nro_comprobante AS DECIMAL(10,0)) DESC";
        switch ($this->permisos) {
            case (in_array(17, $this->permisos)):
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
                    ->orderByRaw($query)
                    ->paginate(50);

                break; 
            case (in_array(18, $this->permisos)):
                $gastos = DB::table('view_gastos_con_imputacion')->where([['id_gestion','=', $this->id_gestion],['enviado_caja','=','SI']])
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

                break;
            default:
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
                    ->orderByRaw($query)
                    ->paginate(50);
                break;
        }
        
        $this->gestiones = Gestion::orderby('gestion','desc')->get();
        $this->unidades  = Unidad::all()->pluck('nombre_unidad','id');

        return view('gastosConImputacion.list',['gastos'=> $gastos]);
    }

    public function changeEvent($id){
        $this->id_gestion = $id;
        $this->compUtimo($id);
    }

    public function compUtimo($id)
    {
        $query = "CAST(nro_comprobante AS DECIMAL(10,0)) DESC";
        $compUltimo   = GastoConImputacion::where('id_gestion',$id)->orderByRaw($query)->get();
        if($compUltimo->isEmpty())
        {
            $this->nro_comprobante =1;
        }else{
            $compUltimo= $compUltimo->first()->nro_comprobante;
            $this->nro_comprobante = 1 + (int)$compUltimo;
        }
    }


    public function store($formData)
    {
       
        $this->iue = $formData['iue'];
        $this->it  = $formData['it'];
        $this->total_retencion = $formData['total_retencion'];
        $this->liquido_pagable = $formData['liquido_pagable'];
      
        $this->validate();

        $compGasto= new GastoConImputacion([
            'id_gestion'        => $this->id_gestion,
            'id_unidad'         => $this->id_unidad,
            'nro_comprobante'   => $this->nro_comprobante,
            'nro_preventivo'    => $this->nro_preventivo,
            'fecha_comprobante' => $this->fecha_comprobante,
            'sello'             => $this->sello,
            'nro_hojas'         => $this->nro_hojas,
            'beneficiario'      => $this->beneficiario,
            'detalle'           => $this->detalle,
            'nro_cheque'        => $this-> nro_cheque,
            'fecha_cheque'      => $this-> fecha_cheque,
            'total_autorizado'  => $this->total_autorizado,
            'emite_factura'     => $this->emite_factura,
            'iue'               => $this->iue,
            'it'                => $this->it,
            'total_retencion'   => $this->total_retencion,
            'total_multas'      => $this->total_multas,
            'total_garantia'    => $this->total_garantia,
            'liquido_pagable'   => $this->liquido_pagable,
            'enviado_caja'      => $this->enviado_caja == 1 ? 'SI' : 'NO',
            'ult_usuario'       => Auth::User()->username,
        ]);
        $compGasto->save();

        $this->resetInput();
        $this->changeEvent($this->id_gestion);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante creado con exito!!']);
    }

    public function show($id)
    {
        $gci = DB::table('view_gastos_con_imputacion')->where('id',$id)->first();
        $this->nro_comprobante = $gci->nro_comprobante;
        $this->nro_preventivo        = $gci->nro_preventivo;
        $this->fecha_comprobante     = $gci->fecha_comprobante;
        $this->sello                 = $gci->sello;
        $this->beneficiario          = $gci->beneficiario;
        $this->detalle               = $gci->detalle;
        $this->nro_cheque            = $gci->nro_cheque;
        $this->fecha_cheque          = $gci->fecha_cheque;
        $this->total_autorizado      = $gci->total_autorizado;
        $this->iue                   = $gci->iue;
        $this->it                    = $gci->it;
        $this->total_retencion       = $gci->total_retencion;
        $this->total_multas          = $gci->total_multas;
        $this->liquido_pagable       = $gci->liquido_pagable;
        $this->total_garantia        = $gci->total_garantia;
        $this->nro_hojas             = $gci->nro_hojas;
        $this->nro_tomo              = $gci->nro_tomo;
        $this->observacion_pago      = $gci->observacion_pago;
        $this->observacion_archivado = $gci->observacion_archivado;
        $this->enviado_caja          = $gci->enviado_caja;
        $this->cheque_listo          = $gci->cheque_listo;
        $this->pagado                = $gci->pagado;
        $this->archivado             = $gci->archivado;
        $this->fecha_entrega_pago    = $gci->fecha_entrega_pago;
        $this->nro_informe  = $gci->nro_informe;
        $this->fecha_archivado       = $gci->fecha_archivado;
        $this->unidad                = $gci->nombre_unidad;
    }

    public function edit($id){

        $gci =  DB::table('view_gastos_con_imputacion')->where('id', $id)->first();
        $this->id_gasto              = $gci->id;
        $this->nro_comprobante       = $gci->nro_comprobante;
        $this->nro_preventivo        = $gci->nro_preventivo;
        $this->fecha_comprobante     = $gci->fecha_comprobante;
        $this->sello                 = $gci->sello;
        $this->beneficiario          = $gci->beneficiario;
        $this->detalle               = $gci->detalle;
        $this->nro_cheque            = $gci->nro_cheque;
        $this->fecha_cheque          = $gci->fecha_cheque;
        $this->total_autorizado      = $gci->total_autorizado;
        $this->iue                   = $gci->iue;
        $this->it                    = $gci->it;
        $this->total_retencion       = $gci->total_retencion;
        $this->total_multas          = $gci->total_multas;
        $this->total_garantia        = $gci->total_garantia;
        $this->liquido_pagable       = $gci->liquido_pagable;
        $this->nro_hojas             = $gci->nro_hojas;
        $this->nro_tomo              = $gci->nro_tomo;
        $this->observacion_pago      = $gci->observacion_pago;
        $this->observacion_archivado = $gci->observacion_archivado;
        $this->enviado_caja          = $gci->enviado_caja == 'NO' ? 0 : 1;
        $this->cheque_listo          = $gci->cheque_listo == 'NO' ? 0 : 1;
        $this->pagado                = $gci->pagado == 'NO' ? 0 : 1;
        $this->archivado             = $gci->archivado;
        $this->fecha_entrega_pago    = $gci->fecha_entrega_pago ==NULL ? Carbon::now()->toDateString() : $gci->fecha_entrega_pago ;
        $this->fecha_archivado       = $gci->fecha_archivado;
        $this->unidad                = $gci->nombre_unidad;
        $this->emite_factura         = $gci->emite_factura;
        $this->id_unidad             = $gci->id_unidad;

    }

    public function updateTesoreria($formData)
    {
        if(in_array(17, Auth::user()->AccesosUserAuth)){
            $this->iue = $formData['iue'];
            $this->it  = $formData['it'];
            $this->total_retencion = $formData['total_retencion'];
            $this->liquido_pagable = $formData['liquido_pagable'];
        }
        
        $validatedData = $this->validate();

        GastoConImputacion::where('id', $this->id_gasto)->update([
            // edit tesoreria
            'nro_comprobante'   => $validatedData['nro_comprobante'],
            'nro_preventivo'    => $validatedData['nro_preventivo'],
            'fecha_comprobante' => $validatedData['fecha_comprobante'],
            'sello'             => $validatedData['sello'],
            'nro_hojas'         => $validatedData['nro_hojas'],
            'id_unidad'         => $validatedData['id_unidad'],
            'beneficiario'      => $validatedData['beneficiario'],
            'detalle'           => $validatedData['detalle'],
            'nro_cheque'        => $validatedData['nro_cheque'],
            'fecha_cheque'      => $validatedData['fecha_cheque'],
            'total_autorizado'  => $validatedData['total_autorizado'],
            'emite_factura'     => $validatedData['emite_factura'],
            'iue'               => $validatedData['iue'],
            'it'                => $validatedData['it'],
            'total_retencion'   => $validatedData['total_retencion'],
            'total_multas'      => $validatedData['total_multas'],
            'total_garantia'    => $validatedData['total_garantia'],
            'liquido_pagable'   => $validatedData['liquido_pagable'],
            'enviado_caja'      => $this->enviado_caja == 0 ? 'NO' : 'SI',

            // edit cajero
            'cheque_listo'      => $this->cheque_listo == 0 ? 'NO': 'SI',
            'observacion_pago'  => $this->observacion_pago == null ? null : $this->observacion_pago,
            'pagado'            => $this->pagado == 0 ? 'NO' : 'SI',
            'fecha_entrega_pago' => $validatedData['fecha_entrega_pago'],
        
            'ult_usuario'       => Auth::User()->username
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante '.$this->nro_comprobante.' actualizado con exito ...!!!']);
    }

    public function delete($id){
        $gci =  DB::table('view_gastos_con_imputacion')->where('id', $id)->first();
        $this->id_gasto              = $gci->id;
        $this->nro_comprobante       = $gci->nro_comprobante;
    }

    public function destroy()
    {
        GastoConImputacion::find($this->id_gasto)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante Eliminado con exito ...!!!']);
    }

    public function devComprobante(){

        GastoConImputacion::where('id', $this->id_gasto)->update([
            'enviado_caja'   => 'NO' ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante Devuelto con exito ...!!!']);
    }

    public function resetInput()
    {
        $this->id_unidad             ='';
        $this->fecha_comprobante     ='';
        $this->nro_preventivo        ='';
        $this->sello                 ='';
        $this->beneficiario          ='';
        $this->detalle               ='';
        $this->nro_cheque            = null;
        $this->fecha_cheque          = null;
        $this->total_autorizado      = 0;
        $this->emite_factura         ='NO';
        $this->iue                   = 0;
        $this->it                    = 0;
        $this->total_retencion       = 0;
        $this->total_multas          = 0;
        $this->liquido_pagable       = 0;
        $this->total_garantia        = 0;
        $this->nro_hojas             ='';
        $this->nro_tomo              ='';
        $this->observacion_pago      ='';
        $this->observacion_archivado ='';
        $this->enviado_caja          = 0;
        $this->cheque_listo          = 0;
        $this->pagado                = 0;
        $this->archivado             = 'NO';
        $this->fecha_entrega_pago    ='';
        $this->nro_informe           ='';
        $this->fecha_archivado       ='';
        $this->ult_usuario           ='';
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}
