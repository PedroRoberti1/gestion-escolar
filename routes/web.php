<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\NivelController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


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
