@extends ('layouts.inicio')
@section('contenido')
<section class="content-header">
  <div class="row text-right">
    <img  src="{{asset('img/log.jpg')}}" width="150px" height="60px">
  </div>
</section>
  <div class="row">
        <h4 align="center"> <b>AFIMID, S.A. DE C.V.</b></h4>
        <h4 colspan="2" align="center">
          ASESORES FINANCIEROS MICRO IMPULSADORES DE NEGOCIOS<br>SOCIEDAD ANONIMA DE CAPITAL<br>VARIABLE
        </h4>
  </div>

<section class="content-header">
  <div class="row">
    <p class="col-md-2 col-lg-2 col-sm-2 col-lg-offset-10 col-md-offset-10">{{$fecha_actual}}</p>
  </div>
  
  <h4 align="center"><b>REPORTE DE CLASIFICO DE CLIENTES</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Cartera:</b>&nbsp;&nbsp;&nbsp; {{$cartera->nombre}}</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Fecha:</b>&nbsp;&nbsp;&nbsp; {{$fecha}}</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp; José Castro</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Supervisor:</b>&nbsp;&nbsp;&nbsp; Pedro Lopéz</p>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed text-centered" style="border: 1px solid #333;">
              <thead>
                <tr style="border: 1px solid #333;text-align: center;">
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">CLIENTE/NOMBRE</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL CUOTAS ATRASADAS</th>
                  <th style="border: 1px solid #333;text-align: center;">INTERES DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">CAPITAL DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL RECIBIDO DIARIO</th>
                  </tr>
              </thead>

              <tbody>
                @foreach ($consulta as $con)
                <tr>
                 
                  <td style="border: 1px solid #333;"></td>

                  <td style="border: 1px solid #333;">{{ $con->nombre }}</td>
                  
                  
                 
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span></td>
                 
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->estad }}</td>
                 


                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->interes }}</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->cuotacapital }}</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->totaldiario }}</td>
                  <td style="border: 1px solid #333; text-align: right;"></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->cuotadiaria }}</td>
                  
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span></td>
                </tr>
             
                  <?php 
                     $sum_interes_diario = $sum_interes_diario + $con->interes; 
                     $sum_capital_diario = $sum_capital_diario + $con->cuotacapital;
                     $sum_recibo_diario =  $sum_recibo_diario+  $con->totaldiario;
                     

                  ?>
                @endforeach
                <tr style="color: black;">
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333"><span><b>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de Intereses" class="rojo total"> <b>{{ $sum_saldo_capital }}</b></a></td>
                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de Intereses" class="rojo total"> <b>{{$sum_interes_diario}}</b></a></td>

                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de cuota capital" class="rojo total"> <b>{{ $sum_capital_diario}}</b></a></td>

                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total diario" class="rojo total"> <b>{{  $sum_recibo_diario }}</b> </a></td>
                   <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total diario" class="rojo total"> <b>{{  $sum_total_atrasadas }}</b> </a></td>
                </tr>
              </tbody>
          </table>
      </div>
    </div>
  </div>


  <br>
  <div class="row">
    <a href="{{URL::action('CarteraClienteController@create')}}" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <a href="{{ url('carteraClienteNormalPDF', ['p1' => $cartera->idcartera, 'p2' => $fecha]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3">GENERAR REPORTE</a>

  </div>
  <br><br>
  

</section>
@endsection