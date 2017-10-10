<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Http\Requests\Cliente;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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

        $end->clientes()->associate($cliente);

        $end->saveOrFail();


        return redirect()->route('clientes.show', $request->cliente_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endereco = Endereco::findOrFail($id);

        return view('Endereco.show',compact('endereco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Endereco::findOrFail($id);

        return view('Endereco.edit',compact('endereco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $end = Endereco::findOrFail($id);

        $end->endereco = $request->endereco;
        $end->cep = $request->cep;
        $end->bairro = $request->bairro;
        $end->complemento = $request->complemento;
        $end->numero = $request->numero;
        $end->ponto_ref = $request->ponto_ref;



        $end->cidade_id = 1;

//        $cliente = \App\Cliente::findOrFail($request->cliente_id);
//
//        $end->clientes()->associate($cliente);

        $end->saveOrFail();


        return redirect()->route('clientes.show', $request->cliente_id);
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

        $id = $end->clientes->id;

        $end->delete();



        return redirect()->route('clientes.show',$id);
    }
}
