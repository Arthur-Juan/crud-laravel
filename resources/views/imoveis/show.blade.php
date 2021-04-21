@extends('shared.base')
@section('content')

    <div class="panel panel-default">

    <div class="panel-heading">Detalhes do Imóvel</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h4>Sobre o imóvel</h4>
                 <p>Descrição: {{$imovel->descricao}}</p>
                <p>Preço:  R$ {{$imovel->preco}}</p>
                <p>Quantida de quartos: {{$imovel->qtdQuartos}}</p>
                <p>Tipo: {{$imovel->tipo}}</p>
                <p>Finalidade: {{$imovel->finalidade}}</p>
                <hr>
                <p>Logradouro: {{$imovel->logradouroEndereco}}</p>
                <p>Bairro: {{$imovel->bairroEndereco}}</p>
                <p>Número: {{$imovel->numeroEndereco}}</p>
                <p>CEP: {{$imovel->cepEndereco}}</p>
                <p>Bairro: {{$imovel->bairroEndereco}}</p>
            </div>

        </div>
    </div>

    </div>
    <a href='{{url()->previous()}}' class='btn btn-default'>Voltar</a>
@endsection