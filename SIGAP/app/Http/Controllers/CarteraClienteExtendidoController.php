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
            #$usuarioactual=\Auth::user();
            
            $fecha_actual = Fecha::spanish();

    		return view('Estrategicos.carteraClienteExtendido.create',["fecha_actual"=>$fecha_actual]);

    }

    public function store(CarteraClienteExtendidoFormRequest $request)  
    {

        $desde = $request->get('desde');
        $hasta = $request->get('hasta');

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            $fecha_actual = Fecha::spanish();
            return view('Estrategicos.carteraClienteExtendido.create',["fecha_actual"=>$fecha_actual]);
        }
        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $desde = Carbon::parse($desde)->format('d/m/Y');
        $hasta = Carbon::parse($hasta)->format('d/m/Y');

        return view('Estrategicos.carteraClienteExtendido.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta]);

    }


}
