<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchivadoTomoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexConImputacion()
    {
        return view('archived.gastosConImputacion.index');
    }
    public function indexSinImputacion()
    {
        return view('archived.gastosSinImputacion.index');
    }
    public function indexPagosExterior()
    {
        return view('archived.pagosExterior.index');
    }
}
