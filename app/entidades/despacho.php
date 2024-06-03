<?php

namespace App\entidades;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Despacho extends Model
{
	protected $table = 'despacho';
	public $timestamps = false;

	protected $fillable = [
		'iddespacho',
		'idtransaccion_paypal',
		'nombre_comprador',
		'apellido_comprador',
		'direccion_entrega_pedido',
		'estado_transaccion',
		'valor_transaccion',
		'fecha_transaccion',
		'fecha_compra',
		'fk_idcarrito'
	];

	public function __construct(){}
	public function __get($atributo){return $this->$atributo;}
	public function __set($atributo, $valor){$this->$atributo = $valor; return $this;}

	public function CargarDatosFormulario($request)
	{
		try {
			//Asignar los valores del request a las propiedades del objeto
			$this->idtransaccion_paypal = $request['idtransaccion_paypal'];
			$this->nombre_comprador = $request['nombre_comprador'];
			$this->apellido_comprador = $request['apellido_comprador'];
			$this->direccion_entrega_pedido = $request['direccion_entrega_pedido'];
			$this->estado_transaccion = $request['estado_transaccion'];
			$this->valor_transaccion = $request['valor_transaccion'];
			$this->fecha_transaccion = $request['fecha_transaccion'];
			$this->fecha_compra = $request['fecha_compra'];
			$this->fk_idcarrito = $request['fk_idcarrito'];
			return true;
		} catch (\Exception $e) {
			Log::error('A ocurrido un error al llenar formulario: ' . $e->getMessage());
			return false;
		}
	}

	public function InsertarPedidoDespacho()
	{
		try {
			$sql = "INSERT INTO  despacho ( idtransaccion_paypal,
													nombre_comprador,
													apellido_comprador,
													direccion_entrega_pedido,
													estado_transaccion,
													valor_transaccion,
													fecha_transaccion,
													fecha_compra,
													fk_idcarrito											
												)  VALUE(?,?,?,?,?,?,?,?,?)";
			$resultado = DB::insert($sql, [
				$this->idtransaccion_paypal,
				$this->nombre_comprador,
				$this->apellido_comprador,
				$this->direccion_entrega_pedido,
				$this->estado_transaccion,
				$this->valor_transaccion,
				$this->fecha_transaccion,
				$this->fecha_compra,
				$this->fk_idcarrito
				
			]);
			if ($resultado === false) {
				throw new \Exception('La insercion de datos tubo un error:');
			}
			//return $this->idlaboratorio = DB::getPdo()->lastInsertId();
		} catch (\Exception $e) {
			Log::error('A ocurrido un error al insertar los datos a la base de datos: ' . $e->getMessage());
			throw $e;
		}
	}
}
