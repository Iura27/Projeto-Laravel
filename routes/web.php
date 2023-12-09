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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function() {
    Route::group(['prefix'=>'produtos', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any ('',             ['as' => 'produtos',          'uses' => 'ProdutosController@index'  ]);
        Route::get ('create',       ['as' => 'produtos.create',   'uses' => 'ProdutosController@create' ]);
        Route::post('store',        ['as' => 'produtos.store',    'uses' => 'ProdutosController@store'  ]);
        Route::get ('destroy', ['as' => 'produtos.destroy',  'uses' => 'ProdutosController@destroy']);
        Route::get ('edit',    ['as' => 'produtos.edit',     'uses' => 'ProdutosController@edit'   ]);
        Route::put ('{id}/update',  ['as' => 'produtos.update',   'uses' => 'ProdutosController@update' ]);
});


    Route::group(['prefix'=>'tipo_tintas', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any ('',             ['as' => 'tipo_tintas',          'uses' => 'TipoTintasController@index'  ]);
        Route::get ('create',       ['as' => 'tipo_tintas.create',   'uses' => 'TipoTintasController@create' ]);
        Route::post('store',        ['as' => 'tipo_tintas.store',    'uses' => 'TipoTintasController@store'  ]);
        Route::get ('destroy', ['as' => 'tipo_tintas.destroy',  'uses' => 'TipoTintasController@destroy']);
        Route::get ('edit',    ['as' => 'tipo_tintas.edit',     'uses' => 'TipoTintasController@edit'   ]);
        Route::put ('{id}/update',  ['as' => 'tipo_tintas.update',   'uses' => 'TipoTintasController@update' ]);
});


    Route::group(['prefix'=>'clientes', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any ('',             ['as' => 'clientes',          'uses' => 'ClientesController@index'  ]);
        Route::get ('create',       ['as' => 'clientes.create',   'uses' => 'ClientesController@create' ]);
        Route::post('store',        ['as' => 'clientes.store',    'uses' => 'ClientesController@store'  ]);
        Route::get ('destroy',      ['as' => 'clientes.destroy',  'uses' => 'ClientesController@destroy']);
        Route::get ('edit',         ['as' => 'clientes.edit',     'uses' => 'ClientesController@edit'   ]);
        Route::put ('{id}/update',  ['as' => 'clientes.update',   'uses' => 'ClientesController@update' ]);
});

    Route::group(['prefix'=>'vendas', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any ('',             ['as' => 'vendas',          'uses' => 'VendasController@index'  ]);
        Route::get ('create',       ['as' => 'vendas.create',   'uses' => 'VendasController@create' ]);
        Route::post('store',        ['as' => 'vendas.store',    'uses' => 'VendasController@store'  ]);
        Route::get ('destroy',      ['as' => 'vendas.destroy',  'uses' => 'VendasController@destroy']);
        Route::get ('edit',          ['as' => 'vendas.edit',     'uses' => 'VendasController@edit'   ]);
        Route::put ('{id}/update',  ['as' => 'vendas.update',   'uses' => 'VendasController@update' ]);
});


    Route::group(['prefix'=>'funcionarios', 'where'=>['id'=>'[0-9]+']], function () {
        Route::any ('',             ['as' => 'funcionarios',          'uses' => 'FuncionariosController@index'  ]);
        Route::get ('create',       ['as' => 'funcionarios.create',   'uses' => 'FuncionariosController@create' ]);
        Route::post('store',        ['as' => 'funcionarios.store',    'uses' => 'FuncionariosController@store'  ]);
        Route::get ('destroy',      ['as' => 'funcionarios.destroy',  'uses' => 'FuncionariosController@destroy']);
        Route::get ('edit',          ['as' => 'funcionarios.edit',     'uses' => 'FuncionariosController@edit'   ]);
        Route::put ('{id}/update',  ['as' => 'funcionarios.update',   'uses' => 'FuncionariosController@update' ]);
        Route::get('search', ['as' => 'funcionarios.search', 'uses' => 'FuncionariosController@search']);

});

}) ;
