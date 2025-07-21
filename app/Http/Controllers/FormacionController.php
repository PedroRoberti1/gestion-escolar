<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use App\Models\Personal;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        $personal = Personal::find($id);
        //buscamos las formaciones donde el personal_id sea igual a $id->get
        $formaciones = Formacion::where('personal_id', $id)->get();
        return view('admin.formaciones.index', compact('formaciones', 'personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        return view('admin.formaciones.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos= request()->all();
        //return response()->json($datos);


        request()->validate([
            'personal_id' => 'required',
            'titulo' => 'string|required',
            'institucion' => 'string|required',
            'nivel' => 'required',
            'fecha_graduacion' => 'required',
            'archivo' => 'required',
        ]);

        $formacion = new Formacion();
        $formacion->personal_id = $request->personal_id;
        $formacion->titulo = $request->titulo;
        $formacion->institucion = $request->institucion;
        $formacion->nivel = $request->nivel;
        $formacion->fecha_graduacion = $request->fecha_graduacion;

        // Obtiene el archivo cargado desde el formulario con el name="archivo"
        $fotoPath = $request->file('archivo');

        // Genera un nuevo nombre único para el archivo usando el timestamp actual + el nombre original
        $nombreArchivo = time() . '-' . $fotoPath->getClientOriginalName();

        // Define la ruta completa del directorio de destino dentro de la carpeta 'public'
        $rutaDestino = public_path('uploads/formaciones');

        // Mueve el archivo cargado desde la carpeta temporal a la carpeta de destino, con el nuevo nombre
        $fotoPath->move($rutaDestino, $nombreArchivo);

        // Guarda en la propiedad 'archivo' del modelo el path relativo del archivo guardado (para usarlo luego al mostrar)
        $formacion->archivo = 'uploads/formaciones/' . $nombreArchivo;


        $formacion->save();


        return redirect()->route('admin.formaciones.index', $request->personal_id)->with('success', 'Se creo correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formacion $formacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $formacion = Formacion::findOrFail($id);
        return view('admin.formaciones.edit', compact('formacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'string|required',
            'institucion' => 'string|required',
            'nivel' => 'required',
            'fecha_graduacion' => 'required',
            'archivo' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $formacion = Formacion::findOrFail($id);
        $formacion->titulo = $request->titulo;
        $formacion->institucion = $request->institucion;
        $formacion->nivel = $request->nivel;
        $formacion->fecha_graduacion = $request->fecha_graduacion;

        if ($request->hasFile('archivo')) {

            if ($formacion->archivo && file_exists(public_path($formacion->archivo))) {
                unlink(public_path($formacion->archivo));
            }

            $fotoPath = $request->file('archivo');
            $nombreArchivo = time() . '-' . $fotoPath->getClientOriginalName();
            $rutaDestino = public_path('uploads/formaciones');
            $fotoPath->move($rutaDestino, $nombreArchivo);
            $formacion->archivo = 'uploads/formaciones/' . $nombreArchivo;
        }
        $formacion->save();



        return redirect()->route('admin.formaciones.index', $formacion->personal_id)->with('success', 'Se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $formacion = Formacion::findOrFail($id);

        // Verifica si existe un archivo guardado en el campo 'archivo' de la formación
        // y si el archivo realmente está presente en el sistema de archivos

        if ($formacion->archivo && file_exists(public_path($formacion->archivo))) {
            // Elimina físicamente el archivo anterior del disco usando su ruta completa
            // Esto se hace para evitar acumular archivos viejos que ya no se usan
            unlink(public_path($formacion->archivo));
        }



        $formacion->delete($id);
        return redirect()->route('admin.formaciones.index', $formacion->personal_id);
    }
}
