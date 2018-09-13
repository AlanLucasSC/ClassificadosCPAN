<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Pedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pedido.index');
    }

    public function meus()
    {
        $pedidos = Pedido::where('pedidos.user_id', Auth::id())->get();
        return view('pedido.meus', compact('pedidos'));
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
        $pedido = new Pedido;
        if(!$request->nome){
            $error[] = 'Coloque seu nome para realizar um pedido!';
        }
        if(!$request->data){
            $error[] = 'Coloque uma data para seu pedido!';
        }
        if(!$request->desc){
            $error[] = 'Coloque uma descrição para seu pedido!';
        }
        if(isset($error)){
            return redirect()->back()->with('error', $error);
        }

        $pedido->nome = $request->nome;
        $pedido->data = $request->data;
        $pedido->descricao = $request->desc;
        $pedido->user_id = Auth::id();
        $pedido->save();

        return redirect()->back()->with('message', 'Sucesso ao criar seu pedido!');
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
