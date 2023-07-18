<?php
namespace App\Http\Controllers;

use App\entidades\Producto;
use App\entidades\Tipo_medicamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControladorWebProducto extends Controller
{
    public function index()
    {
        $titulo = 'Medicamentos';

        $tipoMedicamento = new Tipo_medicamento();
        $aTipoMedi = $tipoMedicamento->seleccionarTodo();

        $producto = new Producto();
        $aProducto = $producto->seleccionarTodoLosP();
        
        return view("web.producto", compact('titulo', 'aTipoMedi','aProducto'));
    }

    public function detalleProducto(Request $get)
    {
        if($_GET)
        {
            $id = $_GET['id'];
            $producto = new Producto();
            $aProducto = $producto->seleccionarPorId($id);

            $row = json_encode($aProducto,JSON_UNESCAPED_UNICODE);
            echo $row;
        }
    }
}