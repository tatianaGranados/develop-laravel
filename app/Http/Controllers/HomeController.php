<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\User;
use App\Models\UserUnidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id_gestion = Gestion::orderBy('gestion','desc')->value('id');
        $gestion = Gestion::where('id',$id_gestion)->value('gestion');
        

        $id_unidad = UserUnidad::where('id_usuario',Auth::user()->id)->value('id_unidad');

        if( $id_unidad != 12)
        {
            $gastos = DB::table('view_gastos_con_imputacion')
                    ->where('id_gestion', $id_gestion)
                    ->where('id_unidad', $id_unidad)
                    ->where('cheque_listo', 'SI ')
                    ->get();
        }else{
            $gastos = DB::table('view_gastos_con_imputacion')
                    ->where('id_gestion', $id_gestion)
                    ->where('cheque_listo', 'SI ')
                    ->get();
        }
        
        return view('dashboard', compact('gastos', 'gestion'));
    }
}
