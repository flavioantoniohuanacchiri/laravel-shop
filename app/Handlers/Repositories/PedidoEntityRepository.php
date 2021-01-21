<?php namespace App\Handlers\Repositories;

use App\Handlers\Interfaces\PedidoEntityInterface;
use App\Sales\Models\Pedido;
use App\Sales\Models\PedidoDetalle;
use DB;

class PedidoEntityRepository implements PedidoEntityInterface
{
	public function create($entity = [])
	{
		DB::beginTransaction();
		try {
			$obj = new Pedido;
			$obj->sede_id = 30;
			$obj->fecha_registro = date("Y-m-d");
			$obj->total = $entity["amount"];
			$obj->save();

			foreach ($entity["producto_id"] as $key => $value) {
				$detail = new PedidoDetalle;
				$cantidad = isset($entity["cantidad"][$key])? $entity["cantidad"][$key] : 0;
				$detail->cantidad = $cantidad;
				$precio = isset($entity["price"][$key])? $entity["price"][$key] : 0;
				$total = $cantidad*$precio;

				$detail->cantidad = $cantidad;
				$detail->pedido_id = $obj->id;
				$detail->producto_id = $value;
				$detail->sub_total = $total;
				$detail->precio_unitario = $precio;

				$detail->save();

			}
			DB::commit();
			return ["rst" => 1, "msj" => "Venta Registrada"];
		} catch (Exception $e) {
			return ["rst" => 2, "msj" => "Error: ".$e->getMessage()];
		}
	}
}