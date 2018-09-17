@extends('layouts.app')

<style>
    #button{
        cursor: pointer;
        text-decoration: none;
    }
    a, a:hover{
        color: white !important
    }
</style>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Pedidos</div>

                <ul class="list-group list-group-flush">
                    @foreach ($pedidos as $pedido) 
                        <li class="list-group-item">
                            <strong> {{$pedido->nome}} </strong>
                            <div>
                                <span class="badge badge-secondary badge-pill">{{$pedido->descricao}}</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-success badge-pill">Para: {{ date('d/m/Y', strtotime($pedido->data)) }}</span>
                                @if($pedido->user_id != Auth::id())
                                    <span class="badge badge-primary badge-pill">
                                        <a href="{{ url('/pedidos/'.$pedido->id.'/proposta') }}" id="button"> Enviar Proposta <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                                    </span>
                                @endif
                            </div>
                        </li>

                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
@endsection