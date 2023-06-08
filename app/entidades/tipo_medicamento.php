<?php
namespace App\entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tipo_medicamento extends Model
{
   protected $table = 'tipos_medicamentos';
   public $timestamps = false;

   protected $fillable = ['idtipoMedicamento', 'clasificacion'];

   public function __construct(){}
   public function __get($atributo){return $this->$atributo;}
   public function __set($atributo, $valor){$this->$atributo = $valor; return $this;} 

   public function CargarDatosFormulario($request)
   {
      $this->idtipoMedicamento = $request->input('txtIdtipoMedicamento');
      $this->clasificacion = $request->input('txtTipoMedi');
   }

   public function insertar()
   {
      $sql = "INSERT INTO tipos_medicamentos( clasificacion)
                                             VALUE(?)";
      $resultado = DB::insert($sql,[$this->clasificacion]);
      return $resultado;
   }

   public function seleccionarTodo()
   {
      $sql = "SELECT idtipoMedicamento, 
                     clasificacion                     
                     FROM tipos_medicamentos";
      $proveedores = DB::select($sql);
      return $proveedores;
   }

   public function seleccionarPorId($id)
   {
      $sql = "SELECT idtipoMedicamento, 
                     clasificacion
                     FROM tipos_medicamentos WHERE idtipoMedicamento = :id";
      $proveedores = DB::select($sql,['id'=>$id]);
      return $proveedores;
   }

   public function  eleminar($id)
   {
      $sql = " DELETE FROM tipos_medicamentos WHERE idtipoMedicamento = :id";
      $rDelete = DB::delete($sql,['id'=>$id]);
      return($rDelete);
   }

   public function actualizar()
   {  
      $sql = "UPDATE tipos_medicamentos SET clasificacion=?                                  
                                       WHERE idtipoMedicamento = ? ";
      $resultado = DB::update($sql,[$this->clasificacion,
                                    $this->idtipoMedicamento,
                                    ]);
      return $resultado;
   }

}