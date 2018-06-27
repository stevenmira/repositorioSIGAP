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
    <p class="col-md-4 col-lg-4 col-sm-4 col-lg-offset-10 col-md-offset-9"><b>Fecha Emision: </b>{{$fecha_actual}}</p>
  </div>
  
  <h4 align="center"><b>REPORTE DE CARTERA DE CLIENTES</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Cartera:</b>&nbsp;&nbsp;&nbsp; {{$cartera->nombre}}</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Fecha:</b>&nbsp;&nbsp;&nbsp; {{$fecha}}</p>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed text-centered" style="border: 1px solid #333;">
              <thead>
                <tr style="border: 1px solid #333;text-align: center;">
                  <th style="border: 1px solid #333;text-align: center;">Nº</th>
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">CLIENTE/NOMBRE</th>
                  <th style="border: 1px solid #333;text-align: center;">SALDO CAPITAL</th>
                  <th style="border: 1px solid #333;text-align: center;">INTERES DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">CAPITAL DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL RECIBIDO DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">#CUOTAS ATRASADAS</th>
                  <th style="border: 1px solid #333;text-align: center;">PRECIO DE CUOTA</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL CUOTAS ATRASADAS</b></th>
                </tr>
              </thead>

              <?php
                $sum_saldo_capital=0;
                $sum_interes_diario=0;
                $sum_capital_diario=0;
                $sum_recibo_diario=0;
                $sum_total_atrasadas=0;

                $n=0;

                $i=0;
              ?>
              <tbody>
                @foreach ($consulta as $con)
                <tr>
                  <?php $n=$n+1?>
                  <td style="border: 1px solid #333;">{{ $n }}</td>

                  <td style="border: 1px solid #333;">{{ $con->nombre }} {{ $con->apellido }}</td>
                  
                  <?php $saldo_capital = $con->monto - $con->cuotacapital; ?>
                  @if($con->monto == null)
                  <?php 
                     $sum_saldo_capital = $sum_saldo_capital + $array2[$i];
                  ?>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $array2[$i] }}</td>
                  @else
                  <?php 
                     $sum_saldo_capital = $sum_saldo_capital + $saldo_capital;
                  ?>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $saldo_capital }}</td>
                  @endif


                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->interes }}</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->cuotacapital }}</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->totaldiario }}</td>
                  <td style="border: 1px solid #333; text-align: right;">{{$array[$i]}}</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $con->cuotadiaria }}</td>
                  <?php $total = $array[$i] * $con->cuotadiaria ?>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{ $total }}</td>
                </tr>
                  <?php 
                     $sum_interes_diario = $sum_interes_diario + $con->interes; 
                     $sum_capital_diario = $sum_capital_diario + $con->cuotacapital;
                     $sum_recibo_diario =  $sum_recibo_diario+  $con->totaldiario;
                     $sum_total_atrasadas = $sum_total_atrasadas + $total;

                     $i = $i + 1;

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
    <a href="{{ url('carteraClienteNormalPDF', ['p1' => $cartera->idcartera, 'p2' => $fecha]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3"><i class="fa fa-print"> IMPRIMIR</i></a>

  </div>
  <br><br>
  

</section>
@endsection