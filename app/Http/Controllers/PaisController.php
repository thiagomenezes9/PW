<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Pais::paginate(10);
        return view('Pais.index',compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisRequest $request)
    {


        $imagem = $_FILES[$request->bandeira];

        $pais = new Pais();

        $pais->bandeira = file_get_contents($imagem);
        $pais->nome = $request->nome;
        $pais->sigla = $request->sigla;

        Pais::create($pais);


//        Pais::create($request->all());

//        Session::flash('mensagem', 'Pais criado com sucesso!');

        return redirect('pais');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show(Pais $pais)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit(Pais $pais)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, Pais $pais)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



       $pais = Pais::findOrFail($id);

        $pais->delete();


      //  Session::flash('mensagem', 'Contato deletado com sucesso!');

        return redirect('pais');
    }
}
