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


Route::group(['middleware' => 'guest'], function () {
    Route::get('/','Auth\AuthController@getLogin');
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::get('register', 'Auth\AuthController@tregistro'); 
    Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

});

   

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::resource('usuario','UsuarioController');
   
});

Route::group(['middleware' => 'usuarioAdmin'], function () {
    
});


//VIstas para usuarios tipo EMPLEADO
Route::group(['middleware' => 'usuarioEstrategico'], function () { 

});

Route::group(['middleware' => 'usuarioTactico'], function () { 

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

Routte::resource('cartera/clientes','CarteraClienteController');