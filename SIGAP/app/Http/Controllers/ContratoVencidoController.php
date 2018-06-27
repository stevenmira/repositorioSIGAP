<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;

use Carbon\Carbon;

use DB;

class ContratoVencidoController extends Controller
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
            
    		return view('Tacticos.contratoVencido.index',["carteras"=>$carteras,"fecha_actual"=>$fecha_actual, "searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}
    }

    public function store(Request $request)  
    {
        $usuarioactual=\Auth::user();

        $idcartera = $request->get('idcartera');
        $fecha_actual = Fecha::spanish();

        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();
        $esta = "INACTIVO";

        $consulta = DB::select("select cu.idcuenta as idCu, ca.idcartera as idCa, ca.nombre as nomCar, c.nombre nomCli, c.apellido ape, 
            cu.montocapital monto, p.monto debe, n.nombre negoNo, p.fechaultimapago fecha, cu.estado cuenEst, 
            (SELECT d.monto FROM detalle_liquidacion d 
            WHERE d.idcuenta=cu.idcuenta order by monto asc limit 1 offset 0) as deuda
            FROM cliente c, cartera ca, negocio n, cuenta cu, prestamo p
            WHERE c.idcartera = ca.idcartera AND n.idcliente = c.idcliente AND
            cu.idnegocio = n.idnegocio AND p.idprestamo = cu.idprestamo AND ca.idcartera = ? AND cu.estado = ?;",[$cartera->idcartera,$esta]);


        return view('Tacticos.contratoVencido.show',["carteras"=>$carteras,"consulta"=>$consulta,"fecha_actual"=>$fecha_actual,"cartera"=>$cartera,"usuarioactual"=>$usuarioactual]);
    }
}
