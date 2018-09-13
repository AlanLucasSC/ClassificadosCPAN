<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Solicitacao; 

class SolicitacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solicitacao.index');
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
        $solicitacoes->email = Auth::user();
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