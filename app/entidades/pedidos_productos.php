<?php

namespace App\entidades;

use Faker\Calculator\Inn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedidos_productos extends Model
{
   protected $table = 'pedidos_productos';
   public $timestamps = false;

   protected $fillable = ['idpedido_producto', 'cantidad', 'precio_unitario', 'total', 'fk_idpedido', 'fk_idmedicamento', 'fk_idcarrito'];

   public function __construct()
   {
   }
   public function __get($atributo)
   {
      return $this->$atributo;
   }
   public function __set($atributo, $valor)
   {
      $this->$atributo = $valor;
      return $this;
   }

   public function CargarFormulario($request)
   {
      $this->idpedido_producto = $request->input('idpedido_producto');
      $this->cantidad = $request->input('cantidad');
      $this->precio_unitario = $request->input('precio_unitario');
      $this->total = $request->input('total');
      $this->fk_idpedido = $request->input('fk_idpedido');
      $this->fk_idmedicamento = $request->input('fk_idmedicamento');
   }

   public function insertar_Pedido_Producto()
   {
      $sql = "INSERT INTO  pedidos_productos(cantidad,
                                    			precio_unitario,
                                    			total,
                                    			fk_idmedicamento,
                                             fk_idcarrito)
                                    			VALUE(?,?,?,?,?)";
      $resultado = DB::insert($sql, [
         $this->cantidad,
         $this->precio_unitario,
         $this->total,
         $this->fk_idmedicamento,
         $this->fk_idcarrito
      ]);
      //return $this->idlaboratorio = DB::getPdo()->lastInsertId();
   }

   public function seleccionarPorIdCarrirto($id)
   {
      $sql = "SELECT A.idpedido_producto,
                     A.cantidad,
                     A.precio_unitario,
                     A.total,
                     A.fk_idmedicamento,
                     A.fk_idcarrito,
                     B.nombre,
                     B.imagen,
                     A.fk_idcarrito
                     FROM pedidos_productos A 
                     INNER JOIN medicamentos B ON A.fk_idmedicamento = B.idmedicamento
                     WHERE fk_idcarrito = :id";
      $aCarritoProductos = DB::select($sql, ['id' => $id]);
      return $aCarritoProductos;
   }

   public function eliminarProductoCarrito($id)
   {
      $sql = " DELETE FROM pedidos_productos WHERE idpedido_producto = :id";
      $rDelete = DB::delete($sql, ['id' => $id]);
      return ($rDelete);
   }
}
