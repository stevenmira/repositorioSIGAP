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
    Route::resource('cartera/cliente/extendido','CarteraClienteExtendidoController');
    Route::resource('cartera/clientes/general','CarteraClienteGeneralController');
    
});

Route::group(['middleware' => 'usuarioTactico'], function () { 
    Route::resource('credito/competo','CreditoCompletoController');
    Route::resource('cartera/cliente/normal','CarteraClienteController');
    Route::resource('clasificacion/clientes','ClasificacionClienteController');

});




Route::resource('control/refinanciamiento','RefinanciamientoController');
Route::get('refinanciamientoPDF/{f1}/{f2}', ['as' => 'fechas', 'uses' => 'RefinanciamientoController@refinanciamientoPDF']);

Route::get('home','ETLController@ETL');

//Reportes Estrategicos
Route::resource('control/clienteMoroso','ClienteMorosoController');
Route::get('clienteMorosoPDF/{f1}/{f2}', ['as' => 'fechas', 'uses' => 'ClienteMorosoController@clienteMorosoPDF']);
Route::resource('control/credito','ControlCreditoController');
Route::get('controlCreditoPDF/{f1}/{f2}', ['as' => 'fechas', 'uses' => 'ControlCreditoController@controlCreditoPDF']);



Route::resource('clasificacion/clientes','ClasificacionClienteController');

//Reportes Gerenciales
Route::get('reporte1','Reporteria@reporte1');
Route::get('reporte2','Reporteria@reporte2');

Route::get('carteraClienteExtendidoPDF/{f1}/{f2}', ['as' => 'fechas', 'uses' => 'CarteraClienteExtendidoController@carterasClientesExtendidoPDF']);

Route::get('reporte4','Reporteria@reporte4');
Route::get('reporte5','Reporteria@reporte5');

Route::get('carteraClienteNormalPDF/{p1}/{p2}', ['as' => 'parametros', 'uses' => 'CarteraClienteController@carteraClientePDF']);

Route::get('creditosCompletosPDF/{f1}/{f2}', ['as' => 'fechas', 'uses' => 'CreditoCompletoController@creditoCompletoPDF']);
Route::get('carteraGeneralClientePDF/{p1}/{p2}/{P3}', ['as' => 'parametros', 'uses' => 'CarteraClienteGeneralController@carteraClienteGenPDF']);
Route::get('clasificacionClientePDF/{p1}/{p2}', ['as' => 'parametros', 'uses' => 'ClasificacionClienteController@clasificacionClientePDF']);

Route::get('reporte8','Reporteria@reporte8');
Route::get('reporte9/{p1}','Reporteria@reporte9');
Route::get('reporte10/{p1}','Reporteria@reporte10');
Route::get('reporte11','Reporteria@reporte11');

//Reporte 5 Grafico
Route::resource('grafico-mensual','GraficoController');

//Reporte 9 Contratos Vencidos
Route::resource('contrato/vencidos','ContratoVencidoController');

//Reporte 11 Clasificacion de Ejecutivos
Route::resource('ejecutivo','ClasificacionEjecutivosController');