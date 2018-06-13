<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Http\Requests\CreditoCompletoFormRequest;

use sigafi\Fecha;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon; //Para la zona fecha horaria
use DB;

class CreditoCompletoController extends Controller
{
    public function create()
    {
            $usuarioactual=\Auth::user();
            
            $fecha_actual = Fecha::spanish();
    		return view('Tacticos.creditoCompleto.create',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);

    }

    public function store(CreditoCompletoFormRequest $request)  
    {

        $usuarioactual=\Auth::user();
        
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            $fecha_actual = Fecha::spanish();
            return view('Tacticos.creditoCompleto.create',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);
        }

        #La consulta devuelve un valor null si no encuentra creditos completos
        $creditosCompletos = DB::table('cartera as cartera')
            ->select('prestamo.fecha', 'cliente.nombre', 'cliente.apellido', 'negocio.nombre as nombreNegocio',
                'prestamo.monto','prestamo.cuotadiaria','cartera.nombre as nombreCartera')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->where('prestamo.fecha','>=', $desde)
            ->where('prestamo.fecha','<=', $hasta)
            ->get();

        $total1 = 0;
        $total2 = 0;
        foreach ($creditosCompletos as $cc) {
            $total1 = $total1 + $cc->monto;
            $total2 = $total2 + $cc->cuotadiaria;
        }

            
        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $desde = Carbon::parse($desde)->format('d-m-Y');
        $hasta = Carbon::parse($hasta)->format('d-m-Y');

        return view('Tacticos.creditoCompleto.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta, "usuarioactual"=>$usuarioactual, "creditosCompletos"=>$creditosCompletos, "total1"=>$total1, "total2"=>$total2]);

    }

    public function creditoCompletoPDF($f1, $f2){

        $creditosCompletos = DB::table('cartera as cartera')
            ->select('prestamo.fecha', 'cliente.nombre', 'cliente.apellido', 'negocio.nombre as nombreNegocio',
                'prestamo.monto','prestamo.cuotadiaria','cartera.nombre as nombreCartera')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->where('prestamo.fecha','>=', $f1)
            ->where('prestamo.fecha','<=', $f2)
            ->get();

        $total1 = 0;
        $total2 = 0;
        foreach ($creditosCompletos as $cc) {
            $total1 = $total1 + $cc->monto;
            $total2 = $total2 + $cc->cuotadiaria;
        }

            
        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $desde = Carbon::parse($f1)->format('d-m-Y');
        $hasta = Carbon::parse($f2)->format('d-m-Y');

        $name = "CreditoCompletoPDF";
        $vistaurl= "reportes/creditoCompleto";

        return $this -> creditoCompletoReporte($vistaurl, $name, $creditosCompletos, $total1, $total2, $fecha_actual, $desde, $hasta);
    }

    public function creditoCompletoReporte($vistaurl, $name, $creditosCompletos, $total1, $total2, $fecha_actual, $desde, $hasta){
        
        $view=\View::make($vistaurl,compact('vistaurl', 'name', 'creditosCompletos', 'total1', 'total2', 'fecha_actual', 'desde', 'hasta'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($name);
    }

}
