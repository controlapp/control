<?php

namespace App\Http\Controllers;

use App\Diferencia;
use App\MovimientosProducto;
use App\Periodo;
use App\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

			$inventario = array();
			/*$inventario = MovimientosProducto::select('codigo_material',DB::raw('sum(cantidad) as cantidad'))
                     ->groupBy('codigo_material')->with(['producto','diferencias'])
                     ->get();*/

			/*$producto = Producto::all('');
			$inventario = Diferencia::with('producto','movimientos')->get();
			$movimientos = MovimientosProducto::select('codigo_material',DB::raw('sum(cantidad) as cantidad'))
                     ->groupBy('codigo_material')->with(['producto'])
                     ->get();
            return $inventario;*/

			return view('inventario.diferencias',
				[
					'title' => 'Modulo control de diferenicas de inventario',
					'inventario' => $inventario,
					'fecha_movimiento' =>  Carbon::now()->format('m/d/yy'),
				]);
		} catch (Exception $e) {

		}
	}
	public function cargardatos(Request $request)
	{
		try {
			$fecha_movimiento = Carbon::parse($request->fecha_movimiento)->format('yy-m-d');

			$periodo_actual = Periodo::select('id_estado','periodo','fecha_inicio','fecha_cierre','codigo')
			->join('estado','estado.id','=','id_estado')
			->where('periodo',Carbon::parse($request->fecha_movimiento)->format('m.yy'))
			->first();

			$periodo_anterior_contabilizado = Periodo::select('id_estado','periodo','fecha_inicio','fecha_cierre','codigo')
			->join('estado','estado.id','=','id_estado')
			->where('nivel','PRE')
			->get();



			if(is_null($periodo_actual))
			{
				$inventario = null;
			}
			else
			{

				 $inventario = MovimientosProducto::select('movimientos_producto.codigo_material',DB::raw('SUM(movimientos_producto.cantidad) + SUM(diferencias.cantidad) AS cantidad_actual'))
                ->join('diferencias','diferencias.codigo_material','=','movimientos_producto.codigo_material')
                ->groupBy('movimientos_producto.codigo_material')
                ->with('producto')
                ->whereBetween('movimientos_producto.fecha_movimiento',[$periodo_actual->fecha_inicio,$fecha_movimiento])
                ->get();

			}



			   	return view('inventario.diferencias',
				[
					'title' => 'Modulo control de diferenicas de inventario',
					'inventario' => $inventario,
					'fecha_movimiento' =>  Carbon::parse($request->fecha_movimiento)->format('m/d/yy'),
				]);

		} catch (Exception $e) {
			return back()->with('error','Ha ocurrido un error');
		}
	}
}
