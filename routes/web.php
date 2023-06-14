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
Route::get('/producto/index','ControladorProducto@index')->name('nuevo.medicamento');
Route::get('/producto/nuevo','ControladorProducto@nuevo')->name('nuevo.medicamento');
Route::post('/producto/nuevo','ControladorProducto@ingresar_producto')->name('selecionar.medicamentos');
Route::get('/producto/filtrar','ControladorProducto@filtrar_P');//direcion que trabaja con AJAX
Route::get('/producto/editar/{id}', 'ControladorProducto@editar');
Route::post('/producto/editar/{id}', 'ControladorProducto@ingresar_producto');
Route::get('/producto/eliminar/{id}', 'ControladorProducto@eliminar');

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

/* Laboratorio */
Route::get('/laboratorio/index', 'ControladorLaboratorio@index');
Route::get('/laboratorio/nuevo', 'ControladorLaboratorio@nuevo');
Route::post('/laboratorio/nuevo', 'ControladorLaboratorio@insertar_L');
Route::get('/laboratorio/editar/{id}', 'ControladorLaboratorio@editar');
Route::post('/laboratorio/editar/{id}', 'ControladorLaboratorio@insertar_L');
Route::get('/laboratorio/eliminar/{id}', 'ControladorLaboratorio@eliminar');

/* Tipo medicamento */
Route::get('/Tipo_medicamento/index', 'ControladorTipoMedicamento@index');
Route::get('/Tipo_medicamento/nuevo', 'ControladorTipoMedicamento@nuevo');
Route::post('/Tipo_medicamento/nuevo', 'ControladorTipoMedicamento@ingresar_tipoMedi');
Route::get('/Tipo_medicamento/editar/{id}', 'ControladorTipoMedicamento@editar');
Route::post('/Tipo_medicamento/editar/{id}', 'ControladorTipoMedicamento@ingresar_tipoMedi');
Route::get('/Tipo_medicamento/eliminar/{id}', 'ControladorTipoMedicamento@eliminar');