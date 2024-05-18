<?php

namespace App\Http\Controllers;

use App\entidades\Carrito;
use App\entidades\Pedidos_productos;

class ControladorFactura extends Controller
{
   public function index()
   {
      $titulo = 'Factura';
      $onCarrucel = 'off';
      //$aCarritoProducto = array();

      if (session()->get('idcliente')) {
         $login = "1";
      } else {
         $login = '';
      }

      if (session()->get('idcliente')) {
         $carrito = new Carrito();
         $aCarrito = $carrito->seleccionarPorIdCliente(session()->get('idcliente'));
         $pedidos_productos = new Pedidos_productos();
         $aCarritoProducto = $pedidos_productos->seleccionarPorIdCarrirto($aCarrito[0]->idcarrito);
         $tamaño = count($aCarritoProducto);
         return view('web.carrito_factura', compact('titulo', 'login', 'onCarrucel', 'aCarritoProducto', 'tamaño'));
      } else {
         return redirect('/login/index');
      }
   }

   public function comfirmarCompra()
   {
   }
}
