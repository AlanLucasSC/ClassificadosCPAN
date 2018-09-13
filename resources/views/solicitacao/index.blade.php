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
            <form method= "POST" action="{{ route('solicitacoes.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">
                        Criar Solicitação
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
                                    <span class="input-group-text" id="basic-addon1">Quantas unidades quer?</span>
                                </div>
                                <input type="number" min="-1" step="0.01" class="form-control" placeholder="" name="quantidade">
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Coloque aqui a quantidade do produto soliciado você precisa. </span>
                                <span class="badge badge-secondary badge-pill">Coloque quantia minima em caso de dúvida. </span>
                               
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque quantias absurdas.</span>
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
                            <button type="submit" id="submit" class="btn btn-outline-success"> Salvar </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection