<?php

namespace App\entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class Cliente extends Model
{
   protected $table = 'clientes';
   public $timestamp = false;

   protected $fillable = ['idcliente', 'usuario', 'nombre_apellido', 'cedula', 'telefono', 'direccion' . 'correo', 'clave'];

   public function __construct(){}
   public function __get($atributo){
      return $this->$atributo;
   }
   public function __set($atributo, $valor)
   {
      $this->$atributo = $valor;
      return $this;
   }

   public function CargarFormulario($request)
   {
      $this->idlaboratorio = $request->input('idcliente');
      $this->usuario = $request->input('usuario');
      $this->nombre_apellido = $request->input('Nombre_Apellido');
      $this->cedula = $request->input('cedula');
      $this->telefono = $request->input('celular');
      $this->direccion = $request->input('direccion');
      $this->correo = $request->input('correo');
      $this->clave = password_hash($request->input('contraseña'), PASSWORD_DEFAULT);
   }

   public function insertar_C()
   {
      $sql = "INSERT INTO  clientes(nombre_apellido,
                                    usuario,
                                    cedula,
                                    telefono,
                                    direccion,
                                    correo,
                                    clave)
                                    VALUE(?,?,?,?,?,?,?)";
      $resultado = DB::insert($sql, [
         $this->nombre_apellido,
         $this->usuario,
         $this->cedula,
         $this->telefono,
         $this->direccion,
         $this->correo,
         $this->clave
      ]);
      //return $this->idlaboratorio = DB::getPdo()->lastInsertId();
   }

   public function seleccionarTodoLosC()
   {
      $sql = "SELECT idcliente,
                     nombre_apellido,
                     usuario,
                     cedula,
                     telefono,
                     direccion,
                     correo,
                     clave
                     FROM clientes";
      $clientes = DB::select($sql);
      return $clientes;
   }

   public function seleccionarPorId($id)
   {
      $sql = "SELECT idcliente,
                     nombre_apellido,
                     usuario,
                     cedula,
                     telefono,
                     direccion,
                     correo,
                     clave
                     FROM clientes WHERE idcliente = :id";
      $cliente = DB::select($sql, ['id' => $id]);
      return $cliente;
   }

   public function validarUsuario($usuario)
   {
      $sql = "SELECT idcliente,
                     nombre_apellido,
                     usuario,
                     cedula,
                     telefono,
                     direccion,
                     correo,
                     clave
                     FROM clientes WHERE usuario = :usuario";
      $Usuario = DB::select($sql, ['usuario' => $usuario]);
      return $Usuario;
   }
}
