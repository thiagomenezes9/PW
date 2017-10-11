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
                        <h3 class="box-title">Endereços do Cliente {{$endereco->clientes->nome}}</h3>

                        <div align="right"><a href="{{route('clientes.show',$endereco->clientes->id)}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Endereco : {{$endereco->endereco}}</h2></strong></p><br>
                        <p><strong>Numero : </strong>{{$endereco->numero}}</p><br>
                        <p><strong>Bairro : </strong>{{$endereco->bairro}}</p><br>
                        <p><strong>Complemento : </strong>{{$endereco->complemento}}</p><br>
                        <p><strong>Ponto de Referencia : </strong>{{$endereco->ponto_ref}}</p><br>
                        <p><strong>CEP : </strong>{{$endereco->cep}}</p><br>

                        <p><strong>Pais : </strong>{{$endereco->cidades->estado->pais->nome}}</p>
                        <p><strong>Estado : </strong>{{$endereco->cidades->estado->nome}}</p>
                        <p><strong>Cidade : </strong>{{$endereco->cidades->nome}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection