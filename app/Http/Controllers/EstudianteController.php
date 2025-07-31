<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Ppff;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ppffs = Ppff::all();
        $roles = Roles::all();
        return view('admin.estudiantes.create', compact('ppffs', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'ppff_id' => 'required',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:estudiantes',
            'fecha_nacimiento' => 'required',

            'telefono' => 'required',
            'genero' => 'required',
            'email' => 'required|unique:users',
            'direccion' => 'required',
            'foto' => 'required',
        ]);

        $usuario = new User();
        $usuario->name = $request->apellidos . ' ' . $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $estudiante = new estudiante();
        $estudiante->usuario_id = $usuario->id;
        $estudiante->ppff_id = $request->ppff_id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->direccion = $request->direccion;
        $estudiante->genero = $request->genero;
        $estudiante->estado_estudiante = "activo";

        $fotoPath = $request->file('foto');
        $nombreFoto = time() . '-' . $fotoPath->getClientOriginalName();
        $rutaDestino = public_path('/uploads/fotos/estudiantes');
        $fotoPath->move($rutaDestino, $nombreFoto);
        $estudiante->foto = 'uploads/fotos/estudiantes/' . $nombreFoto;



        $estudiante->save();
        return redirect()->route('admin.estudiantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // informacion de estudiante que tiene relacion con usuario donde el id es= al id que se selecciona en el form
        $estudiante = Estudiante::with('usuario', 'ppff')->find($id);
        return view('admin.estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ppffs = Ppff::all();
        $roles = Roles::all();
        $estudiante = Estudiante::with('usuario', 'ppff')->findOrfail($id);

        return view('admin.estudiantes.edit', compact('estudiante', 'roles', 'ppffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $estudiante = Estudiante::findOrFail($id);
        $usuario = User::findOrFail($estudiante->usuario_id);
        $request->validate([
            'ppff_id' => 'required',
            'rol' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'ci' => 'required|unique:estudiantes,ci,' . $id,
            'fecha_nacimiento' => 'required',

            'telefono' => 'required',
            'genero' => 'required',
            'email' => 'required|unique:users,email,' . $usuario->id,
            'direccion' => 'required',
        ]);

        $usuario->name = $request->apellidos . ' ' . $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);

        $estudiante->usuario_id = $usuario->id;
        $estudiante->ppff_id = $request->ppff_id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->direccion = $request->direccion;
        $estudiante->genero = $request->genero;
        $estudiante->estado_estudiante = "activo";


        if ($request->hasFile('foto')) {
            if ($estudiante->foto && file_exists(public_path($estudiante->foto))) {
                unlink(public_path($estudiante->foto));
            }


            $fotoPath = $request->file('foto');
            $nombreFoto = time() . '-' . $fotoPath->getClientOriginalName();
            $rutaDestino = public_path('/uploads/fotos/estudiantes');
            $fotoPath->move($rutaDestino, $nombreFoto);
            $estudiante->foto = 'uploads/fotos/estudiantes/' . $nombreFoto;
        }

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $usuario= User::findOrFail($estudiante->usuario_id);

        // Verifica si el estudiante tiene una foto asignada y si el archivo existe en el sistema de archivos

        if ($estudiante->foto && file_exists(public_path($estudiante->foto))) {
            // Elimina (borra) el archivo de imagen del sistema de archivos

            unlink(public_path($estudiante->foto));
        }
        $usuario->delete();
        $estudiante->delete();
        return redirect()->route('admin.estudiantes.index');
    }
}
