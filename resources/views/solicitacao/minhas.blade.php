@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Minhas Solicitações</div>
                <ul class="list-group list-group-flush">
                    @foreach ($solicitacoes as $solicitacao) 
                        <li class="list-group-item">
                           
                            @foreach ($solicitacao->negocio as $negocio)
                                Nome do Negócio: <strong> {{$negocio->nome}} </strong>
    
                            @endforeach
                            <div>
                                <span class="badge badge-secondary badge-pill">Descrição: {{$solicitacao->descricao}}</span>
                            </div>
                            <div>
                                <span class="badge badge-secondary badge-pill">Quantidade: {{$solicitacao->quantidade}}</span>
                            </div>
                            <div class="text-right">
                                
                                <span class="badge badge-success badge-pill">Data da solicitação: {{ date('d/m/Y', strtotime($solicitacao->created_at)) }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection