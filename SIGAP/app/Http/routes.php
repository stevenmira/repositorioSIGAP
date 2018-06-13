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
    Route::resource('credito/competo','CreditoCompletoController');
    Route::resource('credito/competo','CreditoCompletoController@create');

});





Route::resource('control/refinanciamiento','RefinanciamientoController');



//Reportes Estrategicos
Route::resource('control/clienteMoroso','ClienteMorosoController');
Route::resource('control/credito','ControlCreditoController');

//Route::resource('cartera/clientes','CarteraClienteController');

Route::resource('cartera/clientes/general','CarteraClienteGeneralController');
Route::resource('clasificacion/clientes','ClasificacionClienteController');

//Reportes Gerenciales
Route::get('reporte1','Reporteria@reporte1');
Route::get('reporte2','Reporteria@reporte2');
Route::get('reporte3','Reporteria@reporte3');
Route::get('reporte4','Reporteria@reporte4');
Route::get('reporte5','Reporteria@reporte5');
Route::get('reporte6','Reporteria@reporte6');
Route::get('reporte7','Reporteria@reporte7');
Route::get('reporte8','Reporteria@reporte8');
Route::get('reporte9','Reporteria@reporte9');
Route::get('reporte10','Reporteria@reporte10');
Route::get('reporte11','Reporteria@reporte11');
