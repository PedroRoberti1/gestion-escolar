<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Obtener todos los registros de la tabla 'turnos' usando el modelo Turno.
        // Esto ejecuta una consulta SQL equivalente a: SELECT * FROM turnos;
        $turnos = Turno::all();
        // 2. Retornar una vista llamada 'admin.turnos.index'.
        // Se le pasa la variable $turnos a la vista usando la función compact().
        // Esto le permite a la vista acceder a la variable $turnos para mostrar los datos.
        return view('admin.turnos.index', compact('turnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.turnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:turnos,nombre',
        ]);

        $turno = new Turno();
        $turno->nombre = $request->nombre;
        $turno->save();
        return redirect()->route('admin.turnos.index')->with('mensaje', 'El turno se registro correctamente')->with('success', 'El turno se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turno $turno)
    {
        //
    }

    // Método que se ejecuta al querer editar un turno específico
    public function edit($id)
    {
        // Busca en la base de datos un turno por su ID
        // Si no encuentra el turno, devuelve null
        $turno = Turno::find($id);

        // Retorna la vista 'admin.turnos.edit' y le pasa la variable $turno
        // para que esté disponible en la vista
        return view('admin.turnos.edit', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Validamos el campo 'nombre' - es requerido, maximo de 255 caracteres, y unico en la tabla 'turnos'
        $validate= Validator::make($request->all(),[
            'nombre' => 'required|string|max:255|unique:turnos,nombre,' .$id,
        ]);

        
        //Busca el turno seleccionado por su id
        $turno=Turno::find($id);
        //modifica el nombre por el nombre que recibio en el formulario
        $turno->nombre=$request->nombre;
        //guarda los parametros.
        $turno->save();

        return redirect()->route('admin.turnos.index')->with('mensaje','El turno se actualizo correctamente')->with('icono','success' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turno $turno, $id)
    {
        echo $id;
        $turno = Turno::find($id);
        $turno->delete();

        return redirect()->route('admin.turnos.index');
    }
}
