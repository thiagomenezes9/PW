@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Endereço
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Editar Endereço
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
                        <h3 class="box-title">Editar Endereço do {{$endereco->clientes->nome}}</h3>
                        <div align="right"><a href="{{route('clientes.show',$endereco->clientes->id)}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{route('EnderecoAtualiza',$endereco->id)}}" method="post" enctype="multipart/form-data">



                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>


                            <input type="hidden" name="cliente_id" value="{{$endereco->clientes->id}}"/>




                            <div class="form-group">
                                <label for="endereco" class="col-sm-2 control-label" >Endereco</label>
                                <div class="col-sm-10">
                                    <input name="endereco" value="{{ $endereco->endereco }}" type="text" class="form-control input-lg"
                                           id="endereco" placeholder="Endereco do cliente" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="numero" class="col-sm-2 control-label" >Numero</label>
                                <div class="col-sm-10">
                                    <input name="numero" value="{{ $endereco->numero }}" type="text" class="form-control input-lg"
                                           id="numero" placeholder="numero" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="bairro" class="col-sm-2 control-label" >Bairro</label>
                                <div class="col-sm-10">
                                    <input name="bairro" value="{{ $endereco->bairro }}" type="text" class="form-control input-lg"
                                           id="bairro" placeholder="Bairro do cliente" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="complemento" class="col-sm-2 control-label" >Complemento</label>
                                <div class="col-sm-10">
                                    <input name="complemento" value="{{ $endereco->complemento }}" type="text" class="form-control input-lg"
                                           id="complemento" placeholder="complemento" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="rg" class="col-sm-2 control-label" >Ponto de referencia</label>
                                <div class="col-sm-10">
                                    <input name="ponto_ref" value="{{ $endereco->ponto_ref }}" type="text" class="form-control input-lg"
                                           id="ponto_ref" placeholder="ponto_ref" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="cep" class="col-sm-2 control-label" >CEP</label>
                                <div class="col-sm-10">
                                    <input name="cep" value="{{ $endereco->cep }}" type="text" class="form-control input-lg"
                                           id="cep" placeholder="cep do cliente" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label" >Pais : </label>
                                <div class="col-sm-10">
                                    <select name="pais" id="pais" class="form-control">
                                        <option id="paisOp" value="0">Pais atual: {{$endereco->cidades->estado->pais->nome}}</option>
                                        @foreach($pais as $p)
                                            {{--<option value="{{$p->id}}" {{ $p->id === (isset($endereco->cidades->estado->pais->pais_id) ? $endereco->cidades->estado->pais->pais_id : '' ) ? 'selected' : '' }}>{{$p->nome}}</option>--}}
                                            <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="estados" class="col-sm-2 control-label" >Estados : </label>
                                <div class="col-sm-10">
                                    <select name="estados" id="estados" class="form-control" disabled>
                                        <option id="estadoOp" value="0">Estado atual: {{$endereco->cidades->estado->nome}}</option>
                                        {{--@foreach($estados as $e)--}}
                                            {{--<option value="{{$e->id}}" {{ $e->id === (isset($endereco->cidades->estado->estado_id) ? $endereco->cidades->estado->estado_id : '' ) ? 'selected' : '' }}>{{$e->nome}}</option>--}}
                                        {{--@endforeach--}}

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidades" class="col-sm-2 control-label" >Cidades : </label>
                                <div class="col-sm-10">
                                    <select name="cidades" id="cidades" class="form-control" disabled>
                                        <option id="CidadeOp" value="0">Cidade atual: {{$endereco->cidades->nome}}</option>

                                        {{--@foreach($cidades as $c)--}}
                                            {{--<option value="{{$c->id}}" {{ $c->id === (isset($endereco->cidades->cidade_id) ? $endereco->cidades->cidade_id : '' ) ? 'selected' : '' }}>{{$c->nome}}</option>--}}
                                        {{--@endforeach--}}

                                    </select>
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



@section('scriptlocal')
    <script type="text/javascript">



        $(document).ready(function () {
            $('#pais').click(function () {
                $.ajax({
                    url:'../../listEstados/'+$('#pais').val(),
                    type:'GET',
                    dataType:'json',
                    success: function (json) {
                        $('#estados').find('option').remove();
                        $('#estados').removeAttr('disabled');
                        $('#pais').find('#paisOp').remove();
                        $('#estados').find('#estadoOp').remove();
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#estados').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })

            $('#estados').click(function () {
                $.ajax({
                    url:'../../listCidades/'+$('#estados').val(),
                    type:'GET',
                    dataType:'json',
                    success: function (json) {
                        $('#cidades').find('option').remove();
                        $('#cidades').removeAttr('disabled');
                        $('#cidades').find('#cidadeOp').remove();
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#cidades').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })
        })


        $("form").submit(function(){
            $('#estados').removeAttr('disabled');
            $('#cidades').removeAttr('disabled');
        });


    </script>
@endsection