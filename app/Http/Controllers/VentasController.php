<?php

namespace App\Http\Controllers;

use App\DatosEmpresa;
use App\Factura;
use App\Http\Requests\BuscarClienteRequest;
use App\Persona;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VentasController extends Controller
{

    private $cliente = null;

    public function __CONSTRUCT()
    {
        $this->cliente = new Persona();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

   /* public function buscarcliente(BuscarClienteRequest $request)
    {

        try {
            $request->validated();
            $cliente = Persona::where('documento',$request->documento)->first();
            $empresa = DatosEmpresa::where('id',1)->first();
            $factura = Factura::get()->last();
            if(is_null($factura))
            {
                $numero_factura = 0001;
            }
            else
            {
                $numero_factura = $factura->numero + 1;
            }


         return view('ventas.facturar',
            [
                'empresa' => $empresa,
                'cliente' => $cliente,
                'numero_factura' => $numero_factura,
                'fecha_factura' => Carbon::now(),
            ]);


        } catch (Exception $e) {

        }
    }*/

    public function facturar()
    {
            $empresa = DatosEmpresa::where('id',1)->first();
            $factura = Factura::get()->last();
            if(is_null($factura))
            {
                $numero_factura = 0001;
            }
            else
            {
                $numero_factura = $factura->numero + 1;
            }


         return view('ventas.facturar',
            [
                'empresa' => $empresa,
                'numero_factura' => $numero_factura,
                'fecha_factura' => Carbon::now(),
            ]);
    }


    public function buscar($doc)
    {

        return $this->cliente->buscarcliente($doc);
        //return Persona::where('documento',1075250713->get();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
}
