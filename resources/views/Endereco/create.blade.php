@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Endereço
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Novo Endereço
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
                        <h3 class="box-title">Novo Endereço do {{$cliente->nome}}</h3>
                        <div align="right"><a href="{{route('clientes.show',$cliente->id)}}" class="btn btn-info">Voltar</a></div>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('EnderecoController@store')}}" method="post" enctype="multipart/form-data">



                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>


                            <input type="hidden" name="cliente_id" value="{{$cliente->id}}"/>




                            <div class="form-group">
                                <label for="endereco" class="col-sm-2 control-label" >Endereco</label>
                                <div class="col-sm-10">
                                    <input name="endereco" value="{{ old('endereco') }}" type="text" class="form-control input-lg"
                                           id="endereco" placeholder="Endereco do cliente" autofocus>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="numero" class="col-sm-2 control-label" >Numero</label>
                                <div class="col-sm-10">
                                    <input name="numero" value="{{ old('numero') }}" type="text" class="form-control input-lg"
                                           id="numero" placeholder="numero" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="bairro" class="col-sm-2 control-label" >Bairro</label>
                                <div class="col-sm-10">
                                    <input name="bairro" value="{{ old('bairro') }}" type="text" class="form-control input-lg"
                                           id="bairro" placeholder="Bairro do cliente" autofocus>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="complemento" class="col-sm-2 control-label" >Complemento</label>
                                <div class="col-sm-10">
                                    <input name="complemento" value="{{ old('complemento') }}" type="text" class="form-control input-lg"
                                           id="complemento" placeholder="complemento" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="rg" class="col-sm-2 control-label" >Ponto de referencia</label>
                                <div class="col-sm-10">
                                    <input name="ponto_ref" value="{{ old('ponto_ref') }}" type="text" class="form-control input-lg"
                                           id="ponto_ref" placeholder="ponto_ref" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="cep" class="col-sm-2 control-label" >CEP</label>
                                <div class="col-sm-10">
                                    <input name="cep" value="{{ old('cep') }}" type="text" class="form-control input-lg"
                                           id="cep" placeholder="cep do cliente" autofocus>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="pais" class="col-sm-2 control-label" >Pais : </label>
                                <div class="col-sm-10">
                                    <select name="pais" id="pais" class="form-control">
                                        <option id="paisOp">Selecione o pais</option>
                                        @foreach($pais as $p)
                                            <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="estados" class="col-sm-2 control-label" >Estados : </label>
                                <div class="col-sm-10">
                                    <select name="estados" id="estados" class="form-control">

                                            <option>Selecione o pais</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidades" class="col-sm-2 control-label" >Cidades : </label>
                                <div class="col-sm-10">
                                    <select name="cidades" id="cidades" class="form-control">

                                            <option >Selecione o Estado</option>

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
                        $('#pais').find('#paisOp').remove();
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
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#cidades').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })
        })
    </script>
@endsection