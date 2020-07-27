<?php

namespace App\Repositories;
use App\DetalleFactura;
use App\Factura;
use Illuminate\Support\Facades\DB;


class FacturaRepositorio
{
	private $model;
	private $DetalleFactura;

	public function __construct()
	{
		$this->model = new Factura();
		$this->DetalleFactura = new DetalleFactura();

	}

	public function grabarfactura($data)
	{
		try {
			DB::beginTransaction();

			$this->model->numero = $data->numero;
			$this->model->cliente_documento = $data->cliente_documento;
			$this->model->iva = $data->iva;
		 	$this->model->subtotal = $data->subtotal;
		 	$this->model->total = $data->total;

	 		//Factura::create($factura);
	 		$this->model->save();
	 		$detalle = [];
	 		foreach ($data->detalle as $value) {
	 			$obj = new DetalleFactura;

		 			//$obj->factura_numero = $data->numero;
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
			DB::rollback();
			return false;
		}

	}
}
