<?php

namespace App\Http\Controllers;

class PrestamoDevolucionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexConImputacion()
    {
        return view('prestamosDevoluciones.gastosConImputacion.index');
    }
    public function indexSinImputacion()
    {
        return view('prestamosDevoluciones.gastosSinImputacion.index');
    }
    public function indexPagosExterior()
    {
        return view('prestamosDevoluciones.pagosExterior.index');
    }
}
