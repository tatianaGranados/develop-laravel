<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gestion;
use App\Models\PagoExterior;
use App\Models\Unidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagosExterior extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $permisos;

    public $gestiones,$id_gestion;
    public $id_pago;
    public $ult_comp;
    public $search = '';

    public $id_unidad, $unidad, $unidades; 
    public $nro_comprobante, $fecha_comprobante, $nro_preventivo, $sello,$nro_hojas, $beneficiario, $detalle;

    public $total_autorizado = 0;
    public $total_retencion = 0;
    public $liquido_pagable = 0;
    public $pago_comision = 0;
    public $enviado_archivo = 0;

    protected function rules()
    {
        return ['nro_comprobante'   => ['required','max:9000'],
                'fecha_comprobante' => ['date','required'],
                'nro_preventivo'    => ['required','max:8000','integer'],
                'sello'             => ['required','max:15','regex:/[1-9]/'],
                'nro_hojas'         => ['integer','max:900','required'],
                'id_unidad'         => 'required',
                'beneficiario'      => ['required','string','max:200'],
                'detalle'           => ['required','string','max:900'],
                'total_autorizado'  => ['required','numeric','regex:/^[\d]{0,12}(\.[\d]{1,2})?$/'],
                'total_retencion'   => ['required','numeric','regex:/^[\d]{0,8}(\.[\d]{1,2})?$/'],
                'pago_comision'     => ['required','numeric','regex:/^[\d]{0,8}(\.[\d]{1,2})?$/'],
                'liquido_pagable'   => ['required','numeric','regex:/^[\d]{0,12}(\.[\d]{1,2})?$/'],
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
        $gastos = DB::table('view_pagos_exterior')->where('id_gestion',$this->id_gestion)
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_comprobante','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_preventivo','LIKE', '%' . $this->search. '%')
                        ->orWhere('sello','LIKE', '%' . $this->search. '%')
                        ->orWhere('beneficiario','LIKE', '%' . $this->search. '%')
                        ->orWhere('detalle','LIKE', '%' . $this->search. '%')
                        ->orWhere('liquido_pagable','LIKE', '%' . $this->search. '%')
                        ->orWhere('nombre_unidad','LIKE', '%' . $this->search. '%');
                    })
                    ->paginate(50);

        $this->gestiones = Gestion::orderby('gestion','desc')->get();
        $this->unidades  = Unidad::all()->pluck('nombre_unidad','id');
        $this->calcLiquidoPagable();

        return view('pagosExterior.list',['gastos'=> $gastos]);
    }

    public function update()
    {
        $validatedData = $this->validate();

        PagoExterior::where('id', $this->id_pago)->update([
            // edit tesoreria
            'nro_comprobante'   => $validatedData['nro_comprobante'],
            'nro_preventivo'    => $validatedData['nro_preventivo'],
            'fecha_comprobante' => $validatedData['fecha_comprobante'],
            'sello'             => $validatedData['sello'],
            'nro_hojas'         => $validatedData['nro_hojas'],
            'id_unidad'         => $validatedData['id_unidad'],
            'beneficiario'      => $validatedData['beneficiario'],
            'detalle'           => $validatedData['detalle'],
            'total_autorizado'  => $validatedData['total_autorizado'],
            'total_retencion'   => $validatedData['total_retencion'],
            'liquido_pagable'   => $validatedData['liquido_pagable'],
            'pago_comision'      => $validatedData['pago_comision'],
            'enviado_archivo'      => $this->enviado_archivo == 0 ? 'NO' : 'SI',

            // edit cajero
            'pagado'            => $this->pagado == 0 ? 'NO' : 'SI',
            'ult_usuario'       => Auth::User()->username
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante '.$this->nro_comprobante.' actualizado con exito ...!!!']);
    }

    public function destroy()
    {
        PagoExterior::find($this->id_pago)->delete();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante Pago exterios Eliminado con exito ...!!!']);
    }

    public function changeEvent($id)
    {
        $this->id_gestion = $id;
        $this->compUtimo($id);
    }

    public function compUtimo($id)
    {
        $compUltimo   = PagoExterior::where('id_gestion',$id)->orderby('nro_comprobante', 'desc')->get();
        if($compUltimo->isEmpty())
        {
            $this->nro_comprobante =1;
        }else{
            $compUltimo= $compUltimo->first()->nro_comprobante;
            $this->nro_comprobante = 1 + (int)$compUltimo;
        }
    }

    public function calcLiquidoPagable()
    {
        if( $this->total_autorizado>=0){

            $this->total_retencion = round(($this->total_autorizado)* 0.125,2);
            $this->liquido_pagable = round(($this->total_autorizado) - ($this->total_retencion),2);
        }
    }

    public function store()
    {
        $this->validate();
        $compGasto= new PagoExterior([
            'id_gestion'        => $this->id_gestion,
            'id_unidad'         => $this->id_unidad,
            'nro_comprobante'   => $this->nro_comprobante,
            'nro_preventivo'    => $this->nro_preventivo,
            'fecha_comprobante' => $this->fecha_comprobante,
            'sello'             => $this->sello,
            'nro_hojas'         => $this->nro_hojas,
            'beneficiario'      => $this->beneficiario,
            'detalle'           => $this->detalle,
            'total_autorizado'  => $this->total_autorizado,
            'total_retencion'   => $this->total_retencion,
            'liquido_pagable'   => $this->liquido_pagable,
            'pago_comision'     => $this->pago_comision,
            'enviado_archivo'   => $this->enviado_archivo == 1 ? 'SI' : 'NO',
            'ult_usuario'       => Auth::User()->username,
        ]);
        $compGasto->save();

        $this->resetInput();
        $this->changeEvent($this->id_gestion);
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Comprobante Exterior creado con exito!!']);
    }

    public function show($id)
    {
        $pago = DB::table('view_pagos_exterior')->where('id',$id)->first();               
        $this->nro_comprobante       = $pago->nro_comprobante;
        $this->nro_preventivo        = $pago->nro_preventivo;
        $this->fecha_comprobante     = $pago->fecha_comprobante;
        $this->sello                 = $pago->sello;
        $this->beneficiario          = $pago->beneficiario;
        $this->detalle               = $pago->detalle;
        $this->total_autorizado      = $pago->total_autorizado;
        $this->total_retencion       = $pago->total_retencion;
        $this->liquido_pagable       = $pago->liquido_pagable;
        $this->pago_comision         = $pago->pago_comision;
        $this->nro_hojas             = $pago->nro_hojas;
        $this->nro_tomo              = $pago->nro_tomo;
        $this->enviado_archivo       = $pago->enviado_archivo;
        $this->unidad                = $pago->nombre_unidad;
    }

    public function edit($id){
        $pago = DB::table('view_pagos_exterior')->where('id',$id)->first();

        $this->id_pago               = $pago->id;
        $this->id_unidad             = $pago->id_unidad;
        $this->nro_comprobante       = $pago->nro_comprobante;
        $this->nro_preventivo        = $pago->nro_preventivo;
        $this->fecha_comprobante     = $pago->fecha_comprobante;
        $this->sello                 = $pago->sello;
        $this->beneficiario          = $pago->beneficiario;
        $this->detalle               = $pago->detalle;
        $this->total_autorizado      = $pago->total_autorizado;
        $this->total_retencion       = $pago->total_retencion;
        $this->liquido_pagable       = $pago->liquido_pagable;
        $this->pago_comision         = $pago->pago_comision;
        $this->pagado                = $pago->pagado == 'NO' ? 0 : 1;
        $this->enviado_archivo       = $pago->enviado_archivo == 'NO' ? 0 : 1;
    }

    public function resetInput()
    {
        $this->id_unidad             ='';
        $this->fecha_comprobante     ='';
        $this->nro_preventivo        ='';
        $this->sello                 ='';
        $this->beneficiario          ='';
        $this->detalle               ='';
        $this->total_autorizado      = 0;
        $this->total_retencion       = 0;
        $this->total_multas          = 0;
        $this->liquido_pagable       = 0;
        $this->pago_comision         = 0;
        $this->nro_hojas             ='';
        $this->enviado_archivo       = 0;
        $this->ult_usuario           ='';
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }
}
