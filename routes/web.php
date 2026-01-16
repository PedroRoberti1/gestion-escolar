<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PpffController;
use App\Http\Controllers\MatriculacionController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Ruta que apunta a /home y muestra el dashboard del administrador.
// Usa el método 'index' del AdminController.
// Se protege con el middleware 'auth' para que solo usuarios autenticados puedan acceder.
// Se le asigna el nombre 'admin.index.home' para poder generar enlaces con route('admin.index.home')

Route::get('/home', [AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');


// Ruta que apunta a /admin y también muestra el dashboard del administrador.
// Es idéntica a la anterior en funcionalidad, pero con una URL y nombre de ruta diferentes.
// Se usa para permitir múltiples accesos al mismo contenido y reutilizar el método del controlador.
// Se le asigna el nombre 'admin.index' para usar con route('admin.index')
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');


//rutas para Las configuraciones del sistema 
//Este grupo de rutas estas
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('can:admin.configuracion.index');
    Route::get('/admin/configuracion/create', [ConfiguracionController::class, 'create'])->name('admin.configuracion.create')->middleware('can:admin.configuracion.create');
    Route::post('/admin/configuracion', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('can:admin.configuracion.store');
});

//rutas para las gestiones del sistema 

Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/gestiones', [GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('can:admin.gestiones.index');
    //ruta para la seccion de crear una nueva gestion educativa
    route::get('/admin/gestiones/create', [GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('can:admin.gestiones.create');
    route::post('/admin/gestiones/create', [GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('can:admin.gestiones.store');
    route::get('/admin/gestiones/{id}/edit', [GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('can:admin.gestiones.edit');
    route::put('/admin/gestiones/{id}', [GestionController::class, 'update'])->name('admin.gestiones.update ')->middleware('can:admin.gestiones.update');
    route::delete('/admin/gestiones/{id}', [GestionController::class, 'destroy'])->name('admin.gestiones.destroy ')->middleware('can:admin.gestiones.destroy');
});


//rutas para los niveles del sistema
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/niveles', [NivelController::class, 'index'])->name('admin.niveles.index')->middleware('can:admin.niveles.index');
    //ruta para la seccion de crear una nueva gestion educativa
    route::post('/admin/niveles/create', [NivelController::class, 'store'])->name('admin.niveles.store')->middleware('can:admin.niveles.store');
    route::put('/admin/niveles/{id}', [NivelController::class, 'update'])->name('admin.niveles.update ')->middleware('can:admin.niveles.update');
    route::delete('/admin/niveles/{id}', [NivelController::class, 'destroy'])->name('admin.niveles.destroy ')->middleware('can:admin.niveles.destroy');
});


//rutas para los turnos del sistema
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/turnos', [TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('can:admin.niveles.index');
    //ruta para la seccion de crear una nueva gestion educativa
    route::get('/admin/turnos/create', [TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('can:admin.niveles.create');
    route::post('/admin/turnos/create', [TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('can:admin.niveles.store');



    route::get('/admin/turnos/{id}/edit', [TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('can:admin.turnos.edit');
    route::put('/admin/turnos/{id}', [TurnoController::class, 'update'])->name('admin.turnos.update ')->middleware('can:admin.turnos.update');
    route::delete('/admin/turnos/{id}', [TurnoController::class, 'destroy'])->name('admin.turnos.destroy ')->middleware('can:admin.turnos.destroy');
});


//rutas para los periodos del sistema
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/periodos', [PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('can:admin.periodos.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/periodos/store', [PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('can:admin.periodos.store');
    route::put('/admin/periodos/{id}', [PeriodoController::class, 'update'])->name('admin.periodos.update ')->middleware('can:admin.periodos.update');
    route::delete('/admin/periodos/{id}', [PeriodoController::class, 'destroy'])->name('admin.periodos.destroy ')->middleware('can:admin.periodos.destroy');
});

// rutas para los grados 
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/grados', [GradoController::class, 'index'])->name('admin.grados.index')->middleware('can:admin.grados.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/grados/store', [GradoController::class, 'store'])->name('admin.grados.store')->middleware('can:admin.grados.store');
    route::put('/admin/grados/{id}', [GradoController::class, 'update'])->name('admin.grados.update ')->middleware('can:admin.grados.update');
    route::delete('/admin/grados/{id}', [GradoController::class, 'destroy'])->name('admin.grados.destroy ')->middleware('can:admin.grados.destroy');
});


//rutas para los paralelos

Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/paralelos', [ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('can:admin.paralelos.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/paralelos/store', [ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('can:admin.paralelos.store');
    route::put('/admin/paralelos/{id}', [ParaleloController::class, 'update'])->name('admin.paralelos.update ')->middleware('can:admin.paralelos.update');
    route::delete('/admin/paralelos/{id}', [ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy ')->middleware('can:admin.paralelos.destroy');
});


//rutas para las materias
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/materias', [MateriaController::class, 'index'])->name('admin.materias.index')->middleware('can:admin.materias.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/materias/store', [MateriaController::class, 'store'])->name('admin.materias.store')->middleware('can:admin.materias.store');
    route::put('/admin/materias/{id}', [MateriaController::class, 'update'])->name('admin.materias.update ')->middleware('can:admin.materias.update');
    route::delete('/admin/materias/{id}', [MateriaController::class, 'destroy'])->name('admin.materias.destroy ')->middleware('can:admin.materias.destroy');
});



//rutas para LOS roles.
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('can:admin.roles.index');


    //ruta para la seccion de crear una nueva gestion educativa
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create')->middleware('can:admin.roles.create');
    Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('can:admin.roles.store');

    Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('can:admin.roles.edit');
    Route::get('/admin/roles/{id}/permisos', [RoleController::class, 'permisos'])->name('admin.roles.permisos')->middleware('can:admin.roles.permisos');
    Route::post('/admin/roles/{id}', [RoleController::class, 'update_permisos'])->name('admin.roles.update_permisos')->middleware('auth', 'can:admin.roles.permisos');
    Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('can:admin.roles.destroy');


});

