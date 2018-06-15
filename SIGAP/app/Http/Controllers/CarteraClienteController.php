<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Http\Requests\CarteraClienteFormRequest;
use Illuminate\Support\Facades\Session;

use sigafi\Fecha;

use Carbon\Carbon;

use DB;

class CarteraClienteController extends Controller
{
    public function create()
    {
            $usuarioactual=\Auth::user();
            
            $fecha_actual = Fecha::spanish();

            $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

            return view('Tacticos.carteraCliente.create',["fecha_actual"=>$fecha_actual, "carteras"=>$carteras, "usuarioactual"=>$usuarioactual]);

    }

    public function store(CarteraClienteFormRequest $request)  
    {
        $usuarioactual=\Auth::user();

        $idcartera = $request->get('idcartera');
        $fecha = $request->get('fecha');

        $consulta = DB::table('cartera as cartera')
            ->select('cuenta.idcuenta','cartera.idcartera','cartera.nombre as nombreCartera','cliente.nombre' , 'cliente.apellido', 'detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto' ,'negocio.nombre as nombreNegocio' , 'prestamo.cuotadiaria', 'detalle_liquidacion.fechadiaria' , 'detalle_liquidacion.fechaefectiva')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
            ->where('cartera.idcartera', '=', $idcartera)
            ->where('detalle_liquidacion.fechadiaria','=', $fecha)
            ->where('cuenta.estado','=','ACTIVO')
            ->get();

        $array = [];
        $array2 = [];
        $i=0;

        foreach ($consulta as $c) {


            $liquidaciones = DB::table('detalle_liquidacion')->where('idcuenta','=',$c->idcuenta)->get();

            $atraso = 0;
            foreach ($liquidaciones as $liq) {

                    if (strtotime($liq->fechadiaria) <= strtotime($fecha) ) {
                        if ($liq->estado == 'ATRASO') {
                            $atraso = $atraso + 1;
                        }
                    }

                    if (!is_null($liq->monto) && is_null($liq->fechaefectiva) && is_null($liq->totaldiario)) {
                        $array2[$i] = $liq->monto;
                    }
            }

            if ($atraso > 0) {
                $array[$i] = $atraso;
            }else{
                $array[$i] = 0;
            }

            $i = $i + 1;
        }


        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $fecha = Carbon::parse($fecha)->format('d-m-Y');
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();


        return view('Tacticos.carteraCliente.edit',["fecha_actual"=>$fecha_actual,"fecha"=>$fecha, "cartera"=>$cartera,  "consulta"=>$consulta, "array"=>$array, "array2"=>$array2, "usuarioactual"=>$usuarioactual]);

    }

    public function carteraClientePDF($idcartera, $fecha){

        $consulta = DB::table('cartera as cartera')
            ->select('cuenta.idcuenta','cartera.idcartera','cartera.nombre as nombreCartera','cliente.nombre' , 'cliente.apellido', 'detalle_liquidacion.interes','detalle_liquidacion.cuotacapital' , 'detalle_liquidacion.totaldiario','detalle_liquidacion.monto' ,'negocio.nombre as nombreNegocio' , 'prestamo.cuotadiaria', 'detalle_liquidacion.fechadiaria' , 'detalle_liquidacion.fechaefectiva')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta','=','detalle_liquidacion.idcuenta')
            ->where('cartera.idcartera', '=', $idcartera)
            ->where('detalle_liquidacion.fechadiaria','=', $fecha)
            ->where('cuenta.estado','=','ACTIVO')
            ->get();

        $array = [];
        $array2 = [];
        $i=0;

        foreach ($consulta as $c) {


            $liquidaciones = DB::table('detalle_liquidacion')->where('idcuenta','=',$c->idcuenta)->get();

            $atraso = 0;
            foreach ($liquidaciones as $liq) {

                    if (strtotime($liq->fechadiaria) <= strtotime($fecha) ) {
                        if ($liq->estado == 'ATRASO') {
                            $atraso = $atraso + 1;
                        }
                    }

                    if (!is_null($liq->monto) && is_null($liq->fechaefectiva) && is_null($liq->totaldiario)) {
                        $array2[$i] = $liq->monto;
                    }
            }

            if ($atraso > 0) {
                $array[$i] = $atraso;
            }else{
                $array[$i] = 0;
            }

            $i = $i + 1;
        }


        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $fecha = Carbon::parse($fecha)->format('d-m-Y');
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();

        $name = "CarteraClientePDF";
        $vistaurl= "reportes/carteraCliente";

        return $this -> carteraClienteReporte($vistaurl, $name, $consulta, $array, $array2, $fecha_actual, $fecha, $cartera);
    }

    public function carteraClienteReporte($vistaurl, $name, $consulta, $array, $array2, $fecha_actual, $fecha, $cartera){
        
        $view=\View::make($vistaurl,compact('vistaurl', 'name', 'consulta', 'array', 'array2', 'fecha_actual', 'fecha', 'cartera'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($name);
    }
}
