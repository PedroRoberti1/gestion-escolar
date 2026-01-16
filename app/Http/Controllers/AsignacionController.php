<?php

namespace App\Http\Controllers;

use App\Models\Asignacion;
use App\Models\Formacion;
use App\Models\Gestion;
use App\Models\Grado;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\Personal;
use App\Models\Paralelo;
use App\Models\Turno;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones = Asignacion::with('personal', 'gestion', 'nivel', 'grado', 'paralelo', 'materia', 'turno')->get();
        return view('admin.asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grados = Grado::all();
        $niveles = Nivel::all();
        $gestiones = Gestion::all();
        $turnos = Turno::all();
        $materias = Materia::all();
        $docentes = Personal::where('tipo', 'docente')->get();
        return view('admin.asignaciones.create', compact('docentes', 'turnos', 'gestiones', 'niveles', 'grados', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function buscar_docente($id)
    {
        $docentes = Personal::with('usuario', 'formaciones')->find($id);


        if (!$docentes) {
            return response()->json(['error', 'Docente no encontrado']);
        }

        $docentes->foto_url = url($docentes->foto);
        return response()->json($docentes);
    }
    public function store(Request $request)
    {
        $request->validate([
            'personal_id' => 'required',
            "turno_id" => 'required',
            "gestion_id" => "required",
            "nivel_id" => "required",
            "grado_id" => "required",
            "materia_id" => "required",
            "paralelo_id" => "required",
            "fecha_asignacion" => "required",
        ]);

        $asignacion_duplicado = Asignacion::where('personal_id', $request->personal_id)
            ->where('turno_id', $request->turno_id)
            ->where('gestion_id', $request->gestion_id)
            ->where('nivel_id', $request->nivel_id)
            ->where('grado_id', $request->grado_id)
            ->where('materia_id', $request->materia_id)
            ->where('paralelo_id', $request->paralelo_id)
            ->exists();

        if ($asignacion_duplicado) {
            return redirect()->back()->with([
                'mensaje' => 'El docente ya tiene la asignacion',
                'icono' => 'error',
            ]);
        }

        $asignaciones = new Asignacion();
        $asignaciones->personal_id = $request->personal_id;
        $asignaciones->turno_id = $request->turno_id;
        $asignaciones->gestion_id = $request->gestion_id;
        $asignaciones->nivel_id = $request->nivel_id;
        $asignaciones->materia_id = $request->materia_id;
        $asignaciones->grado_id = $request->grado_id;
        $asignaciones->paralelo_id = $request->paralelo_id;
        $asignaciones->fecha_asignacion = $request->fecha_asignacion;
        $asignaciones->save();

        return redirect()->route('admin.asignaciones.index')->with([
            'mrensaje' => 'La asignacion se guardo con exito',
            'icono' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asignaciones = Asignacion::with('personal', 'personal.formaciones', 'gestion', 'nivel', 'grado', 'paralelo', 'materia', 'turno')->find($id);
        return view('admin.asignaciones.show', compact('asignaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asignaciones = Asignacion::with('personal', 'personal.formaciones', 'gestion', 'nivel', 'grado', 'paralelo', 'materia', 'turno')->find($id);
        $docentes = Personal::where('tipo', 'docente')->get();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::where('nivel_id', $asignaciones->nivel_id)->get();
        $paralelos = Paralelo::where('grado_id', $asignaciones->grado_id)->get();
        $materias = Materia::all();
        $turnos = Turno::all();
        $formacion = Formacion::all();
        return view('admin.asignaciones.edit', compact('asignaciones', 'docentes', 'gestiones', 'niveles', 'materias', 'turnos', 'formacion', 'grados', 'paralelos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asignaciones = Asignacion::find($id);
        $request->validate([
            'personal_id' => 'required',
            "turno_id" => 'required',
            "gestion_id" => "required",
            "nivel_id" => "required",
            "grado_id" => "required",
            "materia_id" => "required",
            "paralelo_id" => "required",
            "fecha_asignacion" => "required",
        ]);

        $asignacion_duplicado = Asignacion::where('personal_id', $request->personal_id)
            ->where('turno_id', $request->turno_id)
            ->where('gestion_id', $request->gestion_id)
            ->where('nivel_id', $request->nivel_id)
            ->where('grado_id', $request->grado_id)
            ->where('materia_id', $request->materia_id)
            ->where('paralelo_id', $request->paralelo_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($asignacion_duplicado) {
            return redirect()->back()->with([
                'mensaje' => 'El docente ya tiene la asignacion',
                'icono' => 'error',
            ]);
        }


        $asignaciones->personal_id = $request->personal_id;
        $asignaciones->turno_id = $request->turno_id;
        $asignaciones->gestion_id = $request->gestion_id;
        $asignaciones->nivel_id = $request->nivel_id;
        $asignaciones->materia_id = $request->materia_id;
        $asignaciones->grado_id = $request->grado_id;
        $asignaciones->paralelo_id = $request->paralelo_id;
        $asignaciones->fecha_asignacion = $request->fecha_asignacion;
        $asignaciones->save();

        return redirect()->route('admin.asignaciones.index')->with([
            'mrensaje' => 'La asignacion se guardo con exito',
            'icono' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asignaciones= Asignacion::find($id);
        $asignaciones->delete();
        return redirect()->route('admin.asignaciones.index')->with('mensaje', 'la asignacion se elimino con exito');
    }
}
