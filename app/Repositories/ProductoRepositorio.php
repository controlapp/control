<?php

namespace App\Repositories;
use App\Producto;


class ProductoRepositorio
{
	private $model;

	public function __construct()
	{
		$this->model = new Producto();
	}

	public function buscarxnombre($q)
	{
		return $this->model->where('nombre','like', "%$q%")->with('impuesto')->get();
	}
}
