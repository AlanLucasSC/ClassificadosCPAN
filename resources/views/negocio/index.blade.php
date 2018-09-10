@extends('layouts.app')

<script>
    var horarios = []
    var cont = 0
    window.onload = function(){
        $('#addhorario').click(function(){
            var inicio = $('#inicio').val()
            var fim = $('#fim').val()
            var text = ''

            if(inicio && fim){
                horarios.push({ 'id': cont, 'in': inicio, 'out': fim })
                cont++
                console.log(horarios)
            }

            for(i in horarios){
                text += ' <span id="'+horarios[i].id+'" class="badge badge-primary badge-pill">'+horarios[i].in+' - '+horarios[i].out+' <input type="time" value="'+horarios[i].in+'" name="inicio[]" class="d-none"> <input type="time" value="'+horarios[i].out+'" name="fim[]" class="d-none">  <a id="excluir" onClick="excluir(`'+horarios[i].id+'`)"><i class="fa fa-times" aria-hidden="true"></i></a> </span>'
            }

            element = document.getElementById('horarios')
            element.innerHTML = text
        })
    }

    function excluir(id){
        var remove = -1
        for(i in horarios){
            if(id == horarios[i].id){
                horarios.splice(i, 1);
                break
            }
        }

        var text = ''

        for(i in horarios){
            text += ' <span id="'+horarios[i].id+'" class="badge badge-primary badge-pill">'+horarios[i].in+' - '+horarios[i].out+' <input type="time" value="'+horarios[i].in+'" name="inicio[]" class="d-none"> <input type="time" value="'+horarios[i].out+'" name="fim[]" class="d-none">  <a id="excluir" onClick="excluir(`'+horarios[i].id+'`)"><i class="fa fa-times" aria-hidden="true"></i></a> </span>'
        }

        element = document.getElementById('horarios')
        element.innerHTML = text
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
            @if( \Session::has('message') )
                <h3 class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ \Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h3>
            @endif

            @if( \Session::has('error') )
                <h3 class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach(session()->get('error') as $ms)
                        {{ $ms }} <br>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h3>
            @endif
            <form method= "POST" action="{{ route('negocios.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
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
                            <div class="text-right">
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
                                <input type="time" aria-label="Começo" id="inicio" class="form-control">
                                <input type="time" aria-label="Fim" id="fim" class="form-control">
                                <div class="input-group-append">
                                    <button type="button" id="addhorario" class="btn btn-outline-success"> Adicionar </button>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-secondary badge-pill">Coloque aqui seu expediente, seja sensato</span>
                                <span class="badge badge-secondary badge-pill">Só coloque o horário que estiver disponível</span>
                            </div>
                            <div class="text-right">
                                <span class="badge badge-danger badge-pill">Não coloque no seu expediente o horário de alguma aula que está frequentando</span>
                            </div>
                            <div id="horarios"> </div>
                        </li>
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Digite o preço do seu Produto/Serviço</span>
                                </div>
                                <input type="number" min="-1" step="0.01" class="form-control" placeholder="" name="preco">
                            </div>
                            <div class="text-right">
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
                            <div class="text-right">
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
                        <li class="list-group-item">
                            <button type="submit" id="submit" class="btn btn-outline-success"> Salvar </button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
@endsection