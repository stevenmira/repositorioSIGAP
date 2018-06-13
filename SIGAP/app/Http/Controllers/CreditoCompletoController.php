<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Http\Requests\CreditoCompletoFormRequest;

use sigafi\Fecha;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon; //Para la zona fecha horaria

class CreditoCompletoController extends Controller
{
    public function create()
    {
            $usuarioactual=\Auth::user();
            
            $fecha_actual = Fecha::spanish();
    		return view('Tacticos.carteraCompleta.create',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);

    }

    public function store(CreditoCompletoFormRequest $request)  
    {

        $usuarioactual=\Auth::user();
        
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            $fecha_actual = Fecha::spanish();
            return view('Tacticos.carteraCompleta.create',["fecha_actual"=>$fecha_actual]);
        }
        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $desde = Carbon::parse($desde)->format('d/m/Y');
        $hasta = Carbon::parse($hasta)->format('d/m/Y');

        return view('Tacticos.carteraCompleta.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta, "usuarioactual"=>$usuarioactual]);

    }

}
