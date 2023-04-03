<?php
namespace App\Http\Controllers;

use App\entidades\Seccion;
use Illuminate\Http\Request;

class ControladorSeccion extends Controller{

    public function index()
    {
        $titulo = 'Secciones';

        $seccion = new Seccion();
        $aSeccion = $seccion->seleccionarTodo();

        return view('sistema.listar_seccion', compact('titulo', 'aSeccion'));
    }

    public function nuevo()
    {
        $titulo = 'Nueva Seccion';
        return view('sistema.crear_seccion', compact('titulo'));
    }

    public function Ingresar_seccion(Request $request)
    {
        $titulo = 'Nueva seccion';
        
        $seccion = new Seccion();
        $seccion->CargarDatosFormulario($request);
        $seccion->insertar();

        $aSeccion = $seccion->seleccionarTodo();
        return view('sistema.crear_seccion', compact('titulo','aSeccion',));
    }

    public function editar($id)
    {
        $titulo = 'Editar';

        $seccion = new Seccion();
        $aSeccion = $seccion->seleccionarPorId($id);

        return view('sistema.crear_seccion', compact('titulo','aSeccion'));
    }

}