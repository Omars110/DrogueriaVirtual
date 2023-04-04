<?php

namespace App\entidades;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
   protected $table = 'secciones';
   public $timestamps = false;

   protected $fillable = ['idseccion', 'columna', 'fila'];

   public function __construct(){}
   public function __get($atributo){return $this->$atributo;}
   public function __set($atributo, $valor){$this->$atributo = $valor; return $this;}

   public function CargarDatosFormulario($request)
   {
      $this->idseccion = $request->input('txtId');
      $this->columna = $request->input('txtColumna');
      $this->fila = $request->input('txtFila');
   }
    
   public function insertar()
   {
      $sql = "INSERT INTO secciones(columna, 
                                    fila)    
                                    VALUE(?, ?);";
      $resultado = DB::insert($sql,[$this->columna,$this->fila]);
      return $resultado;
   }

   public function seleccionarTodo()
   {
      $sql = "SELECT idseccion, 
                     columna, 
                     fila 
                     FROM secciones";
      $secciones = DB::select($sql);
      return $secciones;
   }

   public function seleccionarPorId($id)
   {
      $sql = "SELECT idseccion, 
                     columna, 
                     fila
                     FROM secciones WHERE idseccion = :id";
      $resultado = db::select($sql,['id'=>$id]);
      return($resultado);
   }

   public function actualizar()
   {  
      $sql = "UPDATE secciones SET columna=?, 
                                    fila=? 
                                    WHERE idseccion = ? ";
      $resultado = DB::update($sql,[$this->columna,
                                    $this->fila,
                                    $this->idseccion]);
      return $resultado;
   }
}