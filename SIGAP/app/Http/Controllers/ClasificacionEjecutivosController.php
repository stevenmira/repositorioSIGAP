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



        $consulta = DB::select("select ca.idcartera as ids, ca.nombre as nome, ca.ejecutivo as eje,
            (SELECT count(*) FROM cliente, cartera WHERE cliente.idcartera = cartera.idcartera) as nom, count(*) mon
            FROM cliente c, cartera ca, negocio n, cuenta cu, detalle_liquidacion d
            WHERE c.idcartera = ca.idcartera AND n.idcliente = c.idcliente AND cu.idnegocio = n.idnegocio 
                AND d.idcuenta = cu.idcuenta AND d.estado = 'CANCELADO' 
            GROUP BY   ca.idcartera,ca.nombre, ca.ejecutivo;");

        return view('Tacticos.clasificacionEjecutivos.show',["consulta"=>$consulta,"ide"=>$ide,"carteras"=>$carteras,"fecha"=>$fecha,"fecha_actual"=>$fecha_actual,"usuarioactual"=>$usuarioactual]);
    }

}
