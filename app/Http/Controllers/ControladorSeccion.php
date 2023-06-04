<?php
namespace App\Http\Controllers;

use App\entidades\Seccion;
use Illuminate\Http\Request;

class ControladorSeccion extends Controller{

    public function index()
    {
        $titulo = 'Secciones';
        $mensaje = '';

        $seccion = new Seccion();
        $aSeccion = $seccion->seleccionarTodo();

        if (!$aSeccion) {
            $mensaje = 1;
            return view('sistema.listar_seccion', compact('titulo', 'aSeccion', 'mensaje'));
            
        } else {
            return view('sistema.listar_seccion', compact('titulo', 'aSeccion'));
        }
    }

    public function nuevo()
    {
        $titulo = 'Nueva Seccion';
        $aSeccion = array();

        return view('sistema.crear_seccion', compact('titulo', 'aSeccion'));
    }

    public function Ingresar_seccion(Request $request)
    {
        //print_r($_POST["txtId"]);
        //print_r($_POST["txtColumna"]);
        //print_r($_POST["txtFila"]);
        //exit;

        $titulo = 'Nueva seccion';
        $mensaje = 0;

        $seccion = new Seccion();
        $seccion->CargarDatosFormulario($request);

        if ($_POST["txtId"] > 0) {
            $rEdit = $seccion->actualizar(); //rEdit = resultado que debuelve la la edicion
            return redirect('/seccion');
        } else {
            $rInsert = $seccion->insertar(); //rInsert = resultado que debuelve la insercion 
            $aSeccion = array(); 
            if ($rInsert) {
                $mensaje = 1;
                return view('sistema.crear_seccion', compact('titulo','aSeccion', 'mensaje'));
            } else {
                $mensaje = 2;
                return view('sistema.crear_seccion', compact('titulo','aSeccion', 'mensaje'));
            }
        }        
    }

    public function editar($id)
    {
        $titulo = 'Editar';

        $seccion = new Seccion();
        $aSeccion = $seccion->seleccionarPorId($id);

        return view('sistema.crear_seccion', compact('titulo','aSeccion'));
    }

    public function eliminar($id)
   {
      $seccion = new Seccion();
      $seccion->eleminar($id);
      return(redirect('/seccion'));
   }
}