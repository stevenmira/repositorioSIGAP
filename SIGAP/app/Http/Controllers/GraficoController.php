<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;

use Carbon\Carbon;

use DB;

class GraficoController extends Controller
{
    public function index(Request $request)
    {
        if($request)
    	{
            $usuarioactual=\Auth::user();

            //Obtenemos la fecha de hoy en español usando carbon y array
            $fecha_actual = Fecha::spanish();
            
    		$query = trim($request->get('searchText'));
            $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

            
    		return view('Estrategicos.graficoCartera.index',["carteras"=>$carteras,"fecha_actual"=>$fecha_actual, "searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}
    }

    public function store(Request $request)  
    {
        $usuarioactual=\Auth::user();

        $ini = $request->get('desde');
        $fin = $request->get('hasta');
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');
        
        $idcart = $request->get('car');

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcart)->first();

        $consulta = DB::select("select cuenta.montocapital, cuenta.mora as mora,
            (SELECT SUM(cuenta.mora) FROM cuenta WHERE cuenta.estado='INACTIVO') as mor,
            (SELECT SUM(cuenta.montocapital) FROM cuenta WHERE cuenta.estado='ACTIVO') as montocap,
            (SELECT SUM(detalle_liquidacion.cuotacapital) FROM detalle_liquidacion WHERE detalle_liquidacion.estado='CANCELADO') as capital,
            (SELECT SUM(detalle_liquidacion.totaldiario) FROM detalle_liquidacion WHERE detalle_liquidacion.estado='CANCELADO') as total,
            (SELECT SUM(detalle_liquidacion.interes) FROM detalle_liquidacion WHERE detalle_liquidacion.estado='CANCELADO') as interes
            FROM cliente, cartera, negocio, cuenta, detalle_liquidacion
            WHERE cliente.idcartera = cartera.idcartera AND negocio.idcliente = cliente.idcliente AND cuenta.idnegocio = negocio.idnegocio AND detalle_liquidacion.idcuenta = cuenta.idcuenta AND cuenta.idcuenta = ?
            GROUP BY cuenta.montocapital, cuenta.mora;",[$idcart]);

        return view('Estrategicos.graficoCartera.show',["carte"=>$cartera,"ini"=>$ini,"fin"=>$fin,"consulta"=>$consulta,"carteras"=>$carteras,"fecha_actual"=>$fecha_actual,"usuarioactual"=>$usuarioactual]);
    }

}
