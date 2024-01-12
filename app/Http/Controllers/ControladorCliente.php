<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\entidades\cliente;
use Illuminate\Http\Request;

class ControladorCliente extends Controller
{
	public function index()
	{
		$titulo = 'Registro';
		$onCarrucel = 'off';
		$aCarritoProducto = array();
		$tamaño = count($aCarritoProducto);

		if (session()->get('idcliente')) {
			$login = "1";
		} else {
			$login = '';
		}
		return view('web.registrar', compact('titulo', 'login', 'onCarrucel','aCarritoProducto','tamaño'));
	}

	public function ingresar_cliente(Request $request)
	{
		$titulo = 'Medicamentos';
		$carrusel = false;

		$cliente = new Cliente();
		$cliente->CargarFormulario($request);
		$cliente->insertar_C();

		return redirect('/productoWeb/index');
	}
}
