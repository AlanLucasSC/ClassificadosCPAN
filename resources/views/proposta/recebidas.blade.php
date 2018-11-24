@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Propostas Recebidas</div>
                <ul class="list-group list-group-flush">
                    @foreach ($propostas as $proposta) 
                       {{$proposta}}
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection