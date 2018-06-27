<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;

use sigafi\Fecha;

use Carbon\Carbon;

use DB;

class Reporteria extends Controller
{
       public function reporte1(Request $request) {
        
        $vistaurl = "gerencial.reporte1";

        $nombre = "Reporte1";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }

    public function reporte2(Request $request) {
        
        $vistaurl = "gerencial.reporte2";

        $nombre = "Reporte2";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte3(Request $request) {
        
        $vistaurl = "gerencial.reporte3";

        $nombre = "Reporte3";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte4(Request $request) {
        
        $vistaurl = "gerencial.reporte4";

        $nombre = "Reporte4";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte5($idcart) {
        
        $vistaurl = "gerencial.reporte5";

        $nombre = "Reporte5";

        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');
        
        

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


        $view=\View::make($vistaurl, compact('fecha_actual','cartera','consulta'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte6(Request $request) {
        
        $vistaurl = "gerencial.reporte6";

        $nombre = "Reporte6";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte7(Request $request) {
        
        $vistaurl = "gerencial.reporte7";

        $nombre = "Reporte7";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte8(Request $request) {
        
        $vistaurl = "gerencial.reporte8";

        $nombre = "Reporte8";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte9($idcartera) {
        
        $vistaurl = "gerencial.reporte9";

        $nombre = "Reporte9";
        $esta = "INACTIVO";
        $fecha_actual = Fecha::spanish();
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();

        $consulta = DB::select("select cu.idcuenta as idCu, ca.idcartera as idCa, ca.nombre as nomCar, c.nombre nomCli, c.apellido ape, 
            cu.montocapital monto, p.monto debe, n.nombre negoNo, p.fechaultimapago fecha, cu.estado cuenEst, 
            (SELECT d.monto FROM detalle_liquidacion d 
            WHERE d.idcuenta=cu.idcuenta order by monto asc limit 1 offset 0) as deuda
            FROM cliente c, cartera ca, negocio n, cuenta cu, prestamo p
            WHERE c.idcartera = ca.idcartera AND n.idcliente = c.idcliente AND
            cu.idnegocio = n.idnegocio AND p.idprestamo = cu.idprestamo AND ca.idcartera = ? AND cu.estado = ?;",[$cartera->idcartera,$esta]);

        $view=\View::make($vistaurl,compact('fecha_actual', 'cartera', 'consulta'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte10($ide) {
        
        $vistaurl = "gerencial.reporte10";

        $nombre = "Reporte10";

        $fecha_actual = Fecha::spanish();

        $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();



        $consulta = DB::select("select ca.idcartera as ids, ca.nombre as nome, ca.ejecutivo as eje,
            (SELECT count(*) FROM cliente, cartera WHERE cliente.idcartera = cartera.idcartera) as nom, count(*) mon
            FROM cliente c, cartera ca, negocio n, cuenta cu, detalle_liquidacion d
            WHERE c.idcartera = ca.idcartera AND n.idcliente = c.idcliente AND cu.idnegocio = n.idnegocio 
                AND d.idcuenta = cu.idcuenta AND d.estado = 'CANCELADO' 
            GROUP BY   ca.idcartera,ca.nombre, ca.ejecutivo;");


        $view=\View::make($vistaurl,compact('consulta'))->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
    public function reporte11(Request $request) {
        
        $vistaurl = "gerencial.reporte11";

        $nombre = "Reporte11";
        $view=\View::make($vistaurl)->render();
        $pdf =\App::make('dompdf.wrapper');

        $pdf->loadHTML($view);
        return $pdf->stream($nombre.".pdf");
        
    }
}
