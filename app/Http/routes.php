<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', ["uses" => 'HomeController@index', 'as' => 'index']);

Route::resource('usuarios', 'UsuarioController');
Route::resource('comidas', 'ComidaController');
Route::resource('componentes', 'ComponentesController');
Route::resource('marcas', 'MarcasController');
Route::resource('pedidos','PedidoController');
Route::get('/colapedidos',
    ["uses" => 'PedidoController@colaPedidos', 
    'as' => 'pedidos.cola']);
Route::get('/preparapedido/{idPedido}',
    ["uses" => 'PedidoController@prepararPedido', 
    'as' => 'pedidos.preparar']);

//Rutas de la api
Route::post('/api/pedidos/nuevoPedido',
['uses' => 'PedidoApiController@createPedido',
'as' => 'api.pedidos.createpedido']);

Route::get('/api/pedidos/{idUsuario}',
    ['uses' => 'PedidoApiController@getPedidosUsuario',
    'as' => 'api.pedidos.getpedidosusuario']);

Route::get('/api/componentes',
    ["uses" => 'PedidoApiController@getListaComponentes', 
    'as' => 'api.pedidos.getlistacomponentes']);

Route::get('/api/componentes/{idComponente}',
    ['uses' => 'PedidoApiController@getComponenteDetallado',
    'as' => 'api.pedidos.getcomponentedetallado']);

Route::get('/api/marca/{idMarca}',
    ['uses' => 'PedidoApiController@getMarca',
    'as' => 'api.pedidos.getmarca']);

//login

Route::post('/api/login',
    ['uses' => 'LoginApiController@login',
    'as' => 'api.login']);
