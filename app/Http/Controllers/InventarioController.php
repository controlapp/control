<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MovimientosProducto;
use App\Producto;
use DB;

class InventarioController extends Controller
{

	public function stock()
	{
		$inventario = MovimientosProducto::select('codigo_material',DB::raw('sum(cantidad) as cantidad'))
                     ->groupBy('codigo_material')->with(['producto'])
                     ->get();

		return view('inventario.stock',
			[
				'producto' => $inventario,
			]);

	}
}
