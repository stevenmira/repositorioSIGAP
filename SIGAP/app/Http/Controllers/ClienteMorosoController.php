<?php

namespace sigafi\Http\Controllers;

use Illuminate\Http\Request;

use sigafi\Http\Requests;
use sigafi\Fecha;
use DB;
use Carbon\Carbon;

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


        $clientes = DB::select("select c.nombre, c.apellido,count(*)as num, n.nombre as nombreNegocio,p.monto as m,
(select monto from detalle_liquidacion where detalle_liquidacion.idcuenta=cc.idcuenta order by monto asc limit 1 offset 0) as mount, 
(p.monto - (select monto from detalle_liquidacion where detalle_liquidacion.idcuenta=cc.idcuenta order by monto asc limit 1 offset 0))as dif, ca.nombre as nombreCartera

from cliente c, negocio n ,cuenta cc, prestamo p,detalle_liquidacion d, cartera ca where

c.idcliente = n.idcliente and
n.idnegocio = cc.idnegocio and
cc.idprestamo = p.idprestamo and
cc.idcuenta = d.idcuenta and
c.idcartera = ca.idcartera and
d.estado = 'ATRASO' and
p.fecha >= ? and
p.fecha <= ?
group by c.nombre,c.apellido,n.nombre,p.monto,cc.idcuenta, ca.nombre;",[$desde,$hasta]);

        $total1=0;
        $total2=0;
        $total3=0;


            foreach ($clientes as $cl) {
                $total1+=round($cl->m,2);
                $total2+=round($cl->mount,2);
                $total3+=round($cl->dif,2);

                
                
            }


         return view('Tacticos.clientesMorosos.edit',["fecha_actual"=>$fecha_actual,"desde"=>$desde, "hasta"=>$hasta, "usuarioactual"=>$usuarioactual, "clientes"=>$clientes,"total1"=>$total1,"total2"=>$total2,"total3"=>$total3]);
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

    public function clienteMorosoPDF($desde,$hasta)
    {

$clientes = DB::select("select c.nombre, c.apellido,count(*)as num, n.nombre as nombreNegocio,p.monto as m,
(select monto from detalle_liquidacion where detalle_liquidacion.idcuenta=cc.idcuenta order by monto asc limit 1 offset 0) as mount, 
(p.monto - (select monto from detalle_liquidacion where detalle_liquidacion.idcuenta=cc.idcuenta order by monto asc limit 1 offset 0))as dif, ca.nombre as nombreCartera

from cliente c, negocio n ,cuenta cc, prestamo p,detalle_liquidacion d, cartera ca where

c.idcliente = n.idcliente and
n.idnegocio = cc.idnegocio and
cc.idprestamo = p.idprestamo and
cc.idcuenta = d.idcuenta and
c.idcartera = ca.idcartera and
d.estado = 'ATRASO' and
p.fecha >= ? and
p.fecha <= ?
group by c.nombre,c.apellido,n.nombre,p.monto,cc.idcuenta, ca.nombre;",[$desde,$hasta]);

        $total1=0;
        $total2=0;
        $total3=0;


            foreach ($clientes as $cl) {
                $total1+=round($cl->m,2);
                $total2+=round($cl->mount,2);
                $total3+=round($cl->dif,2);

                
                
            }


            $fecha_actual = Carbon::now();
            $fecha_actual = $fecha_actual->format('d-m-Y');

            $name = "clienteMorosoPDF";
            $vistaurl = "reportes/clienteMoroso";

            return $this -> clienteMorosoReporte($vistaurl,$name,$clientes,$total1,$total2,$total3,$fecha_actual,$desde,$hasta);
    }

    public function clienteMorosoReporte($vistaurl,$name,$clientes,$total1,$total2,$total3,$fecha_actual,$desde,$hasta)
    {
      $view=\View::make($vistaurl,compact('vistaurl','name','clientes','total1','total2','total3','fecha_actual','desde','hasta'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($name);   
    }
}
