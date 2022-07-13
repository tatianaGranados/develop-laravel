<?php

namespace App\Http\Controllers;

class ReportesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reporteGciUnidades(){
        return view('reportes.gastosConImputacion.index');
    }

    public function reporteGsiUnidades(){
        return view('reportes.gastosSinImputacion.index');
    }
}
