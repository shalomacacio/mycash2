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

Route::group(['prefix'=>'mycash', 'middleware'=>'auth'], function(){

Route::get('/welcome', function () {return view('welcome');});

Route::group(['prefix'=>'marca'],function(){
		Route::get('/',['as'=>'marca', 'uses'=>'MarcaController@index']);
		Route::get('/create',['as'=>'marca.create', 'uses'=>'MarcaController@create']);
		Route::post('/store',['as'=>'marca.store', 'uses'=>'MarcaController@store']);
		Route::get('{id}/destroy',['as'=>'marca.destroy', 'uses'=>'MarcaController@destroy']);
		Route::get('{id}/edit',['as'=>'marca.edit', 'uses'=>'MarcaController@edit']);
		Route::put('{id}/update',['as'=>'marca.update', 'uses'=>'MarcaController@update']);
		Route::get('{id}/show',['as'=>'marca.show', 'uses'=>'MarcaController@show']);
	});

Route::group(['prefix'=>'categoria'],function(){
		Route::get('/',['as'=>'categoria', 'uses'=>'CategoriaController@index']);
		Route::get('/create',['as'=>'categoria.create', 'uses'=>'CategoriaController@create']);
		Route::post('/store',['as'=>'categoria.store', 'uses'=>'CategoriaController@store']);
		Route::get('{id}/destroy',['as'=>'categoria.destroy', 'uses'=>'CategoriaController@destroy']);
		Route::get('{id}/edit',['as'=>'categoria.edit', 'uses'=>'CategoriaController@edit']);
		Route::put('{id}/update',['as'=>'categoria.update', 'uses'=>'CategoriaController@update']);
		Route::get('{id}/show',['as'=>'categoria.show', 'uses'=>'CategoriaController@show']);
	});

Route::group(['prefix'=>'fornecedor'],function(){
		Route::get('/',['as'=>'fornecedor', 'uses'=>'FornecedorController@index']);
		Route::get('/create',['as'=>'fornecedor.create', 'uses'=>'FornecedorController@create']);
		Route::post('/store',['as'=>'fornecedor.store', 'uses'=>'FornecedorController@store']);
		Route::get('{id}/destroy',['as'=>'fornecedor.destroy', 'uses'=>'FornecedorController@destroy']);
		Route::get('{id}/edit',['as'=>'fornecedor.edit', 'uses'=>'FornecedorController@edit']);
		Route::put('{id}/update',['as'=>'fornecedor.update', 'uses'=>'FornecedorController@update']);
		Route::get('{id}/show',['as'=>'fornecedor.show', 'uses'=>'FornecedorController@show']);
	});

Route::group(['prefix'=>'cliente'],function(){
		Route::get('/',['as'=>'cliente', 'uses'=>'ClienteController@index']);
		Route::get('/create',['as'=>'cliente.create', 'uses'=>'ClienteController@create']);
		Route::post('/store',['as'=>'cliente.store', 'uses'=>'ClienteController@store']);
		Route::get('{id}/destroy',['as'=>'cliente.destroy', 'uses'=>'ClienteController@destroy']);
		Route::get('{id}/edit',['as'=>'cliente.edit', 'uses'=>'ClienteController@edit']);
		Route::put('{id}/update',['as'=>'cliente.update', 'uses'=>'ClienteController@update']);
		Route::get('{id}/show',['as'=>'cliente.show', 'uses'=>'ClienteController@show']);
	});

Route::group(['prefix'=>'produto'],function(){
		Route::get('/',['as'=>'produto', 'uses'=>'ProdutoController@index']);
		Route::get('/create',['as'=>'produto.create', 'uses'=>'ProdutoController@create']);
		Route::post('/store',['as'=>'produto.store', 'uses'=>'ProdutoController@store']);
		Route::get('{id}/destroy',['as'=>'produto.destroy', 'uses'=>'ProdutoController@destroy']);
		Route::get('{id}/edit',['as'=>'produto.edit', 'uses'=>'ProdutoController@edit']);
		Route::put('{id}/update',['as'=>'produto.update', 'uses'=>'ProdutoController@update']);
		Route::get('{id}/show',['as'=>'produto.show', 'uses'=>'ProdutoController@show']);

		Route::get('{id}/estoque',['as'=>'produto.estoque', 'uses'=>'ProdutoController@estoque']);
		Route::put('{id}/updateEstoque',['as'=>'produto.updateEstoque', 'uses'=>'ProdutoController@updateEstoque']);
		Route::get('/search/{id}' , ['as'=>'produto.search', 'uses' => 'ProdutoController@search']);
	});

Route::group(['prefix'=>'venda'],function(){
		Route::get('/',['as'=>'venda', 'uses'=>'VendaController@index']);
		Route::get('/create',['as'=>'venda.create', 'uses'=>'VendaController@create']);
		Route::post('/store',['as'=>'venda.store', 'uses'=>'VendaController@store']);
		Route::get('{id}/destroy',['as'=>'venda.destroy', 'uses'=>'VendaController@destroy']);
		Route::get('{id}/edit',['as'=>'venda.edit', 'uses'=>'VendaController@edit']);
		Route::put('{id}/update',['as'=>'venda.update', 'uses'=>'VendaController@update']);
		Route::get('{id}/show',['as'=>'venda.show', 'uses'=>'VendaController@show']);

		Route::get('/pdv',['as'=>'venda.pdv', 'uses'=>'VendaController@pdv']);
		Route::get('/pdv/search/{codOrName}' , ['as'=>'venda.search', 'uses' => 'VendaController@search']);
		Route::post('/pdv/addItem' , ['as'=>'venda.addItem', 'uses' => 'VendaController@addItem']);
		Route::get('/pdv/{id}/removeItem' , ['as'=>'venda.removeItem', 'uses' => 'VendaController@removeItem']);
		Route::post('/pdv/selectItem' , ['as'=>'venda.selectItem', 'uses' => 'VendaController@selectItem']);

	});

Route::group(['prefix'=>'compra'],function(){
		Route::get('/',['as'=>'compra', 'uses'=>'CompraController@index']);
		Route::get('/create',['as'=>'compra.create', 'uses'=>'CompraController@create']);
		Route::post('/store',['as'=>'compra.store', 'uses'=>'CompraController@store']);
		Route::get('{id}/destroy',['as'=>'compra.destroy', 'uses'=>'CompraController@destroy']);
		Route::get('{id}/edit',['as'=>'compra.edit', 'uses'=>'CompraController@edit']);
		Route::put('{id}/update',['as'=>'compra.update', 'uses'=>'CompraController@update']);
		Route::get('{id}/show',['as'=>'compra.show', 'uses'=>'CompraController@show']);
	});
});

Auth::routes();
Route::get('/', function () {return view('auth.login');});
Route::get('home', 'HomeController@index')->name('home');

