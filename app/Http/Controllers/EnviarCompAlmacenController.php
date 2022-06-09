<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\GastoConImputacion;
use App\Models\GastoSinImputacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use PDF;

class EnviarCompAlmacenController extends Controller
{
    public function index()
    {
        return view('enviarCompAlmacen.index');
    }


    public function generarReporte(Request $request)
    {
       
        $data = [
            'nro_informe'           => $request->nro_informe,
            'fecha_entrega_informe' => $request->fecha_entrega_informe,
            'enviado_archivo'       =>'SI',
            'ult_usuario'           => Auth::User()->username,
        ];
        
        $agrupadoGi = $request->agrupadoGi;
        $agrupadoSi = $request->agrupadoSi;

        $nro_informe        = $request->nro_informe;
        $fecha_entrega_informe = Carbon::createFromFormat('Y-m-d', $request->fecha_entrega_informe)->format('d/m/Y');

        if(is_array($agrupadoGi)){
            $gastoCi = GastoConImputacion::whereIn('id', $agrupadoGi)->update($data);
            $repAgrupadosGci = DB::table('view_gastos_con_imputacion')->whereIn('id', $agrupadoGi)->get();

        }else{
            $repAgrupadosGci =[];
        }

        if(is_array($agrupadoSi)){
            $gastoCi = GastoSinImputacion::whereIn('id', $agrupadoSi)->update($data);
            $repAgrupadosGsi = DB::table('view_gastos_sin_imputacion')->whereIn('id', $agrupadoGi)->get();
        }else{
            $repAgrupadosGsi =[];
        }

        
        $pdf = PDF::loadView('enviarCompAlmacen.reporte', compact('repAgrupadosGci', 'repAgrupadosGsi', 'nro_informe','fecha_entrega_informe'));
        $pdf->setPaper("letter", "portrait");
        return $pdf->stream('document.pdf');
    }

    public Function downloadPDF()
    {
        

    }
}
