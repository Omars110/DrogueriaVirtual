<?php
namespace App\Http\Controllers;

use App\entidades\Laboratorio;
use App\entidades\Producto;
use App\entidades\Proveedor;
use App\entidades\Seccion;
use App\entidades\Tipo_medicamento;
use Illuminate\Http\Request;
class ControladorProducto extends Controller {

   public function index()
   {
      $titulo = "Listado de medicamentos";

      $medicamentos = new Producto();
      $aMedicamentos = $medicamentos->seleccionarTodoLosP();

      return view("sistema.listado_medicamentos",compact('titulo','aMedicamentos'));
   }

   public function nuevo()
   {
      $titulo = 'Nuevo medicamento';
      
      $seccion = new Seccion();
      $aSeccion = $seccion->seleccionarTodo();

      $proveedor = new Proveedor();
      $aProveedor = $proveedor->seleccionarTodo();

      $laboratorio = new Laboratorio();
      $aLaboratorio = $laboratorio->SeleccionarTodo();

      $tMedicamento = new Tipo_medicamento();
      $aTmedicamento = $tMedicamento->seleccionarTodo();

      return view('sistema.ingreso_producto', compact('titulo','aSeccion', 'aProveedor', 'aLaboratorio', 'aTmedicamento'));
   }

   public function ingresar_producto(Request $request) // se hicieron cambos de variables y parametros
   {
      $cargarM = new Producto();
      $cargarM->CargarDatosFormulario($request); // se hicieron cambios de variables y parametros
      $cargarM->insertar_P();

      $titulo = "Nuevo producto";
      return view("sistema.ingreso_producto", compact("titulo"));
   }

   public function seleccionarTodoLosP()
   {
      
   }
}