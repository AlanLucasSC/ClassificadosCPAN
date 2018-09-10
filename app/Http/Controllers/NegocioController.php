<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expediente;
use App\Negocio;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('negocio.index');
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
        $negocio = new Negocio;
        if(!$request->negocio){
            return redirect()->back()->with('error', ['Coloque algum nome para seu negocio!']);
        }
        if(!$request->preco){
            return redirect()->back()->with('error', 'Coloque algum preço para seu negocio!');
        }
        if(!$request->desc){
            return redirect()->back()->with('error', 'Colocar um descrição ajuda seu cliente, coloque uma descrição!');
        }
        $negocio->nome = $request->negocio;
        $negocio->preco = $request->preco;
        $negocio->descricao = $request->desc;
        $negocio->save();

        if(!$request->inicio){
            return redirect()->back()->with('error', 'Coloque algum horario para criar ser negocio!');
        }

        for($i = 0; $i < count($request->inicio); $i++){
            $expediente = new Expediente;
            $expediente->inicio = $request->inicio[$i];
            $expediente->fim = $request->fim[$i];

            $expediente->negocio()->associate($negocio);
            $expediente->save();
        }

        return redirect()->back()->with('message', 'Sucesso!');
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
