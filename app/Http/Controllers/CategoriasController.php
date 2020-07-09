<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\SaveCategoriaRequest;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::with('user')->paginate();
        return view('productos/categorias/index',[
            'categorias' => $categorias,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = new Categoria;
        return view('productos/categorias/form',[
            'categoria' => $categorias,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveCategoriaRequest $request, Categoria $categoria)
    {
        try
        {

            Categoria::create($request->validated());
            return back()->with('success','Categoria registrada con exito');
        }
         catch (Exception $ex)
        {
            return back()->with('error','Ha ocurrio un error al intentar grabar la categoria'.$ex->message());
        }
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
    public function destroy(Categoria $categoria)
    {
        try
        {
            $categoria->delete();
            return back()->with('success','Categoria eliminada con exito');
        } catch (Exception $ex) {
            return back()->with('error','Se ha presentado un error '.$ex->message());
        }
    }
}
