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

/* Producto */
Route::get('/index','ControladorProducto@')->name('');
Route::get('/nuevo','ControladorProducto@index')->name('nuevo.medicamento');
Route::post('/nuevo','ControladorProducto@ingresar_producto')->name('nuevo.medicamento');
Route::get('/medicamentos','ControladorProducto@seleccionarTodoLosP')->name('selecionar.medicamentos');

/* Seccion */
Route::get('/seccion', 'ControladorSeccion@index');
Route::get('/seccion/nuevo', 'ControladorSeccion@nuevo');
Route::post('/seccion/nuevo', 'ControladorSeccion@Ingresar_seccion');
Route::get('/seccion/{id}', 'ControladorSeccion@editar');
Route::post('/seccion/{id}', 'ControladorSeccion@Ingresar_seccion');
Route::get('/seccion/eliminar/{id}', 'ControladorSeccion@eliminar');


/* Proveedor */
Route::get('/proveedor/index','ControladorProveedor@index');
Route::get('/proveedor/nuevo', 'ControladorProveedor@nuevo');
Route::post('/proveedor/nuevo', 'ControladorProveedor@ingresar_proveedor');
Route::get('/proveedor/filtrar', 'ControladorProveedor@filtrado');//direcion que trabaja con AJAX
Route::get('/proveedor/editar/{id}', 'ControladorProveedor@editar');
Route::post('/proveedor/editar/{id}', 'ControladorProveedor@ingresar_proveedor');
Route::get('/proveedor/eliminar/{id}', 'ControladorProveedor@eliminar');






