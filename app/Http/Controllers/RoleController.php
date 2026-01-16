<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Obtiene todos los roles desde la base de datos.

    //Los pasa a la vista resources/views/roles/index.blade.php.


    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos=request()->all();

        //return response()->json($datos);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $rol = new Role();
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')->with('mensaje', 'realizado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {


        //Si no encuentra el registro con ese id, lanza automáticamente una excepción ModelNotFoundException.

        $rol = Role::findOrFail($id);

        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
        ]);


        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')->with('mensaje', 'ta bom');
    }


    public function Permisos($id)
    {

        $rol = Role::findOrFail($id);
        // Traemos todos los permisos de la base de datos, luego utilizamos groupBy para agrupar los elementos
        $permisos= Permission::all()->groupBy(function ($permisos){
            if(stripos($permisos->name, 'configuracion')!== false){return 'Configuracion del sistema';}
            if(stripos($permisos->name,'gestiones')!== false){return 'Gestion';}
            if(stripos($permisos->name, 'niveles')!== false){return 'Niveles';}
            if(stripos($permisos->name, 'grados')!== false){return 'Grados';}
            if(stripos($permisos->name, 'turnos')!== false){return 'Turnos';}            
            if(stripos($permisos->name, 'materias')!== false){return 'Materias';}
            if(stripos($permisos->name, 'matriculaciones')!== false){return 'Matriculacion';}
            if(stripos($permisos->name, 'paralelos')!==false){return 'Paralelos';}
            if(stripos($permisos->name, 'periodo')!==false){return 'Periodos';}
            if(stripos($permisos->name, 'roles')!==false){return 'Roles';}
            if(stripos($permisos->name, 'personal')!==false){return 'Personal docente y administrativo';}
            if(stripos($permisos->name, 'formaciones')!==false){return 'Formaciones del personal';}
            if(stripos($permisos->name, 'estudiantes')!==false){return 'Estudiantes';}
            if(stripos($permisos->name, 'ppffs')!==false){return 'Padres de familia';}
            if(stripos($permisos->name, 'asignaciones')!==false){return 'Asignaciones';}
        });
        return view('admin.roles.permisos', compact('rol', 'permisos'));


    }
   


    public function update_permisos(Request $request, $id)
    {
        $datos= $request->all();
        $datos= response()->json($datos);

        //$rol= Role::findOrFaild($id);
        //$rol->syncPermissions($request->permisos);

        //return redirect()->route('admin.roles.index');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Role::find($id);
        $rol->delete();
        return redirect()->route('admin.roles.index')->with('mensaje', 'ta bom');
    }
}
