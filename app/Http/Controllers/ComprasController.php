<?php

namespace App\Http\Controllers;

use App\DatosEmpresa;
use App\DetalleOc;
use App\Http\Requests\SaveOrdenRequest;
use App\OrdenCompra;
use App\Producto;
use App\Proveedor;
use Carbon\Carbon;
use Carbon\Traits\today;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\beginTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\collect;

class ComprasController extends Controller
{
    private $model;

    function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = OrdenCompra::with(['estado','cliente'])->paginate(10);

        return view('compras.index',[
            'compras' => $compras,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $productos = Producto::where([
        ['id_estado',1],
         ['id_proveedor',$request->proveedor],
        ])->with(['proveedor','categoria'])->get();

        $proveedor = Proveedor::all();

        return view('compras.form',[
            'proveedores' => $proveedor,
            'productos' => $productos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
                /*$orden = DB::table('orden_compras')
                ->join('detalle_ocs','orden_compras.numero','detalle_ocs.numero_orden')
                ->join('')
                ->get();*/


                $orden =  OrdenCompra::where('id',$id)->with(['cliente','proveedor','estado','detalleoc'])->get();
                return $orden->toSql();

                //return $orden[0]->detalleoc = $builder->get();

                if(count($orden)===0)
                {
                    return redirect(route('compras.orden.index'))->with('warning','No se encontraron datos');
                }

                return $orden;

                return view('compras.pedido',[
                    'fecha' => Carbon::now(),
                    'orden' => $orden[0]->numero,
                    'proveedor' => $orden[0]->proveedor,
                    'cliente' => $orden[0]->cliente,
                    'productos' => $orden[0]->detalleoc
                ]);

        } catch (Exception $e) {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscarproveedor(Request $request )
    {
            $productos = Producto::where([
            ['id_estado',1],
             ['id_proveedor',$request->proveedor]
            ])
            ->with(['proveedor','categoria'])
            ->paginate(10);

            $proveedor = Proveedor::all();

           return view('compras.form',[
                'proveedores' => $proveedor,
                'productos' => $productos,
            ]);
    }

    public function orden(Request $request)
    {

        $orden = OrdenCompra::get()->last();

        if(is_null($orden))
        {
            $orden = 5000;
        }
        else
        {
            $orden = $orden->numero + 1;
        }

        $proveedor = Proveedor::where('id',$request->proveedorSelect)->get();
        $cliente = DatosEmpresa::where('id',1)->get();
        $productosOrder = Producto::whereIn('codigo',$request->selected)->with(['ume','presentacion'])->get();
        //return $productosOrder;

        return view('compras.pedido',[
            'proveedor' => $proveedor[0],
            'fecha' => Carbon::now(),
            'orden' => $orden,
            'cliente' => $cliente[0],
            'productos' =>$productosOrder,
        ]);

    }

    public function procesar(SaveOrdenRequest $request)
    {
        try {
            DB::beginTransaction();

            foreach ($request->cantidad as $key ) {
                if(is_numeric($key))
                {

                }
                else
                {
                    return redirect()->route('compras.orden.index')->with('error','Debes ingresar valores numericos ');
                }
            }

              $detalle = [
                        'numero_orden' => $request->input('numero_orden'),
                        'codigo_producto' => $request->input('codigo'),
                        'cantidad' => $request->input('cantidad'),
                        'valor_unitario' => $request->input('precio'),
                        'valor_total' => $request->input('valor_total') ,
                    ];

                  $value = array_values($detalle);
                                    $keys = array_keys($detalle);
                                    $valor =0;

                    for($i=0; $i < count($value[0]) ; $i++) {
                            $valor = $valor + $value[2][$i] * $value[3][$i];
                           }

                    $orden =
                    [
                        'numero' => $request->input('orden'),
                        'id_empresa' => $request->input('id_empresa'),
                        'id_proveedor' => $request->input('id_proveedor'),
                        'valor_compra' => $valor,
                        'id_user' => Auth()->user()->id,
                        'id_estado' => 1,
                        'observaciones' => ''
                    ];


             $oc =  OrdenCompra::insert($orden);




                   for($i=0; $i < count($value[0]) ; $i++) {
                      for ($a=0; $a < count($keys); $a++) {
                            $doc =
                            [
                                'numero_orden' =>  $value[0][$i],
                                'codigo_producto' => $value[1][$i],
                                'cantidad' => $value[2][$i],
                                'valor_unitario' => $value[3][$i],
                                'valor_total' => $value[4][$i],

                            ];
                      }
                      $detalle = DetalleOc::insert($doc);
                   }

                        DB::commit();

                        return redirect()->route('compras.orden.index')->with('success','La orden de compra se ha grabado con exito');



        } catch (Exception $ex)
        {
            DB::rollback();
            return back()->with('error','Se ha presentado un error'.$ex->getMessage());
        }


    }
}
