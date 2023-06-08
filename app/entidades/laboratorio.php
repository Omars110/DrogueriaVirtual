<?php
namespace App\entidades;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laboratorio extends Model{

   protected $table = 'laboratorios';
   public $timestamps = false;

   protected $fillable = ['idlaboratorio', 'nombre_farmaceutica', 'telefono', 'direccion', 'nit', 'sucursal'];
  
   public function __construct(){}
   public function __get($atributo){return $this->$atributo;}
   public function __set($atributo, $valor){$this->$atributo = $valor; return $this;}

   public function CargarFormulario($request)
   {
      $this->idlaboratorio = $request->input('idlaboratorio');
      $this->nombre_farmaceutica = $request->input('txtNombre');
      $this->telefono = $request->input('txtTelefono');
      $this->direccion = $request->input('txtDireccion');
      $this->nit = $request->input('txtNit');
      $this->sucursal = $request->input('txtSucursal');
   }

   public function insertar_L()
   {
      $sql = "INSERT INTO  laboratorios (nombre_farmaceutica,
                                          telefono,
                                          direccion,
                                          nit,
                                          sucursal)
                                          VALUE(?,?,?,?,?)";
      $resultado = DB::insert($sql,[
                                    $this->nombre_farmaceutica,
                                    $this->telefono,
                                    $this->direccion,
                                    $this->nit,
                                    $this->sucursal
                                 ]);  
      //return $this->idlaboratorio = DB::getPdo()->lastInsertId();                                                                          
   }

   public function actualizar()
   {  
      $sql = "UPDATE laboratorios SET nombre_farmaceutica=?, 
                                    telefono=?,
                                    direccion=?, 
                                    nit=?,
                                    sucursal=?
                                    WHERE idlaboratorio = ? ";
      $resultado = DB::update($sql,[$this->nombre_farmaceutica,
                                    $this->telefono,
                                    $this->direccion,
                                    $this->nit,
                                    $this->sucursal,
                                    $this->idlaboratorio]);
      return $resultado;
      
   }

   public function seleccionarPorId($id)
   {
      $sql = "SELECT idlaboratorio, 
                     nombre_farmaceutica, 
                     telefono, 
                     direccion, 
                     nit,
                     sucursal
                     FROM laboratorios WHERE idlaboratorio = :id";
      $laboratorios = DB::select($sql,['id'=>$id]);
      return $laboratorios;
   }

   public function  eleminar($id)
   {
      $sql = " DELETE FROM laboratorios WHERE idlaboratorio = :id";
      $rDelete = DB::delete($sql,['id'=>$id]);
      return($rDelete);
   }

   public function SeleccionarTodo()
   {
      $sql = "SELECT idlaboratorio,
                     nombre_farmaceutica,
                     telefono,
                     direccion,
                     nit,
                     sucursal
                     FROM laboratorios";
      $laboratorios = DB::select($sql);
      return $laboratorios;               
   }
} 