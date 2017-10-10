@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Endereço
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Endereços
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Endereços do Cliente {{$endereco->cliente->nome}}</h3>

                        <div align="right"><a href="{{route('clientes.show',$endereco->cliente->id)}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Endereco : {{$endereco->endereco}}</h2></strong></p><br>
                        <p><strong>Numero : {{$endereco->numero}}</strong></p><br>
                        <p><strong>Bairro : {{$endereco->bairro}}</strong></p><br>
                        <p><strong>Complemento : {{$endereco->complemento}}</strong></p><br>
                        <p><strong>Ponto de Referencia : {{$endereco->ponto_ref}}</strong></p><br>
                        <p><strong>CEP : {{$endereco->cep}}</strong></p><br>

                        <p>CIDADE</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection