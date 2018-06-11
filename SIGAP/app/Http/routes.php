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

//Reportes tácticos
#Route::get('credito/competo/review/{f1}/{f2}', ['as' => 'fechas', 'uses' => 'CreditoCompletoController@edit']);
#Route::resource('credito/competo','CreditoCompletoController');
Route::resource('credito/competo','CreditoCompletoController');

#Route::resource('credito/competo','CreditoCompletoController@create');


Route::resource('control/refinanciamiento','RefinanciamientoController');



//Reportes Estrategicos
Route::resource('control/clienteMoroso','ClienteMorosoController');
Route::resource('control/credito','ControlCreditoController');

