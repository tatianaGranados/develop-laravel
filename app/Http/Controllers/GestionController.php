<?php

namespace App\Http\Controllers;

class GestionController extends Controller
{
    public function index()
    {
        return view('gestiones.index');
    }

}