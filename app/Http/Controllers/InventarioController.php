<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Diferencia;
use Illuminate\Http\Request;
use App\MovimientosProducto;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{

	public function stock()
	{
		$inventario = MovimientosProducto::select('codigo_material',DB::raw('sum(cantidad) as cantidad'))
                     ->groupBy('codigo_material')->with(['producto'])
                     ->get();

		return view('inventario.stock',[
				'producto' => $inventario,
			]);

	}
	public function diferencias()
	{
		try
		{
			$inventario = Diferencia::with('producto')->get();
			$movimientos = MovimientosProducto::select('codigo_material',DB::raw('sum(cantidad) as cantidad'))
                     ->groupBy('codigo_material')->with(['producto'])
                     ->get();
			return view('inventario.diferencias',
				[
					'movimientos' => $movimientos,
					'inventario' => $inventario,
				]);
		} catch (Exception $e) {

		}
	}
}
