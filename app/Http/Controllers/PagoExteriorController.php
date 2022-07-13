<?php

namespace App\Http\Controllers;

class PagoExteriorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pagosExterior.index');
    }
}
