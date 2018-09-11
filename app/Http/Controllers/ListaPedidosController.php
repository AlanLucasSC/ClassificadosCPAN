<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;


class ListaPedidosController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        



        return view('listapedidos.index', compact('pedidos'));
    }
}
