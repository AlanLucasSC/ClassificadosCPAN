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
      // $soli_id = Solicitacao::find($id);

        return view('solicitacao.index', compact('id'));
        
    }

    public function create()
    {
     
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
    

   
    public function store(Request $request, $id)
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
        $solicitacoes->negocios_id = $id;
        $solicitacoes->save();
        
        return redirect()->back()->with('message', 'Sucesso ao criar sua solicitação!');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}