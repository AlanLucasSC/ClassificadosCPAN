@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Negócios</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Digite o nome do Produto/Serviço</span>
                                </div>
                                <input type="text" class="form-control" placeholder="" name="negocio">
                            </div>
                            <div>
                                <span class="badge badge-secondary badge-pill">Esse é o nome do seu produto/serviço que será visto dentro dos classificados</span>
                                <span class="badge badge-secondary badge-pill">Coloque um nome bem legal e relacionado ao seu produto, seja criativo</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque um nome grande</span>
                                <span class="badge badge-danger badge-pill">Tamanho maximo de caracteres: 20</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Expediente</span>
                                </div>
                                <input type="time" aria-label="Começo" name="comeco[]" class="form-control">
                                <input type="time" aria-label="Fim" name="fim[]" class="form-control">
                            </div>
                            <div>
                                <span class="badge badge-secondary badge-pill">Coloque aqui seu expediente, seja sensato</span>
                                <span class="badge badge-secondary badge-pill">Só coloque o horário que estiver disponível</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Se for acadêmico, não coloque o seu expediente no horário de aula</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Digite o preço do seu Produto/Serviço</span>
                                </div>
                                <input type="number" min="-1" class="form-control" placeholder="" name="preco">
                            </div>
                            <div>
                                <span class="badge badge-secondary badge-pill">Coloque aqui o preço do seu Produto/Serviço</span>
                                <span class="badge badge-secondary badge-pill">Se o preço não é fixo, coloque 0</span>
                                <span class="badge badge-secondary badge-pill">Se o produto for de graça, coloque -1 (Ajude o Coleginha)</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque preços absurdos</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Digite a descrição do seu negócio</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name="desc"></textarea>
                            </div>
                            <div>
                                <span class="badge badge-secondary badge-pill">Coloque aqui a descrição do seu produto, local de venda, e outras caracteristicas</span>
                                <span class="badge badge-secondary badge-pill">Pode também colocar o seu celular e email (CUIDADO COM ISSO)</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque textos muito grandes. É bastante cansativo</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <strong> Exemplo de Produto - Cake Guy </strong>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection