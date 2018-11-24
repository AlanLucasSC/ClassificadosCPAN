<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Proposta;
use App\Pedido;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            ( Auth::user()->email );
        return view('proposta.index');
    }

    public function inserir($id){
        //dd($id);
        return view('proposta.index', compact('id'));
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
    public function store(Request $request, $id)
    {
        $proposta = new Proposta;
    
        if(!$request->desc){
            $error[] = 'Descreva a sua proposta!';
        }
        if(!$request->preco){
            $error[] = 'Digite o preço da sua proposta!';
        }
        if(isset($error)){
            return redirect()->back()->with('error', $error);
        }

        $proposta->email = Auth::user()->email;
        $proposta->status = 'PENDENTE';
        $proposta->preco = $request->preco;
        $proposta->descricao = $request->desc;
        $proposta->pedido_id = $id;
        $proposta->save();

        return redirect()->back()->with('message', 'Sucesso ao criar sua proposta!');
    }

    public function recebidas(){

        $propostas = Pedido::where('user_id', Auth::user()->id)->get();

        foreach($pedidos as $pedido => $value){
            $p_id = $value;
            foreach ($p_id as $pid) {
                $x = Proposta::where('pedido_id', $pid)->get();
            }
        }
    
       return view('proposta.recebidas', compact('propostas'));
    
        
    }
   
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
