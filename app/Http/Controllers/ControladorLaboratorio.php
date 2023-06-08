<?php
namespace App\Http\Controllers;

use App\entidades\Laboratorio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControladorLaboratorio extends Controller{

   public function index()
   {
      $titulo = 'Laboratorios';
      $mensaje = 0;

      $laboratorio = new Laboratorio();
      $aLaboratorios = $laboratorio->SeleccionarTodo();

      if (!$aLaboratorios){
         $mensaje == 1;
         return view('sistema.listar_laboratorios', compact('titulo', 'aLaboratorios', 'mensaje'));
      }else{
         return view('sistema.listar_laboratorios', compact('titulo', 'aLaboratorios'));
      }
   }

   public function nuevo()
   {
      $titulo = 'Nuevo laboratorio';
      $aLaboratorio = array();
      return view('sistema.crear_laboratorio', compact('titulo', 'aLaboratorio'));
   }

   public function insertar_L(Request $request)
   {
      $titulo = 'Nuevo laboratorio';
      $mensaje = 0;
      $mensaje_1 = 0;

      $laboratorio = new Laboratorio();
      $laboratorio->CargarFormulario($request);

      if ($request['idlaboratorio'] > 0)
      {
         $mensaje = 0;
         $rUpdate = $laboratorio->actualizar();         
         $aLaboratorio = array();
         if($rUpdate) {
            $mensaje_1 = 1; 
         } else {
            $mensaje_1 = 2;
         }
         //return view('sistema.crear_laboratorio', compact('titulo','aLaboratorio', 'mensaje'));
      }else{
         $mensaje = 0;
         $rInsert = $laboratorio->insertar_L();
         $aLaboratorio = array();
         if($rInsert) {
            $mensaje = 1; 
         } else {
            $mensaje = 2;
         }
         //return view('sistema.crear_laboratorio', compact('titulo','aLaboratorio', 'mensaje'));
      } 
      return view('sistema.crear_laboratorio', compact('titulo','aLaboratorio', 'mensaje', 'mensaje_1')); 
   }

   public function editar($id)
   {
      $titulo = 'Editar';

      $laboratorio = new Laboratorio();
      $aLaboratorio = $laboratorio->seleccionarPorId($id);

      return view('sistema.crear_laboratorio', compact('titulo', 'aLaboratorio'));
   }

   public function eliminar($id)
   {
      $laboratorio = new Laboratorio();
      $rDelete = $laboratorio->eleminar($id);
      return redirect('/laboratorio/index');
   }
}