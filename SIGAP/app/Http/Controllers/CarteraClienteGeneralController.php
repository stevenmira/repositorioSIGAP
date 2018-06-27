<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use sigafi\Cliente;
use sigafi\Http\Requests;
use sigafi\Fecha;


class CarteraClienteGeneralController extends Controller
{
     
   
    public function create()
    {
        $usuarioactual=\Auth::user();
            
        $fecha_actual = Fecha::spanish();

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

        return view('Estrategicos.carteraClienteGen.create',["fecha_actual"=>$fecha_actual, "carteras"=>$carteras, "usuarioactual"=>$usuarioactual]);

}

    public function store(Request $request)  
    { $usuarioactual=\Auth::user();

        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $idcartera = $request->get('idcartera');
        $fecha = $request->get('fecha');

       /* $consulta = DB::table('cartera as cartera')
            ->select('cuenta.idcuenta','cartera.idcartera',DB::raw('SUM(detalle_liquidacion.interes) as interes' ),'detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto' , 'prestamo.cuotadiaria', 'detalle_liquidacion.fechadiaria' , 'detalle_liquidacion.fechaefectiva')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
            ->where('cartera.idcartera', '=', $idcartera)
            ->where('detalle_liquidacion.fechaefectiva','>=', $desde)
            ->where('detalle_liquidacion.fechaefectiva','<=', $hasta)
            //->where('cuenta.estado','=','ACTIVO')
           //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
            ->groupBy('cuenta.idcuenta','cartera.idcartera', 'detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto' ,'negocio.nombre' , 'prestamo.cuotadiaria', 'detalle_liquidacion.fechadiaria' , 'detalle_liquidacion.fechaefectiva')
            ->orderBy('detalle_liquidacion.fechaefectiva','ASC')
            ->get();*/
            $consulta = DB::table('cartera as cartera')
            ->select(DB::raw('SUM(detalle_liquidacion.interes) as interes' ),DB::raw('SUM(detalle_liquidacion.cuotacapital) as cuotacapital') , DB::raw('SUM(detalle_liquidacion.totaldiario) as totaldiario'),DB::raw('SUM(detalle_liquidacion.monto) as monto ') , DB::raw('SUM(prestamo.cuotadiaria) as cuotadiaria'),'detalle_liquidacion.fechaefectiva')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
            ->where('cartera.idcartera', '=', $idcartera)
            ->where('detalle_liquidacion.fechaefectiva','>=', $desde)
            ->where('detalle_liquidacion.fechaefectiva','<=', $hasta)
            //->where('cuenta.estado','=','ACTIVO')
            //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
            ->groupBy('detalle_liquidacion.fechaefectiva')
            ->orderBy('detalle_liquidacion.fechaefectiva','ASC')
            ->get();

        $desde=Carbon::parse($desde)->format('d-m-Y');
        $hasta=Carbon::parse($hasta)->format('d-m-Y');
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $fecha = Carbon::parse($fecha)->format('d-m-Y');
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();


        return view('Estrategicos.carteraClienteGen.edit',["desde"=>$desde,"hasta"=>$hasta,"fecha_actual"=>$fecha_actual,"fecha"=>$fecha, "cartera"=>$cartera,  "consulta"=>$consulta, "usuarioactual"=>$usuarioactual]);
 }

    public function carteraClienteGenPDF($idcartera, $desde,$hasta){

        $consulta = DB::table('cartera as cartera')
        ->select(DB::raw('SUM(detalle_liquidacion.interes) as interes' ),DB::raw('SUM(detalle_liquidacion.cuotacapital) as cuotacapital') , DB::raw('SUM(detalle_liquidacion.totaldiario) as totaldiario'),DB::raw('SUM(detalle_liquidacion.monto) as monto ') , DB::raw('SUM(prestamo.cuotadiaria) as cuotadiaria'),'detalle_liquidacion.fechaefectiva')
        ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
        ->where('cartera.idcartera', '=', $idcartera)
        ->where('detalle_liquidacion.fechaefectiva','>=', $desde)
        ->where('detalle_liquidacion.fechaefectiva','<=', $hasta)
        //->where('cuenta.estado','=','ACTIVO')
        //->SUM('detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto', 'prestamo.cuotadiaria')
        ->groupBy('detalle_liquidacion.fechaefectiva')
        ->orderBy('detalle_liquidacion.fechaefectiva','ASC')
        ->get();

    $desde=Carbon::parse($desde)->format('d-m-Y');
    $hasta=Carbon::parse($hasta)->format('d-m-Y');
    $fecha_actual = Carbon::now();
    $fecha_actual = $fecha_actual->format('d-m-Y');

    //$fecha = Carbon::parse($fecha)->format('d-m-Y');
    $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();

    $name = "CarteraClienteGenPDF";
    $vistaurl= "reportes/carteraClienteGen";

        return $this -> carteraGeneralReporte($vistaurl, $name, $consulta, $fecha_actual, $desde, $hasta,$cartera);
    }

    public function carteraGeneralReporte($vistaurl, $name, $consulta, $fecha_actual, $desde, $hasta,$cartera){
        
        $view=\View::make($vistaurl,compact('vistaurl', 'name', 'consulta', 'fecha_actual', 'desde','hasta', 'cartera'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($name);
    }

}


