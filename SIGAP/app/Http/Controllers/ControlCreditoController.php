<?php

namespace sigafi\Http\Controllers;
use sigafi\Http\Requests\ControlCreditoRequest;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;

class ControlCreditoController extends Controller
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

            
    		return view('Estrategicos.controlDeCredito.index',["fecha_actual"=>$fecha_actual,"searchText"=>$query, "usuarioactual"=>$usuarioactual]);
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
    public function store(ControlCreditoRequest $request)
    {
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            $fecha_actual = Fecha::spanish();
            return view('Estrategicos.controlDeCredito.index',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);
        }

        $clientes = DB::table('cliente as cliente')
        ->select('cliente.nombre','cliente.apellido','cliente.dui')

        
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


    public function busqueda(Request $request)
{
    
}
}


