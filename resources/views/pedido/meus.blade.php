@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Meus Pedidos</div>
                <ul class="list-group list-group-flush">
                    @foreach ($pedidos as $pedido) 
                        <li class="list-group-item">
                            <strong> {{$pedido->nome}} </strong>
                            <div>
                                <span class="badge badge-secondary badge-pill">{{$pedido->descricao}}</span>
                            </div>
                            <div class="text-right">
                                
                                <span class="badge badge-success badge-pill">Para: {{ date('d/m/Y', strtotime($pedido->data)) }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection