<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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


        $arquivo = Input::file('bandeira');
        $form = $request->all();
        $form['bandeira'] = (string) Image::make($arquivo)->encode('data-url');


        Pais::create($form);


        return redirect('pais');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $pais = Pais::findOrFail($id);

        return view('Pais.show',compact('pais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Pais::findOrFail($id);

        return view('Pais.edit',compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pais  $pais
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, $id)
    {
        $pais = Pais::findOrFail($id);

        $pais->nome = $request->nome;
        $pais->sigla = $request->sigla;

        if(isset($request->bandeira)){
            $arquivo = Input::file('bandeira');
            $pais['bandeira'] = (string) Image::make($arquivo)->encode('data-url');
        }


        $pais->save();


        return redirect('pais');

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
