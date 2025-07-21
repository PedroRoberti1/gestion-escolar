<?php

use App\Http\Controllers\AdminController;
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
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Ruta que apunta a /home y muestra el dashboard del administrador.
// Usa el método 'index' del AdminController.
// Se protege con el middleware 'auth' para que solo usuarios autenticados puedan acceder.
// Se le asigna el nombre 'admin.index.home' para poder generar enlaces con route('admin.index.home')

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');

// Ruta que apunta a /admin y también muestra el dashboard del administrador.
// Es idéntica a la anterior en funcionalidad, pero con una URL y nombre de ruta diferentes.
// Se usa para permitir múltiples accesos al mismo contenido y reutilizar el método del controlador.
// Se le asigna el nombre 'admin.index' para usar con route('admin.index')
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


//rutas para Las configuraciones del sistema 
//Este grupo de rutas estas
Route::middleware('auth')->group(function () {
    Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index');
    Route::get('/admin/configuracion/create', [ConfiguracionController::class, 'create'])->name('admin.configuracion.create');
    Route::post('/admin/configuracion', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store');
});

//rutas para las gestiones del sistema 

Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/gestiones', [GestionController::class, 'index'])->name('admin.gestiones.index');
    //ruta para la seccion de crear una nueva gestion educativa
    route::get('/admin/gestiones/create', [GestionController::class, 'create'])->name('admin.gestiones.create');
    route::post('/admin/gestiones/create', [GestionController::class, 'store'])->name('admin.gestiones.store');
    route::get('/admin/gestiones/{id}/edit', [GestionController::class, 'edit'])->name('admin.gestiones.edit');
    route::put('/admin/gestiones/{id}', [GestionController::class, 'update'])->name('admin.gestiones.update ');
    route::delete('/admin/gestiones/{id}', [GestionController::class, 'destroy'])->name('admin.gestiones.destroy ');
});


//rutas para los niveles del sistema
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/niveles', [NivelController::class, 'index'])->name('admin.niveles.index');
    //ruta para la seccion de crear una nueva gestion educativa
    route::post('/admin/niveles/create', [NivelController::class, 'store'])->name('admin.niveles.store');
    route::put('/admin/niveles/{id}', [NivelController::class, 'update'])->name('admin.niveles.update ');
    route::delete('/admin/niveles/{id}', [NivelController::class, 'destroy'])->name('admin.niveles.destroy ');
});


//rutas para los turnos del sistema
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/turnos', [TurnoController::class, 'index'])->name('admin.turnos.index');
    //ruta para la seccion de crear una nueva gestion educativa
    route::get('/admin/turnos/create', [TurnoController::class, 'create'])->name('admin.turnos.create');
    route::post('/admin/turnos/create', [TurnoController::class, 'store'])->name('admin.turnos.store');



    route::get('/admin/turnos/{id}/edit', [TurnoController::class, 'edit'])->name('admin.turnos.edit');
    route::put('/admin/turnos/{id}', [TurnoController::class, 'update'])->name('admin.turnos.update ');
    route::delete('/admin/turnos/{id}', [TurnoController::class, 'destroy'])->name('admin.turnos.destroy ');
});


//rutas para los periodos del sistema
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/periodos', [PeriodoController::class, 'index'])->name('admin.periodos.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/periodos/store', [PeriodoController::class, 'store'])->name('admin.periodos.store');
    route::put('/admin/periodos/{id}', [PeriodoController::class, 'update'])->name('admin.periodos.update ');
    route::delete('/admin/periodos/{id}', [PeriodoController::class, 'destroy'])->name('admin.periodos.destroy ');
});

// rutas para los grados 
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/grados', [GradoController::class, 'index'])->name('admin.grados.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/grados/store', [GradoController::class, 'store'])->name('admin.grados.store');
    route::put('/admin/grados/{id}', [GradoController::class, 'update'])->name('admin.grados.update ');
    route::delete('/admin/grados/{id}', [GradoController::class, 'destroy'])->name('admin.grados.destroy ');
});


//rutas para los paralelos

Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/paralelos', [ParaleloController::class, 'index'])->name('admin.paralelos.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/paralelos/store', [ParaleloController::class, 'store'])->name('admin.paralelos.store');
    route::put('/admin/paralelos/{id}', [ParaleloController::class, 'update'])->name('admin.paralelos.update ');
    route::delete('/admin/paralelos/{id}', [ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy ');
});


//rutas para las materias
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/materias', [MateriaController::class, 'index'])->name('admin.materias.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/materias/store', [MateriaController::class, 'store'])->name('admin.materias.store');
    route::put('/admin/materias/{id}', [MateriaController::class, 'update'])->name('admin.materias.update ');
    route::delete('/admin/materias/{id}', [MateriaController::class, 'destroy'])->name('admin.materias.destroy ');
});



//rutas para LOS roles.
Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');


    //ruta para la seccion de crear una nueva gestion educativa
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store');

    Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit ');
    Route::put('/admin/roles/permisos/{id}', [RoleController::class, 'permisos'])->name('admin.roles.permisos ');
    Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update ');

    Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy ');
});

//rutas para el PERSONAL del sistema.

Route::middleware('auth')->group(function () {

    route::get('/admin/personal/{tipo}', [PersonalController::class, 'index'])->name('admin.personal.index');

    Route::get('/admin/personal/create/{tipo}', [PersonalController::class, 'create'])->name('admin.personal.create');

    Route::post('/admin/personal/create', [PersonalController::class, 'store'])->name('admin.personal.store');

    route::get('/admin/personal/show/{id}', [PersonalController::class, 'show'])->name('admin.personal.show');

    route::get('/admin/personal/{id}/edit', [PersonalController::class, 'edit'])->name('admin.personal.edit');

    route::put('/admin/personal/{id}', [PersonalController::class, 'update'])->name('admin.personal.update');

    route::delete('/admin/personal/{id}', [PersonalController::class, 'destroy'])->name('admin.personal.destroy');
});

// RUTAS para la FORMACION del personal.

Route::middleware('auth')->group(function () {

    Route::get('/admin/personal/{id}/formaciones', [FormacionController::class, 'index'])->name('admin.formaciones.index');
    Route::get('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'create'])->name('admin.formaciones.create');
    Route::post('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'store'])->name('admin.formaciones.store');
    Route::get('/admin/personal/formaciones/{id}',[FormacionController::class, 'edit'])->name('admin.formaciones.edit');
    Route::put('/admin/personal/formaciones/{id}',[FormacionController::class, 'update'])->name('admin.formaciones.update');
    Route::delete('/admin/personal/formaciones/{id}',[FormacionController::class, 'destroy'])->name('admin.formaciones.destroy');
});
