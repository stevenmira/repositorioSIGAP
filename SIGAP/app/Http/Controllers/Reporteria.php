<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;

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
    public function reporte9(Request $request) {
        
        $vistaurl = "gerencial.reporte9";

        $nombre = "Reporte9";
        $view=\View::make($vistaurl)->render();
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
