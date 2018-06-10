<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;

class CreditoCompletoController extends Controller
{
    public function index(Request $request)
    {

    	if($request)
    	{
            #$usuarioactual=\Auth::user();

            //Obtenemos la fecha de hoy en español usando carbon y array
            $fecha_actual = Fecha::spanish();
            
    		$query = trim($request->get('searchText'));

            
    		return view('Tacticos.carteraCompleta.index',["fecha_actual"=>$fecha_actual, "searchText"=>$query]);
    	}

    }
}
