<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermisoController extends Controller
{
    public function index()
    {
        return view('permisos.index');
    }
}
