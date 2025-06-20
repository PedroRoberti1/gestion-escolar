<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PeriodoController;
use App\http\Controllers\TurnoController;
use App\http\Controllers\GradoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=> false]);

// Ruta que apunta a /home y muestra el dashboard del administrador.
// Usa el método 'index' del AdminController.
// Se protege con el middleware 'auth' para que solo usuarios autenticados puedan acceder.
// Se le asigna el nombre 'admin.index.home' para poder generar enlaces con route('admin.index.home')

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');

// Ruta que apunta a /admin y también muestra el dashboard del administrador.
// Es idéntica a la anterior en funcionalidad, pero con una URL y nombre de ruta diferentes.
// Se usa para permitir múltiples accesos al mismo contenido y reutilizar el método del controlador.
// Se le asigna el nombre 'admin.index' para usar con route('admin.index')
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


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


Route::middleware('auth')->group(function () {
    //Ruta para la seccion de configuracion(seccion principal)
    route::get('/admin/grados', [GradoController::class, 'index'])->name('admin.grados.index');
    //ruta para la seccion de crear una nueva gestion educativa
    Route::post('/admin/grados/store', [GradoController::class, 'store'])->name('admin.grados.store');
    route::put('/admin/grados/{id}', [GradoController::class, 'update'])->name('admin.grados.update ');
    route::delete('/admin/grados/{id}', [GradoController::class, 'destroy'])->name('admin.grados.destroy ');
});
