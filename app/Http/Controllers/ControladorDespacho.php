<?php

namespace App\Http\Controllers;

use App\entidades\Carrito;
use App\entidades\Despacho;
use App\entidades\ProductosDespachados;
use App\entidades\Pedidos_productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ControladorDespacho extends Controller
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

   public function DatosDespachoPedido(Request $request)
   {
      try {
         if ($request->has('orderData') && $request->has('carrito')) {
            $arrayDatosPaypal = json_decode(json_encode($request->input('orderData')), true);
            if ($arrayDatosPaypal['purchase_units'][0]['payments']['captures'][0]['status'] === 'COMPLETED') {
               $aCarrito = $request->input('carrito');
               //Los datos que se enviand de AJAX exactamente (orderData) llegan como un objeto XML por tal razon se codifican a formato JSOM
               // y enseguida se decodifican para convertirlos a array asociativo.
               $arrayDatosPaypal = json_decode(json_encode($request->input('orderData')), true);
               $id_general = $arrayDatosPaypal['id'];
               $nombre = $arrayDatosPaypal['payer']['name']['given_name'];
               $apellido = $arrayDatosPaypal['payer']['name']['surname'];
               $capture_id = $arrayDatosPaypal['purchase_units'][0]['payments']['captures'][0]['id'];
               $capture_create_time_fecha = $arrayDatosPaypal['purchase_units'][0]['payments']['captures'][0]['create_time'];
               $capture_status = $arrayDatosPaypal['purchase_units'][0]['payments']['captures'][0]['status'];
               $capture_value_transaccion = $arrayDatosPaypal['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
               $direccion_pedido = "calle 20 de julio - Arjona Bolivar";
               $fecha_transacion = Carbon::parse($capture_create_time_fecha); //Convertimos la fecha que nos da paypal q es formato ISO 8601 a formato normal.
               $fecha_compra = Carbon::now()->format('Y-m-d H:i:s');

               $productosDespachados = new ProductosDespachados();
               $pedidos_productos = new Pedidos_productos();

               // Este foreach crea una copia de de los productos cuando ya la compra se confirma.
               // para que luego el cliente pueda ver un historial de los productos comprados y para que el despacho se pueda hacer.
               foreach ($aCarrito as $item) {
                  $productosDespachados->Cargar_productos_despacho($item);
                  $answer = $productosDespachados->insertar_productos_despachados();
                  if ($answer === true) { //cuando ya la compra se confirma, se eliminan los productos del carrito.
                     $pedidos_productos->eliminarProductoCarrito($item['idpedido_producto']);
                  }
               }
               //Se crea un array con toda la irmacion de paypal y se envia a la base de datos para luego preparar el pedidos.
               $array_despacho = [
                  'idtransaccion_paypal' => $id_general,
                  'nombre_comprador' => $nombre,
                  'apellido_comprador' => $apellido,
                  'direccion_entrega_pedido' => $direccion_pedido,
                  'estado_transaccion' => $capture_status,
                  'valor_transaccion' => $capture_value_transaccion,
                  'fecha_transaccion' => $fecha_transacion,
                  'fecha_compra' => $fecha_compra,
                  'fk_idcarrito' => $aCarrito[0]['fk_idcarrito']
               ];
               $despacho = new Despacho();
               $answer = $despacho->CargarDatosFormulario($array_despacho); // answer = respuesta

               if ($answer === false) {
                  throw new \Exception('Error al cargar los datos del formulario.');
               } elseif ($answer === true) {
                  $despacho->InsertarPedidoDespacho();
                  //return response()->json(['Id' => $id_general, 'Nombre' => $nombre, 'Apellido' => $apellido, 'Capture' => $capture_id, 'valor' => $capture_value_transaccion, 'Carrito' => $aCarrito]);
                  return response()->json(['Message' => 'Su Pedido Pronto sera despachado. Gracias por su compra '. $nombre]);
               }
            }else{
               return response()->json(['Message' => 'Error transaccion']);
            }
         } else {
            return response()->json(['status' => 'error', 'message' => 'Datos incompletos'], 400);
         }
      } catch (\Exception $e) {
         Log::error('Ocurrió un error al procesar los datos: ' . $e->getMessage());
         return response()->json(['status' => 'error', 'message' => 'Ocurrió un error al procesar los datos'], 500);
      }
   }

   public function PedidosDespacahdos()
   {
   }
}
/* 
      headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
*/