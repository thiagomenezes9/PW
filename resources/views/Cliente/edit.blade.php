@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Clientes
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Edição de Cliente
@stop


@section('main-content')


    @if($errors->any())
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa errada</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Clientes</h3>
                        <div align="right"><a href="{{route('clientes.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('clientes.update',$cliente->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{$cliente->nome}}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do cliente" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="dataNasc" class="col-sm-2 control-label" >Data Nascimento</label>
                                <div class="col-sm-10">
                                    <input placeholder="00/00/0000" name="dataNasc" value="{{ $cliente->dtnasc->format('d/m/Y') }}" type="text" class="form-control input-lg"
                                           id="dataNasc">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >Email</label>
                                <div class="col-sm-10">
                                    <input name="email" value="{{ $cliente->email }}" type="email" class="form-control input-lg"
                                           id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-10">
                                    <select name="sexo" id="sexo" class="form-control">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>


                                    </select>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >CPF</label>
                                <div class="col-sm-10">
                                    <input name="cpf" value="{{ $cliente->cpf }}" type="text" class="form-control input-lg"
                                           id="cpf" placeholder="CPF" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >RG</label>
                                <div class="col-sm-10">
                                    <input name="RG" value="{{ $cliente->rg }}" type="text" class="form-control input-lg"
                                           id="RG" placeholder="RG" autofocus>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Save</button>

                            </div>



                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection