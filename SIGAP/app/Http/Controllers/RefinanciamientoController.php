<?php

namespace sigafi\Http\Controllers;
use sigafi\Http\Requests\RefinanciamientoFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use sigafi\Http\Requests;
use sigafi\Fecha;
use DB;
use Carbon\Carbon;
class RefinanciamientoController extends Controller
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
            $fecha_actual = Carbon::now();
            $fecha_actual = $fecha_actual->format('d-m-Y');
            
    		$query = trim($request->get('searchText'));

            
    		return view('Estrategicos.refinanciamiento.index',["fecha_actual"=>$fecha_actual, "searchText"=>$query,"usuarioactual"=>$usuarioactual]);
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
    public function store(RefinanciamientoFormRequest $request)
    {
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $fecha_actual = Carbon::now();
        $fecha_actual = $fecha_actual->format('d-m-Y');
        $desde=Carbon::parse($desde)->format('d-m-Y');
        $hasta=Carbon::parse($hasta)->format('d-m-Y');
        $usuarioactual=\Auth::user();

        if ($desde > $hasta) {

            Session::flash('msj',"El valor del campo -- FECHA INICIO -- debe ser menor o igual que el valor del campo -- FECHA FIN --");
            
            return view('Estrategicos.refinanciamiento.index',["fecha_actual"=>$fecha_actual, "usuarioactual"=>$usuarioactual]);
        }

      $clientes = DB::table('cliente as cliente')
        ->select('cliente.nombre','cliente.apellido','negocio.nombre as nombreNegocio',        
        'prestamo.cuotadiaria','cta.interes', DB::raw('(select capitalanterior from cuenta where cuenta.idcuenta = prestamo.cuentaanterior) as anterior'), DB::raw('(select mora from cuenta where cuenta.idcuenta = prestamo.cuentaanterior) as mora')  )
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cta','negocio.idnegocio','=','cta.idnegocio')
        ->join('prestamo as prestamo','cta.idprestamo','=','prestamo.idprestamo')
        
        ->where('prestamo.fecha','>=', $desde)
        ->where('prestamo.fecha','<=', $hasta)
        ->where('prestamo.estado','=','REFINANCIAMIENTO')
        ->where('prestamo.estadodos','=','ACTIVO')
        ->get();

            $total1=0;
            $total2=0;
           
            

            foreach ($clientes as $cl) {
                $total1+=round($cl->mora,2);
                $total2+=round($cl->anterior,2);
                
                
            }

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


    public function refinanciamientoPDF($desde,$hasta)
    {
         $clientes = DB::table('cliente as cliente')
        ->select('cliente.nombre','cliente.apellido','negocio.nombre as nombreNegocio',        
        'prestamo.cuotadiaria','cta.interes', DB::raw('(select capitalanterior from cuenta where cuenta.idcuenta = prestamo.cuentaanterior) as anterior'), DB::raw('(select mora from cuenta where cuenta.idcuenta = prestamo.cuentaanterior) as mora')  )
        ->join('negocio as negocio','cliente.idcliente','=','negocio.idcliente')
        ->join('cuenta as cta','negocio.idnegocio','=','cta.idnegocio')
        ->join('prestamo as prestamo','cta.idprestamo','=','prestamo.idprestamo')
        
        ->where('prestamo.fecha','>=', $desde)
        ->where('prestamo.fecha','<=', $hasta)
        ->where('prestamo.estado','=','REFINANCIAMIENTO')
        ->where('prestamo.estadodos','=','ACTIVO')
        ->get();

            $total1=0;
            $total2=0;
           
            

            foreach ($clientes as $cl) {
                $total1+=round($cl->mora,2);
                $total2+=round($cl->anterior,2);
                
                
            }


            $fecha_actual = Carbon::now();
            $fecha_actual = $fecha_actual->format('d-m-Y');

            $name = "refinanciamientoPDF";
            $vistaurl = "reportes/refinanciamiento";


            return $this -> refinanciamientoReporte($vistaurl,$name,$clientes,$total1,$total2,$fecha_actual,$desde,$hasta);
    }


    public function refinanciamientoReporte($vistaurl,$name,$clientes,$total1,$total2,$fecha_actual,$desde,$hasta)
    {
        $view=\View::make($vistaurl,compact('vistaurl','name','clientes','total1','total2','fecha_actual','desde','hasta'))->render();
        $pdf =\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($name);
    }
}
