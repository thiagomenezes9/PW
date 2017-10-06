<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Http\Requests\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Client;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $cliente = Cliente::find($id);

        return view('Endereco.create',compact('cliente'));
    }


    public function criar($id){

        $cliente = \App\Cliente::findOrFail($id);

        return view('Endereco.create',compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        ['cliente_id','endereco','cidade_id','cep','bairro','complemento','numero','ponto_ref']
        $end = new Endereco();

        $end->endereco = $request->endereco;
        $end->cep = $request->cep;
        $end->bairro = $request->bairro;
        $end->complemento = $request->complemento;
        $end->numero = $request->numero;
        $end->ponto_ref = $request->ponto_ref;



        $end->cidade_id = 1;

        $cliente = \App\Cliente::findOrFail($request->cliente_id);

        $end->clietes()->associate($cliente);

        //$end->saveOrFail();


       // $endereco = $cliente->enderecos();


//        return route('clientes.show',compact('cliente','endereco'));
        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $end = Endereco::findOrFail($id);

        $cliente = $end->clientes();

        $end->delete();


        //  Session::flash('mensagem', 'Contato deletado com sucesso!');

        $endereco = $cliente->enderecos();


        return route('clientes.show',compact('cliente','endereco'));
    }
}
