<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Http\Requests\CarteraClienteFormRequest;

use sigafi\Fecha;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon; //Para la zona fecha horaria
use DB;

class CarteraClienteController extends Controller
{
    public function create()
    {
            #$usuarioactual=\Auth::user();
            
            $fecha_actual = Fecha::spanish();

            $carteras = DB::table('cartera')->orderby('cartera.nombre','asc')->get();

    		return view('Tacticos.carteraCliente.create',["fecha_actual"=>$fecha_actual, "carteras"=>$carteras]);

    }

    public function store(CarteraClienteFormRequest $request)  
    {

        $fecha = $request->get('fecha');
        $idcartera = $request->get('idcartera');
        
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');

        $fecha = Carbon::parse($fecha)->format('d/m/Y');
        $cartera = DB::table('cartera')->where('cartera.idcartera','=',$idcartera)->first();


        return view('Tacticos.carteraCliente.edit',["fecha_actual"=>$fecha_actual,"fecha"=>$fecha, "cartera"=>$cartera]);

    }
}
