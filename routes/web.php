<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

    Route::get('endereco/create/{id}','EnderecoController@criar')->name('EnderecoCriar');
    Route::post('endereco/atualiza/{id}','EnderecoController@atualiza')->name('EnderecoAtualiza');
//    Route::post('endereco/create/{$id}','EnderecoController@criar')->name('EnderecoCriar');


    Route::get('listEstados/{id}', 'AjaxController@listEstados');
    Route::get('listCidades/{id}', 'AjaxController@listCidades');


    Route::resource('pais','PaisController');
    Route::resource('estados','EstadoController');
    Route::resource('cidades','CidadeController');
    Route::resource('clientes','ClienteController');
    //Route::resource('enderecos','EnderecoController', ['except' => ['create', 'index']]);
    Route::resource('enderecos','EnderecoController');


});
