<?php

namespace App\entidades;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   protected $table = 'medicamentos';
   public $timestamps = false;

   protected $fillable = [ 'idmedicamento',
                           'nombre',
                           'codigo_barra',
                           'cantidad_interna',
                           'cantidad_externa',
                           'precio',
                           'fecha_ingreso',
                           'fecha_vencimiento',
                           'lote',
                           'imagen',
                           'fk_idseccion',
                           'fk_idproveedor',
                           'fk_idlaboratorio',
                           'fk_idtipo_medicamento'];


   public function __construct(){}
   public function __get($atributo){return $this->$atributo;}
   public function __set($atributo, $valor){$this->$atributo = $valor; return $this;}
   
   public function CargarDatosFormulario($request)
   {
      //print_r($get);
      //exit;

      $this->idmedicamento = $request->input('txtIdmedicamento');
      $this->nombre = $request->input('txtNombre');
      $this->codigo_barra = $request->input('txtCodigoBarra');
      $this->cantidad_interna = $request->input('txtCantidadInterna');
      $this->cantidad_externa = $request->input('txtCantidadExterna');
      $this->fecha_ingreso = $request->input('txtFechaDeIngreso');
      $this->precio = $request->input('numPrecio');
      $this->fecha_vencimiento = $request->input('txtFechaDeVenciemiento');
      $this->lote = $request->input('txtLote');
      $this->imagen = '';
      $this->fk_idseccion = $request->input('lstSeccion');
      $this->fk_idproveedor = $request->input('lstProveedor');
      $this->fk_idlaboratorio = $request->input('lstlaboratorio');
      $this->fk_idtipo_medicamento = $request->input('lstTipoMed');
      

      /*
      $this->idproducto = isset($get["id"]) ? $get["id"] : "";
      $this->nombre_P = isset($get["txtNombre"]) ? $get["txtNombre"] : "";
      $this->fabricante_P = isset($get["txtFabricante"]) ? $get["txtFabricante"] : "";
      $this->cantidad_P = isset($get["txtCantidadP"]) ? $get["txtCantidadP"] : "";
      $this->codigo_P = isset($get["txtCodigo"]) ? $get["txtCodigo"] : "";
      $this->precio = isset($get["nunPrecio"]) ? $get["nunPrecio"] : "";
      $this->seccion = isset($get["txtSeccion"]) ? $get["txtSeccion"] : "";
      */
   }

   public function insertar_P()
   {
      $sql = "INSERT INTO medicamentos(nombre,
                                       codigo_barra,
                                       cantidad_interna,
                                       cantidad_externa,
                                       fecha_ingreso,
                                       precio,
                                       fecha_vencimiento,
                                       lote,
                                       imagen,
                                       fk_idseccion,
                                       fk_idproveedor,
                                       fk_idlaboratorio,
                                       fk_idtipo_medicamento)
                                     VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $resultado = DB::insert($sql,[$this->nombre,
                                    $this->codigo_barra,
                                    $this->cantidad_interna,
                                    $this->cantidad_externa,
                                    $this->fecha_ingreso,
                                    $this->precio,
                                    $this->fecha_vencimiento,
                                    $this->lote,
                                    $this->imagen,
                                    $this->fk_idseccion,
                                    $this->fk_idproveedor,
                                    $this->fk_idlaboratorio,
                                    $this->fk_idtipo_medicamento,
                                    ]);
      return $this->idcliente = DB::getPdo()->lastInsertId();                                    
   }
   public function seleccionarTodoLosP()
   {
      $sql = "SELECT A.idmedicamento,
                     A.nombre,
                     A.codigo_barra,
                     A.cantidad_interna,
                     A.cantidad_externa,
                     A.fecha_ingreso,
                     A.precio,
                     A.fecha_vencimiento,
                     A.lote,
                     A.imagen,
                     A.fk_idseccion,
                     A.fk_idproveedor,
                     A.fk_idlaboratorio,
                     /*A.fk_idtipo_medicamento tener en cuanta que si hacer el inner join debes quitar los llaves foraneas fk de la tabla que corresponde */
                     B.clasificacion
                     FROM medicamentos A
                     INNER JOIN tipos_medicamentos B ON A.fk_idtipo_medicamento = B.idtipoMedicamento";
                     
      $productos = DB::select($sql);
      return $productos;
   }

   public function seleccionarPorId($id)
   {
      $sql = "SELECT idmedicamento,
                     nombre,
                     codigo_barra,
                     cantidad_interna,
                     cantidad_externa,
                     fecha_ingreso,
                     precio,
                     fecha_vencimiento,
                     lote,
                     imagen,
                     fk_idseccion,
                     fk_idproveedor,
                     fk_idlaboratorio,
                     fk_idtipo_medicamento 
                     FROM medicamentos WHERE idmedicamento = :id";
      $medicamento = DB::select($sql,['id'=>$id]);
      return $medicamento;
   }

   public function actualizar()
   {  
      $sql = "UPDATE medicamentos SET nombre = ?,
                                       codigo_barra = ?,
                                       cantidad_interna = ?,
                                       cantidad_externa = ?,
                                       fecha_ingreso = ?,
                                       precio = ?,
                                       fecha_vencimiento = ?,
                                       lote = ?,
                                       imagen =?,
                                       fk_idseccion = ?,
                                       fk_idproveedor = ?,
                                       fk_idlaboratorio = ?,
                                       fk_idtipo_medicamento = ? 
                                    WHERE idmedicamento = ? ";
      $resultado = DB::update($sql,[$this->nombre,
                                    $this->codigo_barra,
                                    $this->cantidad_interna,
                                    $this->cantidad_externa,
                                    $this->fecha_ingreso,
                                    $this->precio,
                                    $this->fecha_vencimiento,
                                    $this->lote,
                                    $this->imagen,
                                    $this->fk_idseccion,
                                    $this->fk_idproveedor,
                                    $this->fk_idlaboratorio,
                                    $this->fk_idtipo_medicamento,
                                    $this->idmedicamento]);
      return $resultado;
   }

   public function  eleminar($id)
   {
      $sql = " DELETE FROM medicamentos WHERE idmedicamento = :id";
      $rDelete = DB::delete($sql,['id'=>$id]);
      return($rDelete);
   }

   public function filtrar($dato)
   {
      $sql = "SELECT A.idmedicamento,
                     A.nombre,
                     A.codigo_barra,
                     A.cantidad_interna,
                     A.cantidad_externa,
                     A.fecha_ingreso,
                     A.precio,
                     A.fecha_vencimiento,
                     A.lote,
                     A.imagen,
                     C.columna,
                     C.fila,
                     B.nombre as proveedor,
                     D.nombre_farmaceutica as farmaceutica,
                     E.clasificacion 
                     FROM medicamentos A 
                     INNER JOIN proveedores B ON A.fk_idproveedor = B.idproveedor
                     INNER JOIN secciones C ON A.fk_idseccion = C.idseccion
                     INNER JOIN laboratorios D ON A.fk_idlaboratorio = D.idlaboratorio
                     INNER JOIN tipos_medicamentos E ON A.fk_idtipo_medicamento = E.idtipoMedicamento
                     WHERE(A.nombre LIKE '%$dato%' OR
                           A.codigo_barra LIKE '%$dato%' OR
                           A.fecha_vencimiento LIKE '%$dato%' OR
                           B.nombre LIKE '%$dato%' OR
                           C.columna LIKE '%$dato%' OR
                           C.fila LIKE '%$dato%' OR
                           D.nombre_farmaceutica LIKE '%$dato%'OR
                           E.clasificacion LIKE '%$dato%'
                           )";
      $medicamentos = DB::select($sql);
      return $medicamentos;
   }
}