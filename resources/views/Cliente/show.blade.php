@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cliente
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Cliente
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes do Cliente</h3>

                        <div align="right"><a href="{{route('clientes.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Nome : {{$cliente->nome}}</h2></strong></p><br>
                        <p><strong>Data nascimento : </strong> {{$cliente->dtnasc->format('d/m/Y')}}</p><br>
                        <p><strong>Email : </strong> {{$cliente->email}}</p><br>
                        <p><strong>Sexo : </strong> {{$cliente->sexo}}</p><br>
                        <p><strong>CPF : </strong> {{$cliente->cpf}}</p><br>
                        <p><strong>RG : </strong> {{$cliente->rg}}</p><br>

                        <div align="right"><a href="{{route('EnderecoCriar',compact('cliente'))}}" class="btn btn-success">Cadastrar Endereço</a></div>
                        <p><strong>ENDEREÇOS</strong></p>


                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td class="col-md-5"><strong>Endereco</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($endereco as $e)
                                <tr align="center">
                                    <td align="left">{{ $e->endereco }}</td>

                                    <td>
                                        <a class="btn btn-small btn-info" href="#" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="#" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>

                                        <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal{{ $e->id }}" >
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $e->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$e->endereco}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $e->id }}"
                                                              action="{{action('EnderecoController@destroy',$e->id)}}" method="POST">

                                                            {{ csrf_field() }}
                                                            {{--{{ method_field('DELETE') }}--}}

                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>





                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection