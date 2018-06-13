<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use sigafi\Cliente;
use sigafi\Http\Requests;
use sigafi\Fecha;

class CarteraClienteGeneralController extends Controller
{

    protected $connection = 'comments';
    public function index(Request $request)
    {
        if($request)
    	{
            $usuarioactual=\Auth::user();

            //Obtenemos la fecha de hoy en español usando carbon y array
            $fecha_actual = Fecha::spanish();
            
         $query = trim($request->get('searchText'));

            
    		return view('Estrategicos.carteraCliente.index',["fecha_actual"=>$fecha_actual, "searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}
    }

}
