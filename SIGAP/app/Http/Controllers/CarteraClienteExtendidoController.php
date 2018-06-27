<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Http\Requests\CarteraClienteExtendidoFormRequest;

use sigafi\Fecha;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon; //Para la zona fecha horaria
use DB;

class CarteraClienteExtendidoController extends Controller
{
    public function create()
    {
            $usuarioactual=\Auth::user();
            
            $fecha_actual = Fecha::spanish();

    		return view('Estrategicos.carteraClienteExtendido.create',["fecha_actual"=>$fecha_actual, 'usuarioactual'=>$usuarioactual]);

    }

    public function store(CarteraClienteExtendidoFormRequest $request)  
    {
        $usuarioactual=\Auth::user();

        $desde = $request->get('desde');
        $hasta = $request->get('hasta');

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            $fecha_actual = Fecha::spanish();
            return view('Estrategicos.carteraClienteExtendido.create',["fecha_actual"=>$fecha_actual, 'usuarioactual'=>$usuarioactual]);
        }

        #La consulta devuelve un valor null si no encuentra creditos completos
        $carteraExtendido = DB::select("
                            select cartera.nombre, sum(cuenta.montocapital) as monto, sum(cuenta.mora) as mora 
                            from cartera, cliente, negocio, cuenta, prestamo
                            where   
                                cartera.idcartera = cliente.idcartera and
                                cliente.idcliente = negocio.idcliente and
                                negocio.idnegocio = cuenta.idnegocio  and
                                cuenta.idprestamo = prestamo.idprestamo and
                                prestamo.fecha >= ? and
                                prestamo.fecha <= ?
                            group by cartera.nombre
                            ", [$desde, $hasta]);  

        $sumaMonto = 0;
        $sumaMora = 0;
        foreach ($carteraExtendido as $ca) {
                  $sumaMonto = $sumaMonto + $ca->monto;
                  $sumaMora = $sumaMora + $ca->mora;
              }      

        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $desde = Carbon::parse($desde)->format('d-m-Y');
        $hasta = Carbon::parse($hasta)->format('d-m-Y');

        return view('Estrategicos.carteraClienteExtendido.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta, 'sumaMonto'=>$sumaMonto,'sumaMora'=>$sumaMora,'usuarioactual'=>$usuarioactual, 'carteraExtendido'=>$carteraExtendido]);

    }

    public function carterasClientesExtendidoPDF($f1, $f2){

        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $desde = Carbon::parse($f1)->format('d-m-Y');
        $hasta = Carbon::parse($f2)->format('d-m-Y');

        #La consulta devuelve un valor null si no encuentra creditos completos
        $carteraExtendido = DB::select("
                            select cartera.nombre, sum(cuenta.montocapital) as monto, sum(cuenta.mora) as mora 
                            from cartera, cliente, negocio, cuenta, prestamo
                            where   
                                cartera.idcartera = cliente.idcartera and
                                cliente.idcliente = negocio.idcliente and
                                negocio.idnegocio = cuenta.idnegocio  and
                                cuenta.idprestamo = prestamo.idprestamo and
                                prestamo.fecha >= ? and
                                prestamo.fecha <= ?
                            group by cartera.nombre
                            ", [$desde, $hasta]);

        $name = "CarteraClienteExtendidoPDF";
        $vistaurl= "reportes/carteraClienteExtendido";

        return $this -> carteraClienteExtendidoReporte($vistaurl, $name, $carteraExtendido, $fecha_actual, $desde, $hasta);
    }

    public function carteraClienteExtendidoReporte($vistaurl, $name, $carteraExtendido, $fecha_actual, $desde, $hasta){

        $sumaMonto = 0;
        $sumaMora = 0;
        foreach ($carteraExtendido as $ca) {
                  $sumaMonto = $sumaMonto + $ca->monto;
                  $sumaMora = $sumaMora + $ca->mora;
              } 
        
        $view=\View::make($vistaurl,compact('vistaurl', 'name', 'carteraExtendido', 'sumaMonto', 'sumaMora', 'fecha_actual', 'desde', 'hasta'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($name);
    }


}
