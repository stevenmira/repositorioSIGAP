<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use sigafi\Http\Requests;
use sigafi\Fecha;

class ClasificacionClienteController extends Controller
{
    public function create()
    {
        $usuarioactual=\Auth::user();
            
        $fecha_actual = Fecha::spanish();

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

        return view('Tacticos.clasificacionClientes.create',["fecha_actual"=>$fecha_actual, "carteras"=>$carteras, "usuarioactual"=>$usuarioactual]);
}

public function store(Request $request)  
{
    $usuarioactual=\Auth::user();
    $idcartera = $request->get('idcartera');
    $fecha_actual = Carbon::now();
    $fecha_actual = $fecha_actual->format('d-m-Y');

        $consulta = DB::table('cartera as cartera')
        ->select('cliente.nombre','cliente.apellido',DB::raw('COUNT(detalle_liquidacion.estado) as estad' )->where('detalle.liquidacion','=','ATRASO'))
        ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
        ->where('cartera.idcartera', '=', $idcartera)
        ->where('detalle_liquidacion.fechadiaria','<=', $fecha_actual)
        //->where('cuenta.estado','=','ACTIVO')
        //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
        ->groupBy('cliente.nombre')
        ->orderBy('cliente','ASC')
        ->get();

    
    $fecha_actual = Carbon::now();
    $fecha_actual = $fecha_actual->format('d-m-Y');

    //$fecha = Carbon::parse($fecha)->format('d-m-Y');
    $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();


    return view('Tacticos.clasificacionClientes.edit',["fecha_actual"=>$fecha_actual, "cartera"=>$cartera,  "consulta"=>$consulta, "usuarioactual"=>$usuarioactual]);
}


}
