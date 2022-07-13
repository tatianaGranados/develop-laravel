<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use App\Models\Unidad;
use App\Models\GastoSinImputacion;
use Carbon\Carbon;

class GastosSinImp extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $permisos;

    public $gestiones,$id_gestion;
    public $id_gasto;
    public $ult_comp;
    public $search = '';

    public $id_unidad, $unidad, $unidades; 
    public $nro_comprobante, $nro_devengado, $fecha_devengado, $sello, $nro_hojas, $beneficiario, $detalle;
    public $nro_cheque = null;
    public $fecha_cheque = null;
    public $liquido_pagable = 0;
    public $enviado_caja = 0;

    public $cheque_listo = 0;
    public $observacion_pago, $fecha_entrega_pago, $nro_informe;
    public $pagado = 0;

    public $archivado ='NO';
    public $nro_tomo, $observacion_archivado; 
    public $fecha_archivado;

    protected function rules()
    {
        return ['nro_comprobante'   => ['required','max:9000'],
                'nro_devengado'     => ['required','max:9000'],
                'fecha_devengado'   => ['date','required'],
                'sello'             => ['required','max:15','regex:/[1-9]/'],
                'nro_hojas'         => ['integer','max:900','required'],
                'id_unidad'         => 'required',
                'beneficiario'      => ['required','string','max:200'],
                'detalle'           => ['required','string','max:900'],
                'nro_cheque'        => [$this->enviado_caja == 0 || $this->enviado_caja == '' ? 'nullable' : 'required','integer'],
                'fecha_cheque'      => [$this->enviado_caja == 0 || $this->enviado_caja == '' ? 'nullable' : 'required','date'],
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
        $query = "CAST(nro_devengado AS DECIMAL(10,0)) DESC";
        switch ($this->permisos) {
            case (in_array(17, $this->permisos)):
                $gastos = DB::table('view_gastos_sin_imputacion')->where('id_gestion','=', $this->id_gestion)
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_devengado','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_comprobante','LIKE', '%' . $this->search. '%')
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
                $gastos = DB::table('view_gastos_sin_imputacion')->where([['id_gestion','=', $this->id_gestion],['enviado_caja','=','SI']])
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_devengado','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_comprobante','LIKE', '%' . $this->search. '%')
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
                $gastos = DB::table('view_gastos_sin_imputacion')->where('id_gestion','=', $this->id_gestion)
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_devengado','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_comprobante','LIKE', '%' . $this->search. '%')
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
        $this->unidades  = Unidad::Select('nombre_unidad','id')->orderBy('nombre_unidad','asc')->get();

        return view('gastosSinImputacion.list',['gastos'=> $gastos]);
    }
    public function changeEvent($id){
        $this->id_gestion = $id;
        $this->compUtimo($id);
    }

    public function compUtimo($id)
    {
        $query = "CAST(nro_comprobante AS DECIMAL(10,0)) DESC";
        $compUltimo   = GastoSinImputacion::where('id_gestion',$id)->orderByRaw($query)->get();
        if($compUltimo->isEmpty())
        {
            $this->nro_comprobante =1;
        }else{
            $compUltimo= $compUltimo->first()->nro_comprobante;
            $this->nro_comprobante = 1 + (int)$compUltimo;
        }
    }

    public function store()
    {
        $this->validate();
        $compGasto= new GastoSinImputacion([
            'id_gestion'        => $this->id_gestion,
            'id_unidad'         => $this->id_unidad,
            'nro_comprobante'   => $this->nro_comprobante,
            'nro_devengado'     => $this->nro_devengado,
            'fecha_devengado'   => $this->fecha_devengado,
            'sello'             => $this->sello,
            'nro_hojas'         => $this->nro_hojas,
            'beneficiario'      => $this->beneficiario,
            'detalle'           => $this->detalle,
            'nro_cheque'        => $this-> nro_cheque,
            'fecha_cheque'      => $this-> fecha_cheque,
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
        $gci = DB::table('view_gastos_sin_imputacion')->where('id',$id)->first();
        $this->nro_comprobante       = $gci->nro_comprobante;
        $this->nro_devengado         = $gci->nro_devengado;
        $this->fecha_devengado       = $gci->fecha_devengado;
        $this->sello                 = $gci->sello;
        $this->beneficiario          = $gci->beneficiario;
        $this->detalle               = $gci->detalle;
        $this->nro_cheque            = $gci->nro_cheque;
        $this->fecha_cheque          = $gci->fecha_cheque;
        $this->liquido_pagable       = $gci->liquido_pagable;
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
        $gci =  DB::table('view_gastos_sin_imputacion')->where('id', $id)->first();
        $this->id_gasto              = $gci->id;
        $this->nro_comprobante       = $gci->nro_comprobante;
        $this->nro_devengado         = $gci->nro_devengado;
        $this->fecha_devengado       = $gci->fecha_devengado;
        $this->sello                 = $gci->sello;
        $this->beneficiario          = $gci->beneficiario;
        $this->detalle               = $gci->detalle;
        $this->nro_cheque            = $gci->nro_cheque;
        $this->fecha_cheque          = $gci->fecha_cheque;
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
        $this->id_unidad             = $gci->id_unidad;

    }

    public function updateTesoreria()
    {
        $validatedData = $this->validate();

        GastoSinImputacion::where('id', $this->id_gasto)->update([
            // edit tesoreria
            'nro_comprobante' => $validatedData['nro_comprobante'],
            'nro_devengado'   => $validatedData['nro_devengado'],
            'fecha_devengado' => $validatedData['fecha_devengado'],
            'sello'           => $validatedData['sello'],
            'nro_hojas'       => $validatedData['nro_hojas'],
            'id_unidad'       => $validatedData['id_unidad'],
            'beneficiario'    => $validatedData['beneficiario'],
            'detalle'         => $validatedData['detalle'],
            'nro_cheque'      => $validatedData['nro_cheque'],
            'fecha_cheque'    => $validatedData['fecha_cheque'],
            'liquido_pagable' => $validatedData['liquido_pagable'],
            'enviado_caja'    => $this->enviado_caja == 0 ? 'NO' : 'SI',

            // edit cajero
            'cheque_listo'    => $this->cheque_listo == 0 ? 'NO': 'SI',
            'observacion_pago'=> $this->observacion_pago == null ? null : $this->observacion_pago,
            'pagado'          => $this->pagado == 0 ? 'NO' : 'SI',
            'fecha_entrega_pago' => $validatedData['fecha_entrega_pago'],
        
            'ult_usuario'       => Auth::User()->username
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante '.$this->nro_devengado.' actualizado con exito ...!!!']);
    }

    public function destroy()
    {
        GastoSinImputacion::find($this->id_gasto)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante Eliminado con exito ...!!!']);
    }

    public function devComprobante(){

        GastoSinImputacion::where('id', $this->id_gasto)->update([
            'enviado_caja'   => 'NO' ]);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Devengado Devuelto con exito ...!!!']);
    }

    public function resetInput()
    {
        $this->id_unidad             ='';
        $this->nro_devengado         ='';
        $this->fecha_devengado       ='';
        $this->sello                 ='';
        $this->beneficiario          ='';
        $this->detalle               ='';
        $this->nro_cheque            = null;
        $this->fecha_cheque          = null;
        $this->emite_factura         ='NO';
        $this->liquido_pagable       = 0;
        $this->nro_hojas             ='';
        $this->nro_tomo              ='';
        $this->observacion_pago      ='';
        $this->observacion_archivado ='';
        $this->enviado_caja          = 0;
        $this->cheque_listo          = 0;
        $this->pagado                = 0;
        $this->archivado             = 'NO';
        $this->fecha_entrega_pago    ='';
        $this->nro_informe  ='';
        $this->fecha_archivado       ='';
        $this->ult_usuario           ='';
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}
