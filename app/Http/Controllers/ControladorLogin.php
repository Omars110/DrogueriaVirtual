<?php

namespace App\Http\Controllers;

use App\entidades\Cliente;
use App\entidades\Carrito;
use Illuminate\Http\Request;
//use App\entidades\Pedidos_productos;
//use App\entidades\Producto;
//use App\entidades\Tipo_medicamento;
//use Illuminate\Contracts\View\View;
//use Illuminate\Support\Facades\Redis;
//use Session;

class ControladorLogin extends Controller
{
	public function index()
	{
		$titulo = 'Login';
		$login = '';
		$onCarrucel = 'off';
		$aCarritoProducto = array();
		$tamaño = count($aCarritoProducto);
		return view('web.login', compact('titulo', 'login', 'onCarrucel', 'aCarritoProducto', 'tamaño'));
	}

	public function ingresar_login(Request $request)
	{
		if ($_POST) {
			$usuario = $_POST['usuario'];
			$contraseña = $_POST['contraseña'];
			$cliente = new Cliente();
			$Usuario = $cliente->validarUsuario($usuario);

			//$tipoMedicamento = new Tipo_medicamento();
			//$aTipoMedi = $tipoMedicamento->seleccionarTodo();
			//$producto = new Producto();
			//$aProducto = $producto->seleccionarTodoLosP();
			//$aCarritoProducto = array();
			//$tamaño = count($aCarritoProducto);

			if ($Usuario) {
				if (password_verify($contraseña, $Usuario[0]->clave) == true) {
					//$login = '1';
					//$titulo = 'Medicamentos';
					//$onCarrucel = 'on';
					$request->session()->put('idcliente', $Usuario[0]->idcliente); // Capturar la seccion del usuario
					$carrito = new Carrito();
					$aCarrito = $carrito->seleccionarPorIdCliente($Usuario[0]->idcliente);
					if ($aCarrito) {
						return redirect('/productoWeb/index');
					} else {
						$carrito->fk_idcliente = $Usuario[0]->idcliente;
						$carrito->insertar_MiCarrito();
						return redirect('/productoWeb/index');
					}
					//return view('web.producto', compact('login', 'titulo', 'aTipoMedi', 'aProducto', 'onCarrucel', "tamaño", "aCarritoProducto"));
				} else {
					print('Usuario o contraseña incorrect');
				}
			} else {
				print('denegado');
			}
		}
	}

	public function cerrar_sesion(Request $request)
	{
		$request->session()->put('idcliente', "");
		return redirect('/login/index');
	}
}
