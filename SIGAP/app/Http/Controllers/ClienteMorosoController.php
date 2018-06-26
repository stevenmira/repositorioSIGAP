<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;

class ClienteMorosoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
    	{
            $usuarioactual=\Auth::user();

            //Obtenemos la fecha de hoy en español usando carbon y array
            $fecha_actual = Fecha::spanish();
            
    		$query = trim($request->get('searchText'));

            
    		return view('Tacticos.clientesMorosos.index',["fecha_actual"=>$fecha_actual, "searchText"=>$query, "usuarioactual"=>$usuarioactual]);
    	}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $fecha_actual = Fecha::spanish();
        $usuarioactual=\Auth::user();

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            return view('Estrategicos.refinanciamiento.index',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);
        }

        $clientes = DB::table('cliente as cliente')
        ->select('cliente.nombre','cliente.apellido')
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
        ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
        ->join('detalle_liquidacion as detalle_liquidacion','cuenta.idcuenta',"=",'detalle_liquidacion.idcuenta')
        ->where('prestamo.fecha','>=', $desde)
        ->where('prestamo.fecha','<=', $hasta)
        ->get();


         return view('Estrategicos.refinanciamiento.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta, "usuarioactual"=>$usuarioactual, "clientes"=>$clientes, "total1"=>$total1,"total2"=>$total2]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
