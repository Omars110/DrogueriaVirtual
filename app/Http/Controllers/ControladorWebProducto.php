<?php

namespace App\Http\Controllers;

use App\entidades\Carrito;
use App\entidades\Pedidos_productos;
use App\entidades\Producto;
use App\entidades\Tipo_medicamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LengthException;

class ControladorWebProducto extends Controller
{
    public function index()
    {
        $titulo = 'Medicamentos';
        $onCarrucel = 'on';
        $idcliente = session()->get('idcliente');
        if ($idcliente) {
            $login = "1";
            $carrito = new Carrito();
            $idCarrito = $carrito->seleccionarPorIdCliente($idcliente);

            $carritoProducto = new Pedidos_productos();
            $aCarritoProducto = $carritoProducto->seleccionarPorIdCarrirto($idCarrito[0]->idcarrito);
            $tamaño = count($aCarritoProducto);
        } else {
            $login = "";
            $aCarritoProducto = array();
            $tamaño = count($aCarritoProducto);
        }
        $tipoMedicamento = new Tipo_medicamento();
        $aTipoMedi = $tipoMedicamento->seleccionarTodo();

        $producto = new Producto();
        $aProducto = $producto->seleccionarTodoLosP();

        return view("web.producto", compact('titulo', 'aTipoMedi', 'aProducto', 'login', 'onCarrucel', 'aCarritoProducto','tamaño'));
    }

    public function detalleProducto(Request $get)
    {
        if ($_GET) {
            $id = $_GET['id'];
            $producto = new Producto();
            $aProducto = $producto->seleccionarPorId($id);

            $row = json_encode($aProducto, JSON_UNESCAPED_UNICODE);
            echo $row;
        }
    }

    public function pedidos_producto(Request $request)
    {
        if ($_GET) {
            $idcliente = $request->session()->get('idcliente');
            $titulo = 'Medicamentos';
            $onCarrucel = 'on';
            if ($idcliente) {
                $login = "1";
            } else {
                $login = "";
            }

            $nombre_P = $_GET['nombre_P'];
            $precio_P = $_GET['precio_P'];
            $id_P = $_GET['id_P'];
            $cantidad_P = $_GET['cantidad_P'];
            $total = $precio_P * $cantidad_P;

            $carrito = new Carrito();
            $miCarrito = $carrito->seleccionarPorIdCliente($idcliente);

            $tipoMedicamento = new Tipo_medicamento();
            $aTipoMedi = $tipoMedicamento->seleccionarTodo();

            $producto = new Producto();
            $aProducto = $producto->seleccionarTodoLosP();

            $pedidoProducto = new Pedidos_productos();
            $pedidoProducto->cantidad = $cantidad_P;
            $pedidoProducto->precio_unitario = $precio_P;
            $pedidoProducto->fk_idmedicamento = $id_P;
            $pedidoProducto->total = $total;

            if ($miCarrito) {
                $pedidoProducto->fk_idcarrito = $miCarrito[0]->idcarrito;
                $pedidoProducto->insertar_Pedido_Producto();
                //return view("web.producto", compact('titulo', 'aTipoMedi', 'aProducto', 'login', 'onCarrucel'));
                return redirect('/productoWeb/index');
            } else {
                print('else');

                $idcliente = $request->session()->get('idcliente');
                $nuevoCarrito = new Carrito();
                $nuevoCarrito->fk_idcliente = $idcliente;
                $nuevoCarrito->insertar_MiCarrito();
                $aCarritoNuevo = $nuevoCarrito->seleccionarPorIdCliente($idcliente);
                $pedidoProducto->fk_idcarrito = $aCarritoNuevo[0]->idcarrito;
                $pedidoProducto->insertar_Pedido_Producto();
                return view("web.producto", compact('titulo', 'aTipoMedi', 'aProducto', 'login', 'onCarrucel'));
            }
        }
    }

    public function eliminarProduct_Carr($id) {
        $pedidos_producto = new Pedidos_productos();
        $repuesta = $pedidos_producto->eliminarProductoCarrito($id);
        return redirect("/productoWeb/index");
    }
}