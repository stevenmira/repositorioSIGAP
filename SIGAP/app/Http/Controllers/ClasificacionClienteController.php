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
    //DB::raw('(select count(estado) from detalle_liquidacion where estado=ATRASO ) as anterior')
        $consulta = DB::table('cartera as cartera')
        ->select(DB::raw('COUNT(detalle_liquidacion.estado) as estado' ),'negocio.nombre as nnegocio','cliente.nombre','cliente.apellido','prestamo.estadodos')
        ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
        ->where('cartera.idcartera', '=', $idcartera)
        ->where('detalle_liquidacion.fechadiaria','<=', $fecha_actual)
        ->where('detalle_liquidacion.estado','=','ATRASO')
        //->where('cuenta.estado','=','ACTIVO')
        //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
        ->where('prestamo.estadodos','=','ACTIVO')
        ->groupBy('negocio.nombre','cliente.nombre','cliente.apellido','prestamo.estadodos');
        //->orderBy('cliente.nombre','ASC');
        

        $consulta2 = DB::table('cartera as cartera')
        ->select(DB::raw('COUNT(detalle_liquidacion.estado) as estado' ),'negocio.nombre as nnegocio','cliente.nombre','cliente.apellido','prestamo.estadodos')
        ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
        ->where('cartera.idcartera', '=', $idcartera)
        ->where('detalle_liquidacion.fechadiaria','<=', $fecha_actual)
        ->where('detalle_liquidacion.estado','=','ATRASO')
        //->where('cuenta.estado','=','ACTIVO')
        //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
        ->where('prestamo.estadodos','=','VENCIDO')
        //->groupBy('cliente.nombre')
        //->orderBy('cliente.nombre','ASC')
        ->union($consulta)
        ->groupBy('negocio.nombre','cliente.nombre','cliente.apellido','prestamo.estadodos')
        ->get();

        

        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');
    
        //$fecha = Carbon::parse($fecha)->format('d-m-Y');
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();
    
    
        
      
        
           return view('Tacticos.clasificacionClientes.edit',["fecha_actual"=>$fecha_actual, "cartera"=>$cartera, "consulta2"=>$consulta2, "usuarioactual"=>$usuarioactual]);
         

    //return view('Tacticos.clasificacionClientes.edit',["fecha_actual"=>$fecha_actual, "cartera"=>$cartera,  "consulta"=>$consulta, "usuarioactual"=>$usuarioactual]);
}


public function clasificacionClientePDF($idcartera, $fecha){
        
    //DB::raw('(select count(estado) from detalle_liquidacion where estado=ATRASO ) as anterior')
        $consulta = DB::table('cartera as cartera')
        ->select(DB::raw('COUNT(detalle_liquidacion.estado) as estado' ),'negocio.nombre as nnegocio','cliente.nombre','cliente.apellido','prestamo.estadodos')
        ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
        ->where('cartera.idcartera', '=', $idcartera)
        ->where('detalle_liquidacion.fechadiaria','<=', $fecha)
        ->where('detalle_liquidacion.estado','=','ATRASO')
        //->where('cuenta.estado','=','ACTIVO')
        //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
        ->where('prestamo.estadodos','=','ACTIVO')
        ->groupBy('negocio.nombre','cliente.nombre','cliente.apellido','prestamo.estadodos');
        //->orderBy('cliente.nombre','ASC');
        

        $consulta2 = DB::table('cartera as cartera')
        ->select(DB::raw('COUNT(detalle_liquidacion.estado) as estado' ),'negocio.nombre as nnegocio','cliente.nombre','cliente.apellido','prestamo.estadodos')
        ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
        ->where('cartera.idcartera', '=', $idcartera)
        ->where('detalle_liquidacion.fechadiaria','<=', $fecha)
        ->where('detalle_liquidacion.estado','=','ATRASO')
        //->where('cuenta.estado','=','ACTIVO')
        //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
        ->where('prestamo.estadodos','=','VENCIDO')
        //->groupBy('cliente.nombre')
        //->orderBy('cliente.nombre','ASC')
        ->union($consulta)
        ->groupBy('negocio.nombre','cliente.nombre','cliente.apellido','prestamo.estadodos')
        ->get();

        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');     
    
        //$fecha = Carbon::parse($fecha)->format('d-m-Y');
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();
    
  
$name = "clasificacionClientePDF";
$vistaurl= "reportes/clasificacionCliente";

    return $this -> clasificacionClienteReporte($vistaurl, $name, $consulta2, $fecha,$fecha_actual,$cartera);
}

public function clasificacionClienteReporte($vistaurl, $name, $consulta2, $fecha,$fecha_actual,$cartera){
    
    $view=\View::make($vistaurl,compact('vistaurl', 'name', 'consulta2', 'fecha_actual', 'cartera'))->render();
    $pdf =\App::make('dompdf.wrapper');

    $pdf->loadHTML($view);
    return $pdf->stream($name);
}






}
