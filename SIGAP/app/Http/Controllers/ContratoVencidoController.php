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
        $fecha = $request->get('fecha');
        $fecha_actual = Fecha::spanish();

        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();

        $consulta = DB::table('cartera as cartera')
            ->select('cuenta.idcuenta','cartera.idcartera','cartera.nombre as nombreCartera','cliente.nombre' , 'cliente.apellido','cuenta.montocapital','prestamo.monto','negocio.nombre as nombreNegocio' , 'prestamo.fechaultimapago','comprobante.totalpendiente')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
            ->join('comprobante as comprobante','cuenta.idcuenta','=','comprobante.idcuenta')
            ->where('cartera.idcartera', '=', $idcartera)
            ->get();

        return view('Tacticos.contratoVencido.show',["consulta"=>$consulta,"fecha"=>$fecha,"fecha_actual"=>$fecha_actual,"cartera"=>$cartera,"usuarioactual"=>$usuarioactual]);
    }
}
