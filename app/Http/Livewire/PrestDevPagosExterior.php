<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PagoExterior;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Gestion;
use App\Models\PrestamoDevolucionExterior;
use Livewire\WithPagination;
use Carbon\Carbon;
use PDF;

class PrestDevPagosExterior extends Component
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
        $gastos = DB::table('view_pagos_exterior')->where([['id_gestion','=', $this->id_gestion],['pagado','=','SI']])
                    ->Where(function($sub_query){
                        $sub_query->Where('nro_comprobante','LIKE', '%' . $this->search. '%')
                        ->orWhere('nro_preventivo','LIKE', '%' . $this->search. '%')
                        ->orWhere('sello','LIKE', '%' . $this->search. '%')
                        ->orWhere('beneficiario','LIKE', '%' . $this->search. '%')
                        ->orWhere('detalle','LIKE', '%' . $this->search. '%')
                        ->orWhere('liquido_pagable','LIKE', '%' . $this->search. '%')
                        ->orWhere('nombre_unidad','LIKE', '%' . $this->search. '%');
                    })
                    ->orderBy('nro_comprobante','desc')
                    ->paginate(50);

        
        $nro_prestamos = PrestamoDevolucionExterior::select('nro_prestamo','fecha_prestamo','unidad_prestada','id_agrupado')->groupBy('nro_prestamo', 'fecha_prestamo','unidad_prestada','id_agrupado')
                    ->join('pagos_exterior as pe','pe.id','=','prestamos_devoluciones_exterior.id_pago_exterior')
                    ->where([['pe.id_gestion','=', $this->id_gestion],['pe.prestado','=','SI'], ['prestamos_devoluciones_exterior.devuelto','=','NO']])
                    ->get();

        $prestados = PrestamoDevolucionExterior::join('pagos_exterior as pe','pe.id','=','prestamos_devoluciones_exterior.id_pago_exterior')
                                        ->where([['pe.id_gestion','=', $this->id_gestion],['pe.prestado','=','SI']])
                                        ->orderBy('prestamos_devoluciones_exterior.nro_prestamo','asc')
                                        ->get();

        

        $this->repAgrupados = DB::table('view_pagos_exterior')->whereIn('id', $this->agrupado)->get();
        $this->gestiones = Gestion::orderby('gestion','desc')->get();

        return view('prestamosDevoluciones.pagosExterior.list',['gastos'=>$gastos, 'prestados'=>$prestados, 'nro_prestamos'=>$nro_prestamos]);
    }

    public function prestar(){
        $this->validate();  

        $id_agrupados =[];

        foreach ($this->agrupado as $agrup) {
            $prestado = new PrestamoDevolucionExterior();
            $prestado->id_pago_exterior     = (int)$agrup;
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

        PagoExterior::whereIn('id', $this->agrupado)->update(['prestado' =>'SI']);
        PrestamoDevolucionExterior::whereIn('id', $id_agrupados)->update(['id_agrupado' =>$id_agrupado]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('alert',['message'=>'Documento Generado con Exito ...!!!']); 

        return redirect()->route('prestarPe', ['id' => $id_agrupado]);
    }

    public function generarPdf($id){

        $id_agrupados = PrestamoDevolucionExterior::select('id_pago_exterior')->where('id_agrupado', $id)->get();
        $prestados = DB::table('view_pagos_exterior')->whereIn('id', $id_agrupados)->orderBy('nro_comprobante','ASC')->get();
        
        $datos = PrestamoDevolucionExterior::where('id_agrupado', $id)->first();
 
        $fecha = PrestamoDevolucionExterior::where('id_agrupado', $id)->value('fecha_prestamo');
        $fecha_prest = Carbon::parse($datos->fecha_prestamo)->formatLocalized('%d'. ' de '. '%B'.' del '.' %Y ');

        $pdf = PDF::loadView('prestamosDevoluciones.pagosExterior.reporte', compact('prestados', 'datos', 'fecha_prest'));
        $pdf->setPaper("letter", "portrait");
        
        return $pdf->stream('reporte.pdf');
    }

    public function show($id){
        $reporte = PrestamoDevolucionExterior::where('id_pago_exterior',$id)->orderBy('fecha_prestamo','DESC')->get();
        $this->reporte_prestamo = $reporte;
    }

    public function devolver(){
        $this->validate(
            [
                'responsable_devolucion' =>'required',
                'fecha_devolucion'       =>'required|date',
                'nro_devuelto'           =>'required',
            ]); 

        PrestamoDevolucionExterior::join('pagos_exterior as pe','pe.id','=','prestamos_devoluciones_exterior.id_pago_exterior')
                                    ->where('pe.id_gestion','=', $this->id_gestion)
                                    ->whereIn('prestamos_devoluciones_exterior.nro_prestamo',$this->nro_devuelto)  
                                    ->update(['prestamos_devoluciones_exterior.responsable_devolucion'=> $this->responsable_devolucion,
                                              'prestamos_devoluciones_exterior.fecha_devolucion'=> $this->fecha_devolucion,
                                              'prestamos_devoluciones_exterior.devuelto'=> 'SI',
                                              'pe.prestado' => 'NO'
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
        $nro_prestamo = PrestamoDevolucionExterior::join('pagos_exterior as pe','pe.id','=','prestamos_devoluciones_exterior.id_pago_exterior')
                                            ->where('pe.id_gestion','=', $id)
                                            ->orderBy('prestamos_devoluciones_exterior.nro_prestamo','desc')
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
