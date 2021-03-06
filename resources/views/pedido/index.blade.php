@extends('layouts.app')

<script>
    function excluirElement(id){
        $('#'+id).remove();
    }
</script>

<style>
    #excluir{
        cursor: pointer;
        text-decoration: none;
    }
</style>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method= "POST" action="{{ route('pedidos.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        Criar Pedido
                        <br>
                        @if( \Session::has('error') )
                            @foreach(session()->get('error') as $key => $ms)
                                <span id="{{ $key }}error" class="badge badge-danger badge-pill">
                                    {{ $ms }}
                                    <a id="excluir" onClick="excluirElement('{{ $key }}error')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </span>
                            @endforeach
                        @endif
                        @if( \Session::has('message') )
                            <span id="success" class="badge badge-success badge-pill">
                                {{ \Session::get('message') }}
                                <a id="excluir" onClick="excluirElement('success')"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </span>
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Digite o seu nome</span>
                                </div>
                                <input type="text" class="form-control" placeholder="" name="nome">
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Esse é o seu nome para identificação dos provedores de serviço. </span>
                                <span class="badge badge-secondary badge-pill">Coloque as informações corretas para ser alcançado com facilidade</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque um nome grande</span>
                                <span class="badge badge-danger badge-pill">Tamanho maximo de caracteres: 20</span>
                            </div>
                        </li>
                        
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Para quando quer seu pedido?</span>
                                </div>
                                <input type="date" min="-1" step="0.01" class="form-control" placeholder="" name="data">
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Coloque aqui a data em que precisa do serviço ou produto pedido. </span>
                                <span class="badge badge-secondary badge-pill">Se for colocar por proximidade, coloque a data mínima. </span>
                                <span class="badge badge-secondary badge-pill">Não coloque data anterior a atual.</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque prazos absurdos</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Digite a descrição do seu pedido</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Coloque aqui a descrição e as características do seu pedido, com o que quer ou precisa.</span>
                                <span class="badge badge-secondary badge-pill">Pode também colocar o seu celular e email (CUIDADO COM ISSO)</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque textos muito grandes. É bastante cansativo</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <strong> Exemplo de Pedido - João Delas </strong>
                            <div>
                                <span class="badge badge-secondary badge-pill">Preciso levar bolo um bolo para minha mãe na próxima sexta mas não tenho tempo de ir comprar depois da faculdade.</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-success badge-pill">Data: 14/09/2018</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button type="submit" id="submit" class="btn btn-outline-success"> Salvar </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection