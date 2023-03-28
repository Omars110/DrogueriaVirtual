<?php
namespace App\Http\Controllers;

use App\entidades\Producto;
use Illuminate\Http\Request;


class ControladorProducto extends Controller {

   public function ingresar_producto(Request $request) // se hicieron cambos de variables y parametros
   {
      $cargarF = new Producto();
      $cargarF->CargarDatosFormulario($request); // se hicieron cambios de variables y parametros
      $cargarF->insertar_P();
      
      //echo $cargarF->cantidad_p;
      //print_r($cargarF);
      //exit;

      $titulo = "Nuevo producto";
      return view("sistema.ingreso_producto", compact("titulo"));
   }

   public function seleccionarTodoLosP()
    {
      $titulo = "Listado de medicamentos";
      $medicamentos = new Producto();
      $aMedicamentos = $medicamentos->seleccionarTodoLosP();
      return view("sistema.listado_medicamentos",compact('titulo','aMedicamentos'));
    }
}