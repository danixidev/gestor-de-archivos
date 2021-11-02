<?php

use App\Http\Controllers\ArchivosController;

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
Route::redirect('/', 'inicio');


Route::match(['get', 'post'], '/inicio', [ ArchivosController::class, 'subirArchivo' ]) -> name('inicio');


Route::get('/listado', [ ArchivosController::class, 'verListado' ]) -> name('listado');


Route::get('/descargar/{id}', [ ArchivosController::class, 'descargar' ]) -> name('descargar');