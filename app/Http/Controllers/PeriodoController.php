<?php

namespace App\Http\Controllers;

use App\Models\Gestion;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\delete;
use function Pest\Laravel\json;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las gestiones desde la base de datos,
        // junto con sus periodos relacionados utilizando Eager Loading (con 'with').
        // Esto evita múltiples consultas a la base de datos por cada gestión (problema N+1).
        // Además, las gestiones se ordenan alfabéticamente por el campo 'nombre' de forma ascendente.

        $gestiones = Gestion::with('periodos') // Carga los periodos relacionados con cada gestión
            ->orderBy('nombre', 'asc') // Ordena las gestiones por nombre A-Z
            ->get(); // Ejecuta la consulta y devuelve los resultados


        // Retorna la vista 'admin.gestiones.index', ubicada en:
        // resources/views/admin/gestiones/index.blade.php
        // Y le pasa la variable $gestiones para que se use en la vista.
        return view('admin.periodos.index', compact('gestiones'));
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
            'nombre_create' => 'required|string|max:255',
            'gestion' => 'required|exists:gestions,id',
        ]);

        $periodo = new Periodo();
        $periodo->nombre = $request->nombre_create;
        $periodo->gestion_id = $request->gestion;
        $periodo->save();

        return redirect()->route('admin.periodos.index')->with('mensaje', 'El periodo se ha almacenado con exito');

        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodo $perido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        //$datos=request()->all();
        //return response()->json($datos);

        
        // Busca el periodo con el ID recibido. Si no lo encuentra, lanza un error 404.
        $periodo = Periodo::findOrFail($id);

        $validator= Validator::make($request->all(),[
            'nombre_update' => 'required|string|max:255',
            'gestion_update' => 'required|exists:gestions,id',
        ]);


        if($validator->fails()){
            return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('modal_id', $periodo->id);
        }

        $periodo->nombre = $request->nombre_update;
        $periodo->gestion_id = $request->gestion_update;

        $periodo->save();


        return redirect()->route('admin.periodos.index')->with('mensaje', 'El periodo se actualizo con exito')->with('icon', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodo $periodo, $id)
    {

        $periodo = Periodo::find($id);
        $periodo->delete();

        return redirect()->route('admin.periodos.index')->with('text', 'El periodo se elimino con exito');
    }
}
