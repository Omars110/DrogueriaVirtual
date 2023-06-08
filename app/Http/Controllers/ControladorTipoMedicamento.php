<?php
namespace App\Http\Controllers;

use App\entidades\Tipo_medicamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ControladorTipoMedicamento extends Controller
{
   public function index()
   {
      $titulo = 'Listar tipo de medicamento';

      $tMedicamento = new Tipo_medicamento();
      $aTmedicamento = $tMedicamento->seleccionarTodo();

      return view('sistema.listar_tipo_medicamento', compact('titulo', 'aTmedicamento'));
   }

   public function nuevo()
   {
      $titulo = 'Nuevo tipo de medicamento';
      $aTmedicamento = array();
      return view('sistema.crear_tipo_medicamento', compact('titulo', 'aTmedicamento'));
   }

   public function ingresar_tipoMedi(Request $request)
   {
      $titulo = 'Nuevo tipo de medicamento';

      $tMedicamento = new Tipo_medicamento();
      $tMedicamento->CargarDatosFormulario($request);

      if($_POST['txtIdtipoMedicamento'] > 0){
         $tMedicamento->actualizar();
         $aTmedicamento = array();
      } else {
         $tMedicamento->insertar();
         $aTmedicamento = array();
      } 
      return view('sistema.crear_tipo_medicamento', compact('titulo', 'aTmedicamento'));
   }

   public function editar($id)
   {
      $titulo = 'Editar tipo de medicamento';
      
      $tMedicamento = new Tipo_medicamento();
      $aTmedicamento = $tMedicamento->seleccionarPorId($id);

      return view('sistema.crear_tipo_medicamento', compact('titulo', 'aTmedicamento'));
   }

   public function eliminar($id)
   {
      $tMedicamento = new Tipo_medicamento();
      $rDelete = $tMedicamento->eleminar($id);
      return Redirect('/Tipo_medicamento/index');
   }
}
