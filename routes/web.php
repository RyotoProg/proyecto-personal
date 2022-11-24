<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rutas para el frontend
Route::get('/', [HomeController::class, 'Home'])->middleware('auth')->name('home');

Route::get('/register', function(){
    return view('register');
})->middleware('guest')->name('register');

Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get('/notas/add', function () {
    return view('nota.add');
})->middleware('auth')->name('notas.add');

Route::get('/nota/edit/{id}', [NotaController::class, 'pageEditNote'])->middleware('auth');

Route::get('/links/add', function () {
    return view('link.add');
})->middleware('auth')->name('link.add');

Route::get('/link/edit/{id}', [LinkController::class, 'pageEditLink'])->middleware('auth');


//rutas para el backend
//rutas del usuario
Route::post('/registrar_usuario', [UsuarioController::class, 'createUsuario']);
Route::post('/login_usuario', [UsuarioController::class, 'sessionCreate']);
Route::get('/logout', [UsuarioController::class, 'sessionDestroy'])->middleware('auth');

//rutas de las notas
Route::post('/nota/agregar_nota', [NotaController::class, 'createNote'])->middleware('auth');
Route::delete('/nota/delete_nota/{id}', [NotaController::class, 'destroyNote'])->middleware('auth');
Route::put('/nota/editar_nota/{id}', [NotaController::class, 'editNote'])->middleware('auth');

//rutas de los links
Route::post('/link/agregar_link', [LinkController::class, 'createLink'])->middleware('auth');
Route::delete('/link/delete_link/{id}', [LinkController::class, 'destroyLink'])->middleware('auth');
Route::put('/link/editar_link/{id}', [LinkController::class, 'editLink'])->middleware('auth');
