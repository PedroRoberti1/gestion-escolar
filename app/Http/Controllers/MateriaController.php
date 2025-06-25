<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
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
        //$datos= request()->all();
        //return response()->json($datos);

        $request->validate([
            'nombre_create' => 'string|max:255|required',
        ]);


        $existe = Materia::where('nombre', $request->nombre_create)->exists();

        if ($existe) {
            return back()->withErrors(['nombre_create' => 'Esa materia ya extiste'])->withInput();
        }

        $materia = new Materia();
        $materia->nombre = $request->nombre_create;
        $materia->save();

        return redirect()->route('admin.materias.index')->with('mensaje', 'la materia se guardo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre_update' => 'required|string|max:255',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal_id', $materia->id);
        }

        $existe= Materia::where('nombre',$request->nombre_update)->where('id','!=',$materia->id)->exists();

        if($existe){
            return back()
            ->withErrors(['nombre_update'=>'No se puede actualizar a ese nombre por que ya existe'])
            ->withInput()
            ->with('modal_id', $materia->id);
        }

        $materia->nombre = $request->nombre_update;
        $materia->save();

        return redirect()->route('admin.materias.index')->with('mensaje', 'la materia se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();

        return redirect()->route('admin.materias.index')->with('mensaje', 'la materia se actualizo correctamente');
    }
}
