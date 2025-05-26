<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles = Nivel::all();
        return view('admin.niveles.index', compact('niveles'));
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
            'nombre_create' => 'required|max:255|unique:nivels,nombre',
        ]);

        $nivel = new Nivel();
        $nivel->nombre = $request->nombre_create;
        $nivel->save();
        return redirect()->route('admin.niveles.index')->with('success', 'El nivel se creo con exito')->with('icono', 'El nivel se creo con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Validamos el campo 'nombre'- es requerido, maximo de 255 caracteres, y unico en la tabla 'nivels'
        $validate = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:nivels,nombre,' . $id,
        ]);

        //Verificar si la validacion fallo
        if ($validate->fails()) {
            // Si hay errores en la validacion te redirige de vuelta con los errores de la validadcion.
            return redirect()->back()
                ->withErrors($validate)
                ->withInput()
                ->with('modal_id', $id);
        }
        //Buscar el nivel por su ID
        $nivel = Nivel::find($id);
        //Actualizar el nombre con el nuevo valor recibido en el formulario
        $nivel->nombre = $request->nombre;
        //Guardar los cambios en la base de datos
        $nivel->save();

        //Redirigir al indice con un mensaje de exito y un icono para mostrar feedback al usuario
        return redirect()->route('admin.niveles.index')->with('mensaje', 'El nivel se ha actualizado con exito!')->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $nivel, $id)
    {
        $nivel = Nivel::find($id);
        $nivel->delete();

        return redirect()->route('admin.niveles.index')->with('mensaje', 'El nivel se ha eliminado con exito')->with('icono', 'success');
    }
}
