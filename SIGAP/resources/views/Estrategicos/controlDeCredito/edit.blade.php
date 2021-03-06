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
    <p class="col-md-4 col-lg-4 col-sm-4 col-lg-offset-9 col-md-offset-9">fecha de emision: {{$fecha_actual}}</p>
  </div>
  
  <h4 align="center"><b>REPORTE DE CONTROL DE CREDITO</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-4 col-lg-4 col-sm-4"><b>Fecha de inicio:</b> {{$desde}}</p>
    <p class="col-md-3 col-lg-3 col-sm-3 col-md-offset-1"><b>Fecha Fin:</b> {{$hasta}}</p>
  </div>

  @if ($clientes==null)
    <div class="row form-group">
      <p class="col-md-12 col-lg-12 col-sm-12" style="color: red" align="center"><b>NO HAY REGISTRO DE CRÉDITOS</b></p>
    </div>
  @endif

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <tr>
                    <th style="border: 1px solid #333;" width="75px">N</th>
                    <th style="border: 1px solid #333;" width="225px">NOMBRE DEL CLIENTE</th>
                    <th style="border: 1px solid #333;" width="225px">DUI</th>
                    <th style="border: 1px solid #333;" width="225px">FECHA DE OTORGAMIENTO</th>
                    <th style="border: 1px solid #333;" width="100px">MONTO</th>
                    <th style="border: 1px solid #333;" width="100px">INTERES</th>
                    <th style="border: 1px solid #333;" width="200px">ESTIMACION</th>
                    <th style="border: 1px solid #333;" width="100px">DESEMBOLSO</th>
                    <th style="border: 1px solid #333;" width="200px">CARTERA</th>
                </tr>
              </thead>
              <?php $i=1?>
              <?php $b=0?>
              @foreach ($clientes as $cc)
              <tr>
                  <td style="border: 1px solid #333;">{{$i++}}</td>
                  <td style="border: 1px solid #333;">{{$cc->nombre}} {{$cc->apellido}}</td>
                  <td style="border: 1px solid #333;">{{$cc->dui}}</td>
                  <td style="border: 1px solid #333;">{{$cc->fecha}}</td>
                  <?php $b=round($cc->monto,2) ?>
                  <td style="border: 1px solid #333;">$ {{$b}}</td>
                  <td style="border: 1px solid #333;">{{$cc->interes *100}}%</td>
                  <?php $c=round(($cc->monto * $cc->interes),2) ?>
                  <td style="border: 1px solid #333;">$ {{$c}}</td>
                  <?php $d=round($cc->montooriginal,2) ?>
                  <td style="border: 1px solid #333;">$ {{$d}}</td>
                  <td style="border: 1px solid #333;">{{$cc->nombreCartera}}</td>
                  
              </tr>
              @endforeach
              <tr>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"><b>TOTAL</b></td>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333; text-align: right;"><b><span class="pull-left">&nbsp;$</span> {{$total1}}</b></td>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333; text-align: right;"><b><span class="pull-left">&nbsp;$</span> {{$total3}}</b></td>
                  <td style="border: 1px solid #333; text-align: right;"><b><span class="pull-left">&nbsp;$</span> {{$total2}}</b></td>
                  <td style="border: 1px solid #333;"></td>


                  
              </tr>

          </table>
      </div>
    </div>
  </div>


  <br>
  <div class="row">
    <a href="{{URL::action('ControlCreditoController@index')}}"  class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <a href="{{ url('controlCreditoPDF', ['p1' => $desde, 'p2' => $hasta]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3"><i class="fa fa-print"> IMPRIMIR</i></a>

  </div>
  <br><br>
  

</section>
@endsection