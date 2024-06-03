<?php

namespace App\entidades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductosDespachados extends Model
{
    protected $table = 'productos_despachados';
    public $timestamps = false;

    protected $fillable = [
        'idproductos_despachados',
        'cantidad',
        'precio_unitario',
        'total',
        'fk_idmedicamento',
        'fk_idcarrito'
    ];

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

    public function Cargar_productos_despacho($aCarrito)
    {
        try {
            $this->cantidad = $aCarrito['cantidad'];
            $this->precio_unitario = $aCarrito['precio_unitario'];
            $this->total = $aCarrito['total'];
            $this->fk_idmedicamento = $aCarrito['fk_idmedicamento'];
            $this->fk_idcarrito = $aCarrito['fk_idcarrito'];
        } catch (\Exception $e) {
            Log::error('A ocurrido un error al llenar formulario: ' . $e->getMessage());
            throw $e;
            return false;
        }
    }

    public function insertar_productos_despachados()
    {
        try {
            $sql = "INSERT INTO  productos_despachados(cantidad,
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
            if ($resultado === false) {
                throw new \Exception('error al insertar registros');
            }
            return $resultado;

            //return $this->idlaboratorio = DB::getPdo()->lastInsertId();
        } catch (\Exception $e) {
            Log::error('A ocurrido un error al insertar los datos a a base de datos: ' . $e->getMessage());
            throw $e;
        }
    }
}
