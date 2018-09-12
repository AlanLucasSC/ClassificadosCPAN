@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Classificados</div>

                <ul class="list-group list-group-flush">
                    @foreach ($negocios as $negocio) 
                        <li class="list-group-item">
                            <strong> {{$negocio->nome}} </strong>
                            <div>
                                <span class="badge badge-secondary badge-pill">{{$negocio->descricao}}</span>
                            </div>
                            <div class="text-right">
                                
                                <span class="badge badge-success badge-pill">Preço: {{$negocio->preco}}</span>
                                @foreach($negocio->expediente as $expediente)
                                
                                    <span class="badge badge-primary badge-pill">{{ date('h:i a', strtotime($expediente->inicio)) }} - {{ date('h:i a', strtotime($expediente->fim)) }}</span>
                                @endforeach
                                
                                <span class="badge badge-muted badge-pill">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </span>
                            </div>
                        </li>

                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
@endsection

<!--<li class="list-group-item">
                        <strong> Cake Guy </strong>
                        <div>
                            <span class="badge badge-secondary badge-pill">Eu vendo os bolos na faculdade, a maioria das vezes estou na arquibancada</span>
                        </div>
                        <div class="text-right">
                            <span class="badge badge-success badge-pill">Preço: R$4,00</span>
                            <span class="badge badge-primary badge-pill">14:00 - 20:00</span>
                            <span class="badge badge-primary badge-pill">08:00 - 12:00</span>
                            <span class="badge badge-muted badge-pill">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <strong> Batatinha do BOM </strong>
                        <div>
                            <span class="badge badge-secondary badge-pill">Sou uma loja de venda de batatas, fico na rua ..., de acordo com os acadêmicos a minha comida é boa</span>
                        </div>
                        <div class="text-right">
                            <span class="badge badge-success badge-pill">Preço: R$20,00</span>
                            <span class="badge badge-primary badge-pill">10:00 - 13:00</span>
                            <span class="badge badge-primary badge-pill">20:00 - 22:00</span>
                            <span class="badge badge-muted badge-pill">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <strong> Docinhos </strong>
                        <div>
                            <span class="badge badge-secondary badge-pill">Eu vendo os docinhos na frente do Unidade 1</span>
                        </div>
                        <div class="text-right" id="desc">
                            <span class="badge badge-success badge-pill">Preço: R$1,00</span>
                            <span class="badge badge-primary badge-pill">18:00 - 22:00</span>
                            <span class="badge badge-muted badge-pill">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </span>
                        </div>
                    </li> -->