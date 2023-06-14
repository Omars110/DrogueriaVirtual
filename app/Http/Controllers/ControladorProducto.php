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

      return view("sistema.listado_medicamentos",compact('titulo','aMedicamentos',));
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

      $aProducto = array();
      

      return view('sistema.ingreso_producto', compact('titulo', 'aProducto','aSeccion', 'aProveedor', 'aLaboratorio', 'aTmedicamento'));
   }

   public function ingresar_producto(Request $request) // se hicieron cambos de variables y parametros
   {
      $titulo = "Nuevo producto";
      $mensaje = 0;

      $cargarM = new Producto();
      $cargarM->CargarDatosFormulario($request); // se hicieron cambios de variables y parametros

      if($_POST['txtIdmedicamento'] > 0) {
         $cargarM->actualizar();
         $mensaje = 1;
         $aProducto = array();
         $aSeccion = array();
         $aProveedor = array();
         $aLaboratorio = array();
         $aTmedicamento = array();
      } else {
         $rInsert = $cargarM->insertar_P();
         $aProducto = array();
         $aSeccion = array();
         $aProveedor = array();
         $aLaboratorio = array();
         $aTmedicamento = array();
         if ($rInsert == 1) {
            $mensaje = 1;
         } else {
            $mensaje = 2;
         }  
      }
      return view("sistema.ingreso_producto", compact('titulo', 'mensaje', 'aProducto', 'aSeccion', 'aProveedor', 'aLaboratorio', 'aTmedicamento'));
   }

   public function eliminar($id)
   {
      $producto = new Producto();
      $rDelete = $producto->eleminar($id);
      return redirect('/producto/index');
   }

   public function editar($id)
   {
      $titulo = 'Editar';

      $seccion = new Seccion();
      $aSeccion = $seccion->seleccionarTodo();

      $proveedor = new Proveedor();
      $aProveedor = $proveedor->seleccionarTodo();

      $laboratorio = new Laboratorio();
      $aLaboratorio = $laboratorio->SeleccionarTodo();

      $tMedicamento = new Tipo_medicamento();
      $aTmedicamento = $tMedicamento->seleccionarTodo();

      $producto = new Producto();
      $aProducto = $producto->seleccionarPorId($id);
      
      return view('sistema.ingreso_producto', compact('titulo', 'aProducto', 'aSeccion', 'aProveedor', 'aLaboratorio', 'aTmedicamento'));
   }

   public function filtrar_P(Request $get)
   {
      if($get['valid'] == 'omarsoto12'){
         $dato = $_GET['dato'];
         if($dato){
            $producto = new Producto();
            $aMedicamentos = $producto->filtrar($dato);

            if($aMedicamentos){
               $dato_em = json_encode($aMedicamentos, JSON_UNESCAPED_UNICODE);
               echo $dato_em;
            }else{
               $noDato = array('noDato');
               $Dato_em = json_encode($noDato, JSON_UNESCAPED_UNICODE);
                echo $Dato_em;
            }
         }else{
            $noDato = array('noDato');
            $Dato_em = json_encode($noDato, JSON_UNESCAPED_UNICODE);
            echo $Dato_em;
         }
      }else{
         $noDato = array('noDato');
         $Dato_em = json_encode($noDato, JSON_UNESCAPED_UNICODE);
         echo $Dato_em;
      }
   }
}