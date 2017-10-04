@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Clientes
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Novo Cliente
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
                        <h3 class="box-title">Novo Cliente</h3>
                        <div align="right"><a href="{{route('clientes.index')}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('ClienteController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- ['nome','dtnasc','email','sexo','cpf','rg'] -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Nome</label>
                                <div class="col-sm-10">
                                    <input name="nome" value="{{ old('nome') }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do cliente" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="dataNasc" class="col-sm-2 control-label" >Data Nascimento</label>
                                <div class="col-sm-10">
                                    <input placeholder="00/00/0000" name="dataNasc" value="{{ old('dataNasc') }}" type="text" class="form-control input-lg"
                                           id="dataNasc">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label" >Email</label>
                                <div class="col-sm-10">
                                    <input name="email" value="{{ old('email') }}" type="email" class="form-control input-lg"
                                           id="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >Sexo</label>
                                <div class="col-sm-10">
                                    <input name="sexo" value="{{ old('sexo') }}" type="text" class="form-control input-lg"
                                           id="soxe" placeholder="Informe o Sexo" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >CPF</label>
                                <div class="col-sm-10">
                                    <input name="cpf" value="{{ old('cpf') }}" type="text" class="form-control input-lg"
                                           id="cpf" placeholder="CPF" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nome" class="col-sm-2 control-label" >RG</label>
                                <div class="col-sm-10">
                                    <input name="RG" value="{{ old('RG') }}" type="text" class="form-control input-lg"
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