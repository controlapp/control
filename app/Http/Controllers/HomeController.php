<?php

namespace App\Http\Controllers;

use App\Persona;
use App\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Persona::all();
        $productos = Producto::all();


        return view('home',[
            'clientes' => count($clientes),
            'productos' => count($productos)
        ]);
    }
}
