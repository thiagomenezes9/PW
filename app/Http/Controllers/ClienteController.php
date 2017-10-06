<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Http\Requests\ClienteRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = cliente::paginate(10);
        return view('Cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {


//        ['nome','dtnasc','email','sexo','cpf','rg']
//
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->dtnasc = Carbon::createFromFormat('d/m/Y',$request->dtnasc);
        $cliente->email = $request->email;
        $cliente->sexo = $request->sexo;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;

        $cliente->save();



//        Session::flash('mensagem', 'Contato criado com sucesso!');

        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $endereco = $cliente->enderecos();




        return view('Cliente.show',compact('cliente','endereco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('Cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->nome = $request->nome;
        $cliente->dtnasc = Carbon::createFromFormat('d/m/Y',$request->dtnasc);
        $cliente->email = $request->email;
        $cliente->sexo = $request->sexo;
        $cliente->cpf = $request->cpf;
        $cliente->rg = $request->rg;

        $cliente->save();

//        Session::flash('mensagem', 'Contato atualizado com sucesso!');



        return redirect('clientes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();


        //  Session::flash('mensagem', 'Contato deletado com sucesso!');

        return redirect('clientes');
    }
}
