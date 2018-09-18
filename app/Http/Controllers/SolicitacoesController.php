<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Solicitacao; 
use App\Negocio; 
use App\User;
class SolicitacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       // error_log($id);
        return view('solicitacao.index', compact('id'));
    }

    public function solicitacoes()
    {
        $solicitacoes = Solicitacao::where('solicitacoes.user_id', Auth::id())->get();
        foreach($solicitacoes as $solicitacao){
            $solicitacao->negocio = Negocio::where('id', '=', $solicitacao->negocios_id)->get();
        }


        return view('solicitacao.minhas', compact('solicitacoes'));
    }

    public function recebidas()
    {   
        $negocios= Negocio::where('user_id', '=', Auth::id())->get();
        $users = User::all();
        foreach($negocios as $negocio){
            $negocio->solicitacao = Solicitacao::where('negocios_id', '=', $negocio->id)->get();
            //$solicitacao->negocio = Negocio::where('id', '=', $solicitacao->negocios_id)->get();
            foreach($negocio->solicitacao as $solicitacoes){
                $solicitacoes->user = User::where('id', '=', $solicitacoes->user_id)->get();
            }
        }


        return view('solicitacao.recebidas', compact('negocios'));
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
        
        $solicitacoes = new Solicitacao;
        if(!$request->quantidade){
            $error[] = 'Coloque seu nome para realizar um quantidade!';
        }
        if(!$request->desc){
            $error[] = 'Coloque uma descrição para sua solicitação!';
        }
        if(isset($error)){
            return redirect()->back()->with('error', $error);
        }
        

        $solicitacoes->quantidade = $request->quantidade;
        
        $solicitacoes->descricao = $request->desc;
        $solicitacoes->user_id = Auth::id();
        $help = Auth::user();
        $solicitacoes->email = $help->email;
        $solicitacoes->negocios_id = $request->id_negocio;
        $solicitacoes->save();
        
        return redirect()->back()->with('message', 'Sucesso ao criar sua solicitação!');
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