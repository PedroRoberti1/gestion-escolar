<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Paralelo;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Gestion;
use App\Models\Turno;
use Illuminate\Http\Request;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculaciones = Matriculacion::all();
        return view('admin.matriculaciones.index', compact('matriculaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turnos= Turno::all();
        $estudiantes= Estudiante::all();
        $gestiones= Gestion::all();
        $niveles = Nivel::all();
        $grados= Grado::all();
        $paralelos= Paralelo::all();
        return view('admin.matriculaciones.create', compact('turnos','estudiantes','gestiones', 'niveles', 'grados', 'paralelos'));


    }


    public function buscar_estudiante($id)
    {
        // Busca un estudiante por su ID, incluyendo los datos relacionados del modelo 'usuario' mediante Eloquent (relación 'with')
        $estudiante = Estudiante::with('usuario', 'matriculaciones.turno', 'matriculaciones.gestion', 'matriculaciones.nivel', 'matriculaciones.grado', 'matriculaciones.paralelo')->find($id);
        // Si no se encuentra el estudiante, se devuelve una respuesta JSON con un mensaje de error
        if (!$estudiante) {
            return response()->json(['error', 'Estudiante no encontrado']);
        }

        // Si se encuentra el estudiante, se genera la URL completa de la foto 


        $estudiante->foto_url = url($estudiante->foto);
        // Devuelve toda la información del estudiante (incluyendo la relación con 'usuario' y la URL de la foto) en formato JSON

        return response()->json($estudiante);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Matriculacion $matriculacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matriculacion $matriculacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matriculacion $matriculacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matriculacion $matriculacion)
    {
        //
    }
}
