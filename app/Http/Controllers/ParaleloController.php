<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Paralelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Pest\Laravel\delete;
use function Pest\Laravel\json;

class ParaleloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grados = Grado::with('paralelos')->orderBy('nombre', 'asc')->get();
        return view('admin.paralelos.index', compact('grados'));
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
        //$datos=request()->all();
        //return response()->json($datos);


        $request->validate([
            'grado' => 'required|exists:grados,id|',
            'nombre_create' => 'required|',
        ]);


        //Validar de que no exista ya un paralelo con el mismo nombre dentro de un determinado grado
        $existe = Paralelo::where('grado_id', $request->grado)->where('nombre', $request->nombre_create)->exists();

        if ($existe) {
            return back()->withErrors(['nombre_create' => 'Ese paralelo ya existe en el grado seleccionado'])->withInput();
        }

        $paralelo = new Paralelo();
        $paralelo->grado_id = $request->grado;
        $paralelo->nombre = $request->nombre_create;
        $paralelo->save();
        return redirect()->route('admin.paralelos.index')->with('mensaje', 'El paralelo se registro correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paralelo $paralelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paralelo $paralelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // $datos= request()->all();
        // return response()->json($datos);

        // Busca el paralelo por ID. Si no existe, lanza error 404.
        $paralelo = Paralelo::findOrFail($id);


        //Valida los campos del formulario.
        //- 'grado_update' debe existir en la tabla 'grados'.
        //- 'paralelo_update'  debe ser un texto requerido.

        $request->validate([
            'grado_update' => 'required|exists:grados,id',
            'paralelo_update' => 'required|string|max:255',
        ]);



        // Verifica si ya existe un paralelo con el mismo grado y nombre,
        // excluyendo el actual que se esta editando(para evitar duplicados)
        $existe = Paralelo::where('grado_id', $request->grado_update)
            ->where('nombre', $request->paralelo_update)
            ->where('id', '!=', $paralelo->id)
            ->exists();

        // Si ya existe uno igual, vuelve atras con error.
        if ($existe) {
            return back()->withErrors(['paralelo_update' => 'Ya existe un paralelo con ese nombre en ese grado'])->withInput();
        }

        // Si todo esta bien, actualiza los valores del paralelo.
        $paralelo->grado_id = $request->grado_update;
        $paralelo->nombre = $request->paralelo_update;

        // guarda los cambios en la base de datos.
        $paralelo->save();
        

        return redirect()->route('admin.paralelos.index')->with('mensaje', 'Hecho');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paralelo $paralelo, $id)
    {
        $paralelo = Paralelo::find($id);
        $paralelo->delete();
        return redirect()->route('admin.paralelos.index')->with('mensaje' . 'El paralelo se elimino con exito');
    }
}
