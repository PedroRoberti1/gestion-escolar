<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index(){
         $configuracion = Configuracion::firts();
        return view('admin.configuracion.index', compact('configuracion'));
    }
}
