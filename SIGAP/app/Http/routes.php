<?php

use sigafi\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


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

Route::resource('credito/competo','CreditoCompletoController');

//Route::resource('credito/competo','CreditoCompletoController@create');


Route::resource('control/refinanciamiento','RefinanciamientoController');



//Reportes Estrategicos
Route::resource('control/clienteMoroso','ClienteMorosoController');
Route::resource('control/credito','ControlCreditoController');

Route::resource('cartera/clientes','CarteraClienteController');
Route::resource('clasificacion/clientes','ClasificacionClienteController');
