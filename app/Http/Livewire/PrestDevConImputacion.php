<?php

namespace App\Http\Livewire;

use App\Models\GastoConImputacion;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use App\Models\PrestamoDevolucionGci;
use Livewire\WithPagination;
use Carbon\Carbon;
use PDF;

class PrestDevConImputacion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $gestiones,$id_gestion;
    public $search = '';

    public array $agrupado=[];
    public $repAgrupado;
    public $unidad_prestada, $funcionario, $responsable_prestamo, $fecha_prestamo, $nro_prestamo;
    public $fecha_devolucion, $responsable_devolucion, $devuelto;

    public array $nro_devuelto = [];

    public $reporte_prestamo=[];

    protected function rules()
    {
        return ['unidad_prestada'      => ['required'],
                'funcionario'          =>'required',
                'responsable_prestamo' =>'required',
                'fecha_prestamo'       =>'required|date',
                'agrupado'             =>'required',
            ];
    }
    
    public function mount()
    {      
        $this->permisos = Auth::user()->AccesosUserAuth;
        $this->id_gestion = Gestion::orderBy('gestion','desc')->value('id');
        $this->fecha_prestamo = Carbon::now()->toDateString();
        $this->fecha_devolucion = Carbon::now()->toDateString();
        $this->prestamoUtimo($this->id_gestion);
    }
    
    public function render()
    {    
        $gastos = DB::table('view_gastos_con_imputacion')->where([['id_gestion','=', $this->id_gestion],['pagado','=','SI']])
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
                    ->orderBy('nro_comprobante','desc')
                    ->paginate(50);

        
        $nro_prestamos = PrestamoDevolucionGci::select('nro_prestamo','fecha_prestamo','unidad_prestada','id_agrupado')->groupBy('nro_prestamo', 'fecha_prestamo','unidad_prestada','id_agrupado')
                    ->join('gastos_con_imputacion as gci','gci.id','=','prestamos_devoluciones_gci.id_gci')
                    ->where([['gci.id_gestion','=', $this->id_gestion],['gci.prestado','=','SI'], ['prestamos_devoluciones_gci.devuelto','=','NO']])
                    ->get();

        $prestados = PrestamoDevolucionGci::join('gastos_con_imputacion as gci','gci.id','=','prestamos_devoluciones_gci.id_gci')
                                        ->where([['gci.id_gestion','=', $this->id_gestion],['gci.prestado','=','SI']])
                                        ->orderBy('prestamos_devoluciones_gci.nro_prestamo','asc')
                                        ->get();

        

        $this->repAgrupados = DB::table('view_gastos_con_imputacion')->whereIn('id', $this->agrupado)->get();
        $this->gestiones = Gestion::orderby('gestion','desc')->get();

        return view('prestamosDevoluciones.gastosConImputacion.list',['gastos'=>$gastos, 'prestados'=>$prestados, 'nro_prestamos'=>$nro_prestamos]);
    }

    public function prestar(){
        $this->validate();  

        $id_agrupados =[];

        foreach ($this->agrupado as $agrup) {
            $prestado = new PrestamoDevolucionGci();
            $prestado->id_gci               = (int)$agrup;
            $prestado->unidad_prestada      = $this->unidad_prestada;
            $prestado->funcionario          = $this->funcionario;
            $prestado->responsable_prestamo = $this->responsable_prestamo;
            $prestado->fecha_prestamo       = $this->fecha_prestamo;
            $prestado->nro_prestamo         = $this->nro_prestamo;
            $prestado->ult_usuario          = Auth::User()->username;
            $prestado->save();
            array_push($id_agrupados,$prestado->id);

            $id_agrupado = $prestado->id;
        }

        GastoConImputacion::whereIn('id', $this->agrupado)->update(['prestado' =>'SI']);
        PrestamoDevolucionGci::whereIn('id', $id_agrupados)->update(['id_agrupado' =>$id_agrupado]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Documento Generado con Exito ...!!!']); 

        return redirect()->route('prestarGci', ['id' => $id_agrupado]);
    }

    public function generarPdf($id){

        $id_agrupados = PrestamoDevolucionGci::select('id_gci')->where('id_agrupado', $id)->get();
        $prestados = DB::table('view_gastos_con_imputacion')->whereIn('id', $id_agrupados)->orderBy('nro_comprobante','ASC')->get();
        
        $datos = PrestamoDevolucionGci::where('id_agrupado', $id)->first();
 
        $fecha = PrestamoDevolucionGci::where('id_agrupado', $id)->value('fecha_prestamo');
	$mes =Carbon::parse($datos->fecha_prestamo)->translatedFormat('F');
        $fecha_prest = Carbon::parse($datos->fecha_prestamo)->formatLocalized('%d'.' de '.$mes.' del '.'%Y');

        $pdf = PDF::loadView('prestamosDevoluciones.gastosConImputacion.reporte', compact('prestados', 'datos', 'fecha_prest'));
        $pdf->setPaper("letter", "portrait");
        
        return $pdf->stream('reporte.pdf');
    }

    public function show($id){
        $reporte = PrestamoDevolucionGci::where('id_gci',$id)->orderBy('fecha_prestamo','DESC')->get();
        $this->reporte_prestamo = $reporte;
    }

    public function devolver(){
        $this->validate(
            [
                'responsable_devolucion' =>'required',
                'fecha_devolucion'       =>'required|date',
                'nro_devuelto'           =>'required',
            ]); 

        PrestamoDevolucionGci::join('gastos_con_imputacion as gci','gci.id','=','prestamos_devoluciones_gci.id_gci')
                                    ->where('gci.id_gestion','=', $this->id_gestion)
                                    ->whereIn('prestamos_devoluciones_gci.nro_prestamo',$this->nro_devuelto)  
                                    ->update(['prestamos_devoluciones_gci.responsable_devolucion'=> $this->responsable_devolucion,
                                              'prestamos_devoluciones_gci.fecha_devolucion'=> $this->fecha_devolucion,
                                              'prestamos_devoluciones_gci.devuelto'=> 'SI',
                                              'gci.prestado' => 'NO'
                                    ]);
        
    
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Documento devuelto registrado ...!!!']); 
    
    }

    public function changeEvent($id)
    {
        $this->id_gestion = $id;
        $this->resetInput();
        $this->prestamoUtimo($id);
    }

    public function prestamoUtimo($id)
    {
        $nro_prestamo = PrestamoDevolucionGci::join('gastos_con_imputacion as gci','gci.id','=','prestamos_devoluciones_gci.id_gci')
                                            ->where('gci.id_gestion','=', $id)
                                            ->orderBy('prestamos_devoluciones_gci.nro_prestamo','desc')
                                            ->get();
        if($nro_prestamo->isEmpty())
        {
            $this->nro_prestamo =1;
        }else{
            $nro_prestamo= $nro_prestamo->first()->nro_prestamo;
            $this->nro_prestamo = 1 + (int)$nro_prestamo;
        }
    }

    public function resetInput()
    {
        $this->unidad_prestada      ='';
        $this->funcionario          ='';
        $this->responsable_prestamo ='';
        $this->agrupado             =[];
        $this->fecha_prestamo = Carbon::now()->toDateString();

        $this->responsable_devolucion ='';
        $this->fecha_devolucion = Carbon::now()->toDateString();
        $this->nro_devuelto         =[];
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->changeEvent($this->id_gestion);
    }

}
