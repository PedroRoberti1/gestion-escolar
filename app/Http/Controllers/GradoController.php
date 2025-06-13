<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Obtiene todos los niveles junto con sus grados relacionados (Eager Loading)
        $niveles = Nivel::with('grados')->orderBy('nombre', 'asc')->get();

        //Retorna la vista 'admin..grados.index' y le pasa la variable $niveles
        return view('admin.grados.index', compact('niveles'));
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
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'nivel' => 'required|exists:nivels,id',
            'nombre_create' => 'required|',
        ]);

        $grado = new Grado();
        $grado->nombre = $request->nombre_create;
        $grado->nivel_id = $request->nivel;
        $grado->save();

        return redirect()->route('admin.grados.index')->with('mensaje', 'El grado se guardo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        // Buscar el grado por su ID o lanzar error 404 si no se encuentra
        $grado_update = Grado::findOrFail($id);

        // Validar los datos enviados desde el formulario
        $validator = Validator::make($request->all(),[
            'nivel'=> 'required|exists:nivels,id',
            'nombre_update' =>'required|',
            
        ]);

        // Si hay errores de validación, volver atrás con los errores, los datos del formulario y el ID del modal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Enviar errores de validació
                ->withInput() // Mantener los datos del formulario
                ->with('modal_id', $grado_update->id); // Mantener abierto el modal específico
        }

        // Si todo está validado, actualizar los datos del grado}
        $grado_update->nivel_id = $request->nivel;
        $grado_update->nombre = $request->nombre_update;


        // Guardar los cambios en la base de datos
        $grado_update->save();



        return redirect()->route('admin.grados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grado $grado, $id)
    {
        $grado =  Grado::find($id);
        $grado->delete();
        return redirect()->route('admin.grados.index');
    }
}
 