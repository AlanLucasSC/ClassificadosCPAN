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
                        Inserir Proposta
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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descreva a sua proposta</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Coloque aqui a descrição e as características da sua proposta.</span>
                                <span class="badge badge-secondary badge-pill">Pode também colocar o seu celular (CUIDADO COM ISSO)</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque textos muito grandes. É bastante cansativo</span>
                            </div>
                        </li>
                        
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Digite o preço da sua proposta</span>
                                </div>
                                <input type="number" min="0" step="0.01" class="form-control" placeholder="" name="preco">
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Coloque aqui o preço da sua proposta</span>
                                <span class="badge badge-secondary badge-pill">Se o produto for de graça, coloque 0 (Ajude o Coleginha)</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque preços absurdos</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button type="submit" id="submit" class="btn btn-outline-success"> Enviar Proposta </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection