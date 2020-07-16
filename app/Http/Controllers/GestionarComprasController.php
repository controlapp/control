<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuscarOrdenRequest;
use App\MovimientosProducto;
use App\OrdenCompra;
use App\TipoMovimientos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionarComprasController extends Controller
{


    public function ingresar()
    {
    	return view('compras.movimientos');
    }

    public function buscar(BuscarOrdenRequest $request)
    {
    	try
    	{
    			$validated = $request->validated();
    			$orden =  OrdenCompra::where('numero',$request->numero_orden)->where('id_estado','<>','3')->with(['cliente','proveedor','estado','detalleoc','detalle'])->get();
    			$tipo_mov = TipoMovimientos::get();

                if(count($orden)===0)
                {
                    return back()->with('warning','La orden de cmpra no existe o se encuentra anulada');
                }


                $fecha = Carbon::now();
                $fecha = $fecha->format('Y-m-d');

               return view('compras.movimientos',[
               		'orden' => $request->numero_orden,
               		'tipo_mov' => $tipo_mov,
                    'fecha' => $fecha,
                    'update' => $orden[0]->updated_at,
                    'numero' => $orden[0]->numero,
                    'proveedor' => $orden[0]->proveedor,
                    'cliente' => $orden[0]->cliente,
                    'productos' => $orden[0]->detalleoc,
                    'detalle' => $orden[0]->detalle,
                ]);


    	} catch (Exception $e) {
    		return back()->with('error','Se ha presentado un error: '.$e.message());
    	}
    }

    public function grabar(Request $request)
    {
    	  DB::beginTransaction();
    	try {
    		if(isset($request->selected))
    		{
    			$movimiento = [
    				'codigo_material' => $request->codigo,
    				'cantidad' => $request->cantidad,
    				'movimiento' => $request->tipo_mov,
    				'fecha_movimiento' => $request->fecha,
    				'fecha_vto' => $request->fecha_vto,
    				'presentacion' => $request->presentacion,
    				'proveedor' => $request->proveedor,
    				'orden' => $request->orden,
    				'user' => $request->usuario
    			];

				$value = array_values($movimiento);
				$keys = array_keys($movimiento);
				$valor =0;


				 for($i=0; $i < count($value[0]) ; $i++) {
                      for ($a=0; $a < count($keys); $a++) {
                            $posicion =
                            [

                            	'codigo_material' => $value[0][$i],
			    				'cantidad' => $value[1][$i],
			    				'movimiento' => $value[2][$i],
			    				'fecha_movimiento' => $value[3],
			    				'fecha_vto' => $value[4][$i],
			    				'presentacion' => $value[5][$i],
			    				'proveedor' => $value[6][$i],
			    				'orden' => $value[7],
			    				'user' => $value[8],

                            ];

                      }
                     $accion = MovimientosProducto::create($posicion);
                   }

                    	DB::commit();

                    	return redirect()->route('compra.orden.ingresar')->with('success','El ingreso se ha realizado con exito');
    		}
    		else
    		{
    			return back()->with('info','No se ha realizado ningun ingreso');
    		}

    	} catch (Exception $e) {

    	}

    }
}