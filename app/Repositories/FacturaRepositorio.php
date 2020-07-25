<?php

namespace App\Repositories;
use App\DetalleFactura;
use App\Factura;
use Illuminate\Support\Facades\DB;


class FacturaRepositorio
{
	private $model;

	public function __construct()
	{
		$this->model = new Factura();

	}

	public function grabarfactura($data)
	{
		try {
			DB::beginTransaction();
			$factura =
				[
					'numero' => $data->numero,
					'cliente_documento' => $data->cliente_documento,
					'iva' => $data->iva,
				 	'subtotal' => $data->subtotal,
				 	'total' => $data->total,
				];

	 		Factura::create($factura);
	 		$detalle = [];
	 		foreach ($data->detalle as $value) {
	 			$obj = new DetalleFactura;

		 			$obj->factura_numero = $value['factura_numero'];
					$obj->producto_codigo = $value['producto_codigo'];
		 			$obj->cantidad = $value['cantidad'];
		 			$obj->precio_unitario = $value['precio_unitario'];
		 			$obj->iva = $value['iva'];
		 			$obj->total = $value['total'];

		 		$detalle[] = $obj;

	 		}

	 		$this->model->detalle()->saveMany($detalle);

			DB::commit();
			return true;

		} catch (Exception $e) {

		}

	}
}
