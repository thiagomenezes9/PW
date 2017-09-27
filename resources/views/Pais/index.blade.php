@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Paises
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista dos Paises
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Paises</h3>
                        <div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td class="col-md-6"><strong>Nome</strong></td>
                                <td align="center"><strong>Ações</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($paises as $p)
                                <tr align="center">
                                    <td align="left">{{ $p->nome }}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="#" >
                                            <i class="fa fa-search-plus"></i>
                                            Detalhes
                                        </a>

                                        <a class="btn btn-small btn-warning" href="#" >
                                            <i class="fa fa-pencil-square-o"></i>
                                            Editar
                                        </a>

                                        <a class="btn btn-small btn-danger" data-toggle="modal" href="#myModal{{ $p->id }}" >
                                            <i class="fa fa-trash-o"></i>
                                            Excluir
                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $p->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$p->nome}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $p->id }}"
                                                              action="{{action('PaisController@destroy',$p->id)}}" method="POST">

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

                        <div class="text-center">
                            {!! $paises->links() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection