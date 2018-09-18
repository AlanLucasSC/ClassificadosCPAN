@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Minhas Solicitações</div>
                <ul class="list-group list-group-flush">
                    @foreach ($negocios as $negocio) 
                        <li class="list-group-item">
                                <strong>Negócio: {{$negocio->nome}} </strong> <br>
                                <small>Descrição: {{$negocio->descricao}}</small>
                            @foreach ($negocio->solicitacao as $solicitacao)
                                @foreach ($solicitacao->user as $user)
                                    <div>
                                        <span class="badge badge-secondary badge-pill">Nome do Solicitante: {{$user->name}}</span>
                                    </div>
                                    <div>
                                        <span class="badge badge-secondary badge-pill">Email do Solicitante: {{$user->email}}</span>
                                    </div>
                                    <div>
                                        <span class="badge badge-secondary badge-pill">Descrição da Solicitação: {{$solicitacao->descricao}}</span>
                                    </div>
                                    <div>
                                        <span class="badge badge-secondary badge-pill">Quantidade da Solicitação: {{$solicitacao->quantidade}}</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="badge badge-success badge-pill">Data da solicitação: {{ date('d/m/Y', strtotime($solicitacao->created_at)) }}</span>
                                    </div>
                                @endforeach
                                
    
                            @endforeach
                            
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection