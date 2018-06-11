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

Route::get('/', function () {
    return view('layouts/inicio');
});

//Reportes Tacticos
Route::resource('control/refinanciamiento','RefinanciamientoController');
Route::resource('credito/competo','CreditoCompletoController');
Route::resource('cartera/cliente','CarteraClienteController');



//Reportes Estrategicos
Route::resource('control/clienteMoroso','ClienteMorosoController');
Route::resource('control/credito','ControlCreditoController');
Route::resource('cartera/cliente/extendido','CarteraClienteExtendidoController');

