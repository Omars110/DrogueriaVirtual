<?php
namespace App\entidades;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Proveedor extends Model
{
   protected $table = 'proveedores';
   public $timestamps = false;
    
   protected $fillable = ['idproveedor', 'nombre', 'telefono', 'direccion', 'fk_idsucursalProveedor'];

   public function __construct(){}
   public function __get($atributo){return $this->$atributo;}
   public function __set($atributo, $valor){$this->$atributo = $valor; return $this;}   

   public function CargarDatosFormulario($request)
   {
      $this->idproveedor = $request->input('txtIdProveedor');
      $this->nombre = $request->input('txtNombre');
      $this->telefono = $request->input('txtTelefono');
      $this->direccion = $request->input('txtDireccion');
      $this->fk_idsucursalProveedor = $request->input('txtSucursalProveedor');
   }

   public function insertar()
   {
      $sql = "INSERT INTO proveedores( nombre, 
                                       telefono, 
                                       direccion, 
                                       fk_idsucursalProveedor)
                                       VALUE(?,?,?,?)";
      $resultado = DB::insert($sql,[$this->nombre,
                                    $this->telefono,
                                    $this->direccion,
                                    $this->fk_idsucursalProveedor]);
      return $resultado;
   }

   public function seleccionarTodo()
   {
      $sql = "SELECT idproveedor, 
                     nombre, 
                     telefono, 
                     direccion, 
                     fk_idsucursalProveedor
                     FROM proveedores";
      $proveedores = DB::select($sql);
      return $proveedores;
   }

   public function seleccionarPorId($id)
   {
      $sql = "SELECT idproveedor, 
                     nombre, 
                     telefono, 
                     direccion, 
                     fk_idsucursalProveedor
                     FROM proveedores WHERE idproveedor = :id";
      $proveedores = DB::select($sql,['id'=>$id]);
      return $proveedores;
   }

   public function actualizar()
   {  
      $sql = "UPDATE proveedores SET nombre=?, 
                                    telefono=?,
                                    direccion=?, 
                                    fk_idsucursalProveedor=? 
                                    WHERE idproveedor = ? ";
      $resultado = DB::update($sql,[$this->nombre,
                                    $this->telefono,
                                    $this->direccion,
                                    $this->fk_idsucursalProveedor,
                                    $this->idproveedor]);
      return $resultado;
   }

   public function  eleminar($id)
   {
      $sql = " DELETE FROM proveedores WHERE idproveedor = :id";
      $rDelete = DB::delete($sql,['id'=>$id]);
      return($rDelete);
   }

   public function filtrar($dato)
   {
      $sql = "SELECT idproveedor, 
                     nombre, 
                     telefono, 
                     direccion, 
                     fk_idsucursalProveedor
      FROM proveedores WHERE (nombre LIKE '%$dato%' OR
                              direccion LIKE '%$dato%' OR
                              fk_idsucursalProveedor LIKE '%$dato%')";
   $proveedores = DB::select($sql);
   return $proveedores;
   }
}
