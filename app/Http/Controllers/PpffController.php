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
        $ppffs = Ppff::all();
        return view('admin.ppffs.index', compact('ppffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.ppffs.create');
    }

    /**
     * Store a newly created resource in storage.
     */




    public function store(Request $request)
    {

        $datos = $request->all();
        return response()->json($datos);

        /*$request->validate([
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

        return redirect()->route('admin.ppffs.index');*/
    }


    public function store_ppff(Request $request)
    {



        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:ppffs',
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

        return redirect()->route('admin.ppffs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ppffs = Ppff::with('estudiantes')->findOrFail($id);
        return view('admin.ppffs.show', compact('ppffs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppffs = Ppff::findOrFail($id);
        return view('admin.ppffs.edit', compact('ppffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos= $request->all();
        //return response()->json($datos);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:ppffs,ci,' . $id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'parentesco' => 'required',
            'ocupacion' => 'required',
            'direccion' => 'required',
        ]);

        $ppffs = ppff::find($id);
        $ppffs->nombres = $request->nombres;
        $ppffs->apellidos = $request->apellidos;
        $ppffs->ci = $request->ci;
        $ppffs->fecha_nacimiento = $request->fecha_nacimiento;
        $ppffs->telefono = $request->telefono;
        $ppffs->parentesco = $request->parentesco;
        $ppffs->ocupacion = $request->ocupacion;
        $ppffs->direccion = $request->direccion;

        $ppffs->save();

        return redirect()->route('admin.ppffs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ppffs = ppff::find($id);
        $ppffs->delete();
        return redirect()->route('admin.ppffs.index');
    }
}
