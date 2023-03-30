<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorProducto;
use App\Http\Controllers\cursoController;

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

Route::get('/', function () {
    return view('plantilla');
});

/* Ingresar producto */
Route::get('/index','ControladorProducto@')->name('');
Route::get('/nuevo','ControladorProducto@index')->name('nuevo.medicamento');
Route::post('/nuevo','ControladorProducto@ingresar_producto')->name('nuevo.medicamento');
Route::get('/medicamentos','ControladorProducto@seleccionarTodoLosP')->name('selecionar.medicamentos');

/* Seccion */
Route::get('/seccion', 'ControladorSeccion@index');
Route::post('/seccion', 'ControladorSeccion@Ingresar_seccion');