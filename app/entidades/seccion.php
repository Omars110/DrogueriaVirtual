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
      $this->idseccion = $request->input('idseccion');
      $this->columna = $request->input('txtColumna');
      $this->fila = $request->input('txtFila');
   }
    
   public function insertar()
   {
      $sql = "INSERT INTO secciones(columna, 
                                    fila)    
                                    VALUE(?, ?);";
      DB::insert($sql,[$this->columna,$this->fila]);
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
      $sql = 'SELECT idseccion, 
                     columna, 
                     fila
                     FROM secciones WHERE idseccion = :id';
      $resultado = db::select($sql,['id'=>$id]);
      return($resultado);
   }
}