<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('altaLibro','LibrosController@create');
    Route::get('getImage/{id}','LibrosController@getImage');
    Route::get('verLibros','LibrosController@view');
    Route::get('getDataLibro/{id}','LibrosController@getData');
    Route::get('eliminarLibro/{id}','LibrosController@delete');
    Route::post('guardarLibro', 'LibrosController@store');
    Route::post('updateLibro','LibrosController@update');

    Route::get('altaEvento','EventoController@create');
    Route::get('verEventos','EventoController@view');
    Route::post('guardarEvento', 'EventoController@store');
    Route::get('getDataEvento/{id}','EventoController@getData');
    Route::get('eliminarEvento/{id}','EventoController@delete');
    Route::post('updateEvento','EventoController@update');

    Route::get('altaPromocion','PromocionController@create');
    Route::get('verPromocion','PromocionController@view');
    Route::post('guardarPromocion', 'PromocionController@store');
    Route::get('getDataPromocion/{id}','PromocionController@getData');
    Route::get('eliminarPromocion/{id}','PromocionController@delete');
    Route::post('updatePromocion','PromocionController@update');

    Route::get('altaCostoEnvio','CostoEnvioController@create');
    Route::get('verCostoEnvio','CostoEnvioController@view');
    Route::post('guardarCostoEnvio', 'CostoEnvioController@store');
    Route::get('getDataCostoEnvio/{id}','CostoEnvioController@getData');
    Route::get('eliminarCostoEnvio/{id}','CostoEnvioController@delete');
    Route::post('updateCostoEnvio','CostoEnvioController@update');

    Route::get('altaEscritor','EscritorController@create');
    Route::get('verEscritor','EscritorController@view');
    Route::post('guardarEscritor', 'EscritorController@store');
    Route::get('getDataEscritor/{id}','EscritorController@getData');
    Route::get('eliminarEscritor/{id}','EscritorController@delete');
    Route::post('updateEscritor','EscritorController@update');

    Route::get('altaTaller','TallerController@create');
    Route::get('verTaller','TallerController@view');
    Route::post('guardarTaller', 'TallerController@store');
    Route::get('getDataTaller/{id}','TallerController@getData');
    Route::get('eliminarTaller/{id}','TallerController@delete');
    Route::post('updateTaller','TallerController@update');

    Route::get('altaReto','RetoController@create');
    Route::get('verReto','RetoController@view');
    Route::post('guardarReto', 'RetoController@store');
    Route::get('getDataReto/{id}','RetoController@getData');
    Route::get('eliminarReto/{id}','RetoController@delete');
    Route::post('updateReto','RetoController@update');

    Route::get('verPedidos','PedidosController@ver');
    Route::get('verPedido/{id}','PedidosController@verDetalle');
    Route::post('enviarPedido','PedidosController@enviarPedido');
    Route::post('confirmarPago','PedidosController@confirmarPago');

    Route::get('viewBoletos','PedidosController@viewBoletos');
    Route::post('generarBoleto','PedidosController@generarBoletos');
});



