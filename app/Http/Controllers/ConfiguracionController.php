<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        //aca buscamos las fuentes para las divisas (las distintas monedasd del mundo)
        $jsonData = file_get_contents('https://api.hilariweb.com/divisas');
        $divisas = json_decode($jsonData, true);
        $configuracion = Configuracion::first();
        return view('admin.configuracion.index', compact('configuracion', 'divisas'));
    }

    public function store(Request $request)
    {


        //Validacion de datos enviados por index.blade.php!
        $request->validate([
            'logo' => 'image|mimes:jpeg, png, jpg',
            'nombre' => 'required',
            'descripcion' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'divisa' => 'required',
            'correo_electronico' => 'required|email',

        ]);

        //BUSCAR si exits la configuracion(Si ya estan estos datos registrados)

        $configuracion = Configuracion::first();

        if ($configuracion) {
            //ACTUALIZAR
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->correo_electronico = $request->correo_electronico;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                //ELIMINAR EL LOGO ANTERIOR!
                if ($configuracion->logo && file_exists(public_path($configuracion->logo))) {
                    unlink(public_path($configuracion->logo));
                }
                //Guardar nuevo logo

                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }
            $configuracion->save();
            return redirect()->route('admin.configuracion.index')->with('mensaje', 'La configuración se actualizó correctamente.')->
            with('icono', 'success');
        } else {

            //Crea una nueva configuracion!
            $configuracion = new Configuracion();
            $configuracion->nombre = $request->nombre;
            $configuracion->descripcion = $request->descripcion;
            $configuracion->direccion = $request->direccion;
            $configuracion->telefono = $request->telefono;
            $configuracion->divisa = $request->divisa;
            $configuracion->correo_electronico = $request->correo_electronico;
            $configuracion->web = $request->web;

            if ($request->hasFile('logo')) {
                //INGRESA UN LOGO
                $logoPath = $request->file('logo');
                $nombreArchivo = time() . '_' . $logoPath->getClientOriginalName();
                $rutaDestino = public_path('uploads/logos');
                $logoPath->move($rutaDestino, $nombreArchivo);
                $configuracion->logo = 'uploads/logos/' . $nombreArchivo;
            }

            $configuracion->save();
            return redirect()->route('admin.configuracion.index')->with('mensaje', 'La configuración se actualizó correctamente.')
            ->with('icono', 'success');
        }
    }
}
