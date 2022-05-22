<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logadoController;
use App\Http\Controllers\casaController;
use App\Http\Controllers\peticionesController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/registrarse', function() {
    return view('formularioRegistro');
})->name('registrarmeVista');

Route::get('/cerrarSesion', [logadoController::class, 'cerrarSesion'])->name('cerrarSesion');
Route::post('/registrarse', [logadoController::class, 'registrarme'])->name('registrarme');
Route::post('/', [logadoController::class, 'logarme'])->name('logarme');
Route::get('/inicio', function() {
    if (Session::has('usuario')) {
        if (session('usuario')->modo==="1") {
            return view('usuario.usuarioBuscaCasa');
        } else {
            return view('usuario.usuarioBuscaCompañeros');
        }
        
    } else {
        return view('welcome');
    }
});


Route::get('/miCasa', [casaController::class, 'sacarCasa']);
Route::post('/miCasa', [casaController::class, 'agregarCasa'])->name('agregarCasa');


Route::get('/peticiones', [peticionesController::class, 'sacarPeticiones']);
Route::get('/agregarPeticion', [peticionesController::class, 'agregarPeticion'])->name('agregarPeticion');
