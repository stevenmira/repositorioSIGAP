<?php

namespace sigafi\Http\Controllers;
use sigafi\Http\Requests\ControlCreditoRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use sigafi\Http\Requests;
use sigafi\Fecha;
use DB;
use Carbon\Carbon;
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
        $fecha_actual = Fecha::spanish();
        $usuarioactual=\Auth::user();

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            
            return view('Estrategicos.controlDeCredito.index',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);
        }

        $clientes = DB::table('cartera as cartera')
            ->select('prestamo.fecha', 'cliente.nombre', 'cliente.apellido','cliente.dui' ,'prestamo.monto','prestamo.montooriginal','prestamo.estado','prestamo.estadodos','cuenta.interes','cartera.nombre as nombreCartera')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->where('prestamo.fecha','>=', $desde)
            ->where('prestamo.fecha','<=', $hasta)
            ->where('prestamo.estadodos','=','ACTIVO')
            ->where('prestamo.estado','=','COMPLETO')
            ->orwhere('prestamo.estado','=','REFINANCIAMIENTO')
            
            ->get();

            $total1=0;
            $total2=0;
            $total3=0;
           
            

            foreach ($clientes as $cl) {
                $total1+=round($cl->monto,2);
                $total2+=round($cl->montooriginal,2);
                $total3+=round(($cl->monto * $cl->interes),2);
                
            }

        return view('Estrategicos.controlDeCredito.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta, "usuarioactual"=>$usuarioactual, "clientes"=>$clientes, "total1"=>$total1, "total2"=>$total2,"total3"=>$total3]);
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

    public function controlCreditoPDF($desde, $hasta)
    {

            $clientes = DB::table('cartera as cartera')
            ->select('prestamo.fecha', 'cliente.nombre', 'cliente.apellido','cliente.dui' ,'prestamo.monto','prestamo.montooriginal','prestamo.estado','prestamo.estadodos','cuenta.interes','cartera.nombre as nombreCartera')
            ->join('cliente as cliente','cartera.idcartera','=','cliente.idcartera')
            ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
            ->join('cuenta as cuenta','negocio.idnegocio','=','cuenta.idnegocio')
            ->join('prestamo as prestamo','cuenta.idprestamo','=','prestamo.idprestamo')
            ->where('prestamo.fecha','>=', $desde)
            ->where('prestamo.fecha','<=', $hasta)
            ->where('prestamo.estadodos','=','ACTIVO')
            ->where('prestamo.estado','=','COMPLETO')
            ->orwhere('prestamo.estado','=','REFINANCIAMIENTO')
            
            ->get();

            $total1=0;
            $total2=0;
            $total3=0;
           
            

            foreach ($clientes as $cl) {
                $total1+=round($cl->monto,2);
                $total2+=round($cl->montooriginal,2);
                $total3+=round(($cl->monto * $cl->interes),2);
                
            }


            $fecha_actual = Carbon::now();
            $fecha_actual = $fecha_actual->format('d-m-Y');

            $name = "ControlCreditoPDF";
            $vistaurl = "reportes/controlCredito";

            return $this -> controlCreditoReporte($vistaurl,$name,$clientes,$total1,$total2,$total3,$fecha_actual,$desde,$hasta);
    }


    public function controlCreditoReporte($vistaurl,$name,$clientes,$total1,$total2,$total3,$fecha_actual,$desde,$hasta)
    {
        $view=\View::make($vistaurl,compact('vistaurl','name','clientes','total1','total2','total3','fecha_actual','desde','hasta'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($name);
    }


}


