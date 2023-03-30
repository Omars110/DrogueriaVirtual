<?php
namespace App\Http\Controllers;

use App\entidades\Seccion;
use Illuminate\Http\Request;

class ControladorSeccion extends Controller{

    public function index()
    {
        $titulo = 'Nueva seccion';

        $seccion = new Seccion();
        $aSeccion = $seccion->seleccionarTodo();

        return view('sistema.crear_seccion', compact('titulo', 'aSeccion'));
    }

    public function Ingresar_seccion(Request $request)
    {
        $titulo = 'Nueva seccion';
        
        $seccion = new Seccion();
        $seccion->CargarDatosFormulario($request);
        $seccion->insertar();

        $aSeccion = $seccion->seleccionarTodo();
        return view('sistema.crear_seccion', compact('titulo','aSeccion'));
    }

}