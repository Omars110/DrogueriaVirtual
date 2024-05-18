<?php

namespace App\entidades;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
   protected $table = 'carrito';
   public $timestamp = false;

   protected $fillable = ['idcarrito', 'fk_idcliente'];

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

   public function insertar_MiCarrito()
   {
      $sql = "INSERT INTO carrito( fk_idcliente)
                                   VALUES(?)";

      $resultado = DB::insert($sql, [$this->fk_idcliente]);

      //return $this->idcliente = DB::getPdo()->lastInsertId();                                    
   }

   public function seleccionarPorIdCliente($idCliente)
   {
      $sql = "SELECT idcarrito,
                     fk_idcliente
                     FROM carrito WHERE fk_idcliente = :fk_idcliente";
      $carrito = DB::select($sql, ['fk_idcliente' => $idCliente]);
      return $carrito;
   }

   public function seleccionarPorIdCarrito($idcarrito)
   {
      $sql = "SELECT idcarrito,
                     fk_idcliente
                     FROM carrito WHERE idcarrito = :idcarrito";
      $aCarrito = DB::select($sql, ['idcarrito' => $idcarrito]);
      return $aCarrito;
   }
}
