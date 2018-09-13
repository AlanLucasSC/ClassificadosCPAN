<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use DB;


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
        
        $pedidos = Pedido::whereDate('pedidos.data', '>', date('Y-m-d'))
            ->select(DB::raw('pedidos.data, pedidos.nome, pedidos.descricao, DATEDIFF(pedidos.data, CURDATE()) AS Ordem'))  
            ->orderBy('ordem')
            ->get();
            
        return view('listapedidos.index', compact('pedidos'));
    }
}
