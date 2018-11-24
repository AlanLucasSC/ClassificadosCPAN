<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::resource('/negocios','NegocioController');
Route::resource('/pedidos','PedidoController');
Route::resource('/proposta','PropostaController');
Route::resource('/solicitacoes','SolicitacoesController');

//Pedidos
Route::get('/pedidos/lista/{pag}','ListaPedidosController@index');
Route::get('/pedidos/meus/{pag}', 'PedidoController@meus');
Route::get('/pedidos/{id}/proposta', 'PropostaController@inserir');
Route::post('/pedidos/{id}/proposta', 'PropostaController@store');
Route::get('/propostas/recebidas', 'PropostaController@recebidas');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/solicitacao/{id}','SolicitacoesController@index');
Route::post('/solicitacao/{id}','SolicitacoesController@store');
Route::get('/minhas/solicitacoes', 'SolicitacoesController@solicitacoes');
Route::get('/minhas/recebidas', 'SolicitacoesController@recebidas');
Route::get('/logout', 'Auth\LoginController@logout');
