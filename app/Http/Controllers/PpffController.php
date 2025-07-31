<?php

namespace App\Http\Controllers;

use App\Models\Ppff;
use Illuminate\Http\Request;

class PpffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'parentesco' => 'required',
            'ocupacion' => 'required',
            'direccion' => 'required',

        ]);

        $ppff = new Ppff();
        $ppff->nombres = $request->nombres;
        $ppff->apellidos = $request->apellidos;
        $ppff->ci = $request->ci;
        $ppff->fecha_nacimiento = $request->fecha_nacimiento;
        $ppff->telefono = $request->telefono;
        $ppff->parentesco = $request->parentesco;
        $ppff->ocupacion = $request->ocupacion;
        $ppff->direccion = $request->direccion;
        $ppff->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ppff $ppff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ppff $ppff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ppff $ppff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ppff $ppff)
    {
        //
    }
}
