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
        $fecha_actual = Fecha::spanish();
        $idcart = $request->get('car');

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();



        $consulta = DB::select("select ca.idcartera as ids, ca.nombre as nome, ca.ejecutivo as eje,
            (SELECT count(*) FROM cliente, cartera WHERE cliente.idcartera = cartera.idcartera) as nom, count(*) mon
            FROM cliente c, cartera ca, negocio n, cuenta cu, detalle_liquidacion d
            WHERE c.idcartera = ca.idcartera AND n.idcliente = c.idcliente AND cu.idnegocio = n.idnegocio 
                AND d.idcuenta = cu.idcuenta AND d.estado = 'CANCELADO' 
            GROUP BY   ca.idcartera,ca.nombre, ca.ejecutivo;");

        return view('Estrategicos.graficoCartera.show',["consulta"=>$consulta,"carteras"=>$carteras,"fecha_actual"=>$fecha_actual,"usuarioactual"=>$usuarioactual]);
    }

}
