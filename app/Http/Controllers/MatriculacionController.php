<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Matriculacion;
use App\Models\Paralelo;
use App\Models\Grado;
use App\Models\Nivel;
use App\Models\Gestion;
use App\Models\Turno;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class MatriculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculaciones = Matriculacion::with('estudiante', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->get();
        return view('admin.matriculaciones.index', compact('matriculaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turnos = Turno::all();
        $estudiantes = Estudiante::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::all();
        $paralelos = Paralelo::all();
        return view('admin.matriculaciones.create', compact('turnos', 'estudiantes', 'gestiones', 'niveles', 'grados', 'paralelos'));
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

    public function buscar_grados($id)
    {
        $grados = Grado::where('nivel_id', $id)->pluck('nombre', 'id');

        if ($grados->isEmpty()) {
            return response()->json(['error' => 'No se encontraron grados para el nivel seleccionado.'], 404);
        }

        return response()->json($grados);
    }



    public function buscar_paralelos($id)
    {
        $paralelos = Paralelo::where('grado_id', $id)->pluck('nombre', 'id');

        if ($paralelos->isEmpty()) {
            return response()->json(['error', 'no se ha podido encontrar ningun paralelo'], 404);
        }
        return response()->json($paralelos);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required',
            'turno_id' => 'required',
            'gestion_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'paralelo_id' => 'required',
            'fecha_matriculacion' => 'required',


        ]);

        //validacion para estudiante ya matriculados

        $estudiante_duplicado = Matriculacion::where('estudiante_id', $request->estudiante_id)
            ->where('turno_id', $request->turno_id)
            ->where('gestion_id', $request->gestion_id)
            ->where('nivel_id', $request->nivel_id)
            ->where('grado_id', $request->grado_id)
            ->where('paralelo_id', $request->paralelo_id)
            ->exists();

        if ($estudiante_duplicado) {
            return redirect()->back()->with([
                'mensaje' => 'El estudiante ya esta matriculado',
                'icono' => 'error',
            ]);
        }

        $matriculaciones = new Matriculacion();
        $matriculaciones->estudiante_id = $request->estudiante_id;
        $matriculaciones->turno_id = $request->turno_id;
        $matriculaciones->gestion_id = $request->gestion_id;
        $matriculaciones->nivel_id = $request->nivel_id;
        $matriculaciones->grado_id = $request->grado_id;
        $matriculaciones->paralelo_id = $request->paralelo_id;
        $matriculaciones->fecha_matriculacion = $request->fecha_matriculacion;
        $matriculaciones->save();

        return redirect()->route('admin.matriculaciones.index')->with('mensaje', 'La matriculacion se realizo con exito');
    }



    public function pdf_matricula($id)
    {

        $configuracion = Configuracion::first();
        $matriculaciones = Matriculacion::with('estudiante.ppff', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);
        $path = public_path($configuracion->logo);
        $fotoEstudiantePath = public_path($matriculaciones->estudiante->foto);

        // Verificar que el archivo exista para evitar error
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $dataLogo = file_get_contents($path);
            $logoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($dataLogo);
        } else {
            $logoBase64 = null;
        }
        // Verificamos si el archivo de la foto del estudiante existe en la ruta especificada
        if (file_exists($fotoEstudiantePath)) {
            // Obtenemos la extensión del archivo (por ejemplo: jpg, png, gif)
            $typeFoto = pathinfo($fotoEstudiantePath, PATHINFO_EXTENSION);
            // Leemos el contenido binario del archivo de la foto
            $dataFoto = file_get_contents($fotoEstudiantePath);
            // Codificamos la imagen en base64 para poder usarla embebida en HTML
            // La cadena comienza con el tipo MIME, luego el dato en base64 separado por una coma
            $fotoBase64 = 'data:image/' . $typeFoto . ';base64,' . base64_encode($dataFoto);
        } else {
            // Si el archivo no existe, asignamos null para evitar errores posteriores
            $fotoBase64 = null;
        }


        $pdf = PDF::loadView('admin.matriculaciones.pdf', compact('configuracion', 'matriculaciones', 'logoBase64', 'fotoBase64'));
        $pdf->setPaper('letter', 'protrait');
        $pdf->setOption(['defaultFont' => 'sans-serf']);
        $pdf->setOptions(['isHtml5ParserEnabled' => true]);
        $pdf->setOptions(['isRemoteEnabled' => true]);

        return $pdf->stream('matriculas.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matriculaciones = Matriculacion::with('estudiante.ppff', 'estudiante.matriculaciones', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);
        return view('admin.matriculaciones.show', compact('matriculaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $matriculaciones = Matriculacion::with('estudiante.ppff', 'estudiante.matriculaciones', 'turno', 'gestion', 'nivel', 'grado', 'paralelo')->find($id);
        $turnos = Turno::all();
        $gestiones = Gestion::all();
        $niveles = Nivel::all();
        $grados = Grado::where('nivel_id', $matriculaciones->nivel_id)->get();
        $paralelos = Paralelo::where('grado_id', $matriculaciones->grado_id)->get();
        $estudiantes = Estudiante::all();

        return view('admin.matriculaciones.edit', compact('matriculaciones', 'turnos', 'estudiantes', 'gestiones', 'niveles', 'grados', 'paralelos', 'estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $matriculaciones= Matriculacion::find($id);

        $request->validate([
            'estudiante_id' => 'required',
            'turno_id' => 'required',
            'gestion_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'paralelo_id' => 'required',
            'fecha_matriculacion' => 'required',
        ]);

        //validacion para estudiante ya matriculados

        $estudiante_duplicado= Matriculacion::where('estudiante_id', $request->estudiante_id)
        ->where('turno_id', $request->turno_id)
        ->where('gestion_id', $request->gestion_id)
        ->where('nivel_id', $request->nivel_id)
        ->where('grado_id', $request->grado_id)
        ->where('paralelo_id', $request->paralelo_id)
        ->where('id', '!=', $id)
        ->exists();

        if($estudiante_duplicado){
            return redirect()->back()->with([
                'mensaje'=> 'El estudiante ya se encuentra matriculado',
                'icono'=> 'error',
            ]);

            
        }


        $matriculaciones->estudiante_id=$request->estudiante_id;
        $matriculaciones->turno_id=$request->turno_id;
        $matriculaciones->gestion_id=$request->gestion_id;
        $matriculaciones->nivel_id=$request->nivel_id;
        $matriculaciones->grado_id=$request->grado_id;
        $matriculaciones->paralelo_id=$request->paralelo_id;
        $matriculaciones->fecha_matriculacion=$request->fecha_matriculacion;
        $matriculaciones->save();


        return redirect()->route('admin.matriculaciones.index')->with('mensaje', 'La matriculacion se realizo con exito');




    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matriculaciones= Matriculacion::find($id);
        $matriculaciones->delete();
        return redirect()->back();
    }
}
