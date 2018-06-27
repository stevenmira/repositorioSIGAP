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
    public function reporte5(Request $request) {
        
        $vistaurl = "gerencial.reporte5";

        $nombre = "Reporte5";
        $view=\View::make($vistaurl)->render();
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
    public function reporte10(Request $request) {
        
        $vistaurl = "gerencial.reporte10";

        $nombre = "Reporte10";
        $view=\View::make($vistaurl)->render();
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