//rutas para el PERSONAL del sistema.

Route::middleware('auth')->group(function () {

    route::get('/admin/personal/{tipo}', [PersonalController::class, 'index'])->name('admin.personal.index')->middleware('can:admin.personal.index');

    Route::get('/admin/personal/create/{tipo}', [PersonalController::class, 'create'])->name('admin.personal.create')->middleware('can:admin.personal.create');

    Route::post('/admin/personal/create', [PersonalController::class, 'store'])->name('admin.personal.store')->middleware('can:admin.personal.store');

    route::get('/admin/personal/show/{id}', [PersonalController::class, 'show'])->name('admin.personal.show')->middleware('can:admin.personal.show');

    route::get('/admin/personal/{id}/edit', [PersonalController::class, 'edit'])->name('admin.personal.edit')->middleware('can:admin.personal.edit');

    route::put('/admin/personal/{id}', [PersonalController::class, 'update'])->name('admin.personal.update')->middleware('can:admin.personal.update');

    route::delete('/admin/personal/{id}', [PersonalController::class, 'destroy'])->name('admin.personal.destroy')->middleware('can:admin.personal.destroy');
});

// RUTAS para la FORMACION del personal.

Route::middleware('auth')->group(function () {

    Route::get('/admin/personal/{id}/formaciones', [FormacionController::class, 'index'])->name('admin.formaciones.index')->middleware('can:admin.formaciones.index');
    Route::get('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'create'])->name('admin.formaciones.create')->middleware('can:admin.formaciones.create');
    Route::post('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'store'])->name('admin.formaciones.store')->middleware('can:admin.formaciones.store');
    Route::get('/admin/personal/formaciones/{id}', [FormacionController::class, 'edit'])->name('admin.formaciones.edit')->middleware('can:admin.formaciones.edit');
    Route::put('/admin/personal/formaciones/{id}', [FormacionController::class, 'update'])->name('admin.formaciones.update')->middleware('can:admin.formaciones.update');
    Route::delete('/admin/personal/formaciones/{id}', [FormacionController::class, 'destroy'])->name('admin.formaciones.destroy')->middleware('can:admin.formaciones.destroy');
});


//RUTAS PARA LOS ESTUDIANTES
Route::middleware('auth')->group(function () {

    Route::get('/admin/estudiantes', [EstudianteController::class, 'index'])->name('admin.estudiantes.index')->middleware('can:admin.estudiantes.index');
    Route::get('/admin/estudiantes/create', [EstudianteController::class, 'create'])->name('admin.estudiantes.create')->middleware('can:admin.estudiantes.create');
    Route::post('/admin/estudiantes/create', [EstudianteController::class, 'store'])->name('admin.estudiantes.store')->middleware('can:admin.estudiantes.store');
    Route::get('/admin/estudiantes/{id}', [EstudianteController::class, 'show'])->name('admin.estudiantes.show')->middleware('can:admin.estudiantes.show');
    Route::get('/admin/estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('admin.estudiantes.edit')->middleware('can:admin.estudiantes.edit');
    Route::put('/admin/estudiantes/{id}', [EstudianteController::class, 'update'])->name('admin.estudiantes.update')->middleware('can:admin.estudiantes.update');
    Route::delete('/admin/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('admin.estudiantes.destroy')->middleware('can:admin.estudiantes.destroy');
});

//Ruta para padre de familia del estudiante

Route::middleware('auth')->group(function () {
    Route::get('/admin/ppffs/', [PpffController::class, 'index'])->name('admin.ppffs.index')->middleware('can:admin.ppffs.index');
    Route::post('/admin/estudiantes/ppff/create', [PpffController::class, 'store'])->name('admin.estudiantes.ppffs.store')->middleware('can:admin.estudiantes.ppffs.store');
    Route::get('/admin/ppffs/create', [PpffController::class, 'create'])->name('admin.ppffs.create')->middleware('can:admin.ppffs.create');

    Route::post('/admin/ppffs/create', [PpffController::class, 'store_ppff'])->name('admin.ppffs.store')->middleware('can:admin.ppffs.store');

    Route::get('/admin/ppffs/{id}', [PpffController::class, 'show'])->name('admin.ppffs.show')->middleware('can:admin.ppffs.show');
    
    Route::get('/admin/ppffs/{id}/edit', [PpffController::class, 'edit'])->name('admin.pffs.edit')->middleware('can:admin.ppffs.edit');
    Route::put('/admin/ppffs/{id}', [PpffController::class, 'update'])->name('admin.ppffs.update')->middleware('can:admin.ppffs.update');
    Route::delete('/admin/ppffs/{id}', [PpffController::class, 'destroy'])->name('admin.ppffs.destroy')->middleware('can:admin.ppffs.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/admin/matriculaciones', [MatriculacionController::class, 'index'])->name('admin.matriculaciones.index')->middleware('can:admin.matriculaciones.index');

    Route::get('/admin/matriculaciones/create', [MatriculacionController::class, 'create'])->name('admin.matriculaciones.create')->middleware('can:admin.matriculaciones.create');

    Route::post('/admin/matriculaciones/create', [MatriculacionController::class, 'store'])->name('admin.matriculaciones.store')->middleware('can:admin.matriculaciones.store');

    Route::get('admin/matriculaciones/buscar_estudiante/{id}', [MatriculacionController::class, 'buscar_estudiante'])->name('admin.matriculaciones.buscar_estudiante')->middleware('can:admin.matriculaciones.buscar_estudiante');

    Route::get('admin/matriculaciones/buscar_grado/{id}', [MatriculacionController::class, 'buscar_grados'])->name('admin.matriculaciones.buscar_grados')->middleware('can:admin.matriculaciones.buscar_grados');

    Route::get('admin/matriculaciones/buscar_paralelo/{id}', [MatriculacionController::class, 'buscar_paralelos'])->name('admin.matriculaciones.buscar_paralelos')->middleware('can:admin.matriculaciones.buscar_paralelos');

    Route::get('admin/matriculaciones/pdf/{id}', [MatriculacionController::class, 'pdf_matricula'])->name('admin.matriculaciones.pdf_matricula')->middleware('can:admin.matriculaciones.pdf_matricula');

    Route::get('admin/matriculaciones/{id}', [MatriculacionController::class, 'show'])->name('admin.matriculaciones.show')->middleware('can:admin.matriculaciones.show');

    Route::get('/admin/matriculaciones/{id}/edit', [MatriculacionController::class, 'edit'])->name('admin.matriculaciones.edit')->middleware('can:admin.matriculaciones.edit');

    Route::put('/admin/matriculaciones/{id}', [MatriculacionController::class, 'update'])->name('admin.matriculaciones.update')->middleware('can:admin.matriculaciones.update');

    Route::delete('/admin/matriculaciones/{id}',[MatriculacionController::class, 'destroy'])->name('admin.matriculaciones.destroy')->middleware('can:admin.matriculaciones.destroy');


});

// AGRUPACION DE RUTAS PARA ASIGNACIONES PROTEGIDAS POR MIDDLEWARE!
Route::middleware('auth')->group(function(){
    Route::get('/admin/asignaciones/', [AsignacionController::class, 'index'])->name('admin.asignaciones.index')->middleware('can:admin.asignaciones.index');

    Route::get('/admin/asignaciones/create', [AsignacionController::class, 'create'])->name('admin.asignaciones.create')->middleware('can:admin.asignaciones.create');

    Route::post('/admin/asignaciones/create', [AsignacionController::class, 'store'])->name('admin.asignaciones.store')->middleware('can:admin.asignaciones.store');
    
    Route::get('/admin/asignaciones/buscar_docente/{id}', [AsignacionController::class, 'buscar_docente'])->name('admin.asignaciones.buscar_docente')->middleware('can:admin.asignaciones.buscar_docente');

    Route::get('/admin/asignaciones/{id}', [AsignacionController::class, 'show'])->name('admin.asignaciones.show')->middleware('can:admin.asignaciones.show');

    Route::get('/admin/asignaciones/{id}/edit',[AsignacionController::class, 'edit'])->name('admin.asignaciones.edit')->middleware('can:admin.asignaciones.edit');

    Route::put('/admin/asignaciones/{id}', [AsignacionController::class, 'update'])->name('admin.asignaciones.update')->middleware('can:admin.asignaciones.update');

    Route::delete('/admin/asignaciones/{id}', [AsignacionController::class, 'destroy'])->name('admin.asignaciones.destroy')->middleware('can:admin.asignaciones.destroy');





});
