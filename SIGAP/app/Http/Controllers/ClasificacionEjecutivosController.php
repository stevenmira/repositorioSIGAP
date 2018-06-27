<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;

use Carbon\Carbon;

use DB;

class ClasificacionEjecutivosController extends Controller
{
    public function index(Request $request)
    {
        if($request)
    	{
            $usuarioactual=\Auth::user();

            //Obtenemos la fecha de hoy en español usando carbon y array
            $fecha_actual = Fecha::spanish();
            
    		$query = trim($request->get('searchText'));

            
    		return view('Tacticos.ClasificacionEjecutivos.index',["fecha_actual"=>$fecha_actual, "searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}
    }

    public function store(Request $request)  
    {
        $usuarioactual=\Auth::user();

        $idcartera = $request->get('idcartera');
        $fecha = $request->get('fecha');
        $fecha_actual = Fecha::spanish();
        $ide = $request->get('ida');

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

        return view('Tacticos.ClasificacionEjecutivos.show',["ide"=>$ide,"carteras"=>$carteras,"fecha"=>$fecha,"fecha_actual"=>$fecha_actual,"usuarioactual"=>$usuarioactual]);
    }

}
