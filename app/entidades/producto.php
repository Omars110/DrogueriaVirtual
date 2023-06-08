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

      $this->idmedicamento = $request->input('');
      $this->nombre = $request->input('txtNombre');
      $this->codigo_barra = $request->input('txtCodigoBarra');
      $this->cantidad_interna = $request->input('txtCantidadInterna');
      $this->cantidad_externa = $request->input('txtCantidadExterna');
      $this->fecha_ingreso = $request->input('txtFechaDeIngreso');
      $this->precio = $request->input('numPrecio');
      $this->fecha_vencimiento = $request->input('txtFechaDeVenciemiento');
      $this->lote = $request->input('txtLote');
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
                                       fk_idseccion,
                                       fk_idproveedor,
                                       fk_idlaboratorio,
                                       fk_idtipo_medicamento)
                                     VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $resultado = DB::insert($sql,[$this->nombre,
                                    $this->codigo_barra,
                                    $this->cantidad_interna,
                                    $this->cantidad_externa,
                                    $this->fecha_ingreso,
                                    $this->precio,
                                    $this->fecha_vencimiento,
                                    $this->lote,
                                    $this->fk_idseccion,
                                    $this->fk_idproveedor,
                                    $this->fk_idlaboratorio,
                                    $this->fk_idtipo_medicamento,
                                    ]);
      return $this->idcliente = DB::getPdo()->lastInsertId();                                    
   }
   public function seleccionarTodoLosP()
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
                     fk_idseccion,
                     fk_idproveedor,
                     fk_idlaboratorio,
                     fk_idtipo_medicamento FROM medicamentos";
      $productos = DB::select($sql);
      return $productos;
   }
}