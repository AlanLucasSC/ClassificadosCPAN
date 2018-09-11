<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Negocio;
use App\Expediente;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $negocios = Negocio::all();
        foreach($negocios as $negocio){
            $negocio->expediente = Expediente::where('negocio_id', '=', $negocio->id)->get();
        }



        return view('home', compact('negocios'));
    }
}
