<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //CONSULTAMOS(TRAEMOS) todas las gestiones que tenemos registrados en la base de datos y se pasa a la vista
        $gestiones = Gestion::all();
        return view('admin.gestiones.index', compact('gestiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.gestiones.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre'=>'required|string|max:255|unique:gestions',
        ]);

        $gestion= new Gestion();
        $gestion->nombre = $request->nombre;
        $gestion->save();
        return redirect()->route('admin.gestiones.index')->with('success', 'La gestion se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gestion $gestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gestion= Gestion::find($id);
        return view('admin.gestiones.edit', compact('gestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validación del campo 'nombre'
        $request->validate([
            'nombre'=>'required|max:255|unique:gestions,nombre,' .$id,
        ]);

        // Busca el registro de la tabla 'gestions' con el ID proporcionado a traves del comnado "FIND"
        $gestion= Gestion::find($id);
        // Asigna el nuevo valor del campo 'nombre' enviado desde el formulario
        $gestion->nombre=$request->nombre;
        //Guarda ese nuenvo nombre
        $gestion->save();
        //redirije al index
        return redirect()->route('admin.gestiones.index')->with('mensaje', 'La gestion se ha actualizado correctamente.')
        ->with('icono', 'success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gestion $gestion, $id)
    {
        echo $id;
        $gestion= Gestion::find($id);
        $gestion->delete();

        return redirect()->route('admin.gestiones.index')->with('mensaje', 'La gestion se elimino correctamente.')
        ->with('icono', 'success');
    }
}
