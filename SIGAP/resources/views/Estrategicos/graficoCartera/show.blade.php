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
    <p align="right">Fecha de emision: {{$fecha_actual}}</p>
  </div>
  
  <h4 align="center"><b>CONSOLIDADO DE CARTERA</b></h4>
  <br>
  <div class="row form-group">


  </div>


  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
      	<div align="text-right">Nombre Cartera: {{$carte->nombre}}</div>
      	<div align="right">Ejecutivo: {{$carte->ejecutivo}}</div>

          <table class="table table-striped table-bordered table-condensed text-centered"  style="border-collapse: collapse; " style="border: 1px solid #333;">
              <thead>
                <tr style="border: 1px solid #333;text-align: center;">
                  <th style="border: 1px solid #333;text-align: center;">Monto</th>
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">Intereses</th>
                  <th style="border: 1px solid #333;text-align: center;">Capital</th>
                  <th style="border: 1px solid #333;text-align: center;">Total</th>
                  <th style="border: 1px solid #333;text-align: center;">Mora</th>
                </tr>
              </thead>
              <?php
                $n=0;

                $i=0;
              ?>
              <tbody>
              	@if ($carte->idcartera==1)
              	<tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">6780</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">430</td>
                  <td style="border: 1px solid #333;text-align: center;">3490</td>
                  <td style="border: 1px solid #333;text-align: center;">3920</td>
                  <td style="border: 1px solid #333;text-align: center;">120</td>
                </tr>
                @else
                @if ($carte->idcartera==2)
                <tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">5740</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">234</td>
                  <td style="border: 1px solid #333;text-align: center;">1450</td>
                  <td style="border: 1px solid #333;text-align: center;">1684</td>
                  <td style="border: 1px solid #333;text-align: center;">245</td>
                </tr>
                @else
                @if ($carte->idcartera==3)
                <tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">2610</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">354</td>
                  <td style="border: 1px solid #333;text-align: center;">3480</td>
                  <td style="border: 1px solid #333;text-align: center;">3804</td>
                  <td style="border: 1px solid #333;text-align: center;">78</td>
                </tr>
                @else

                @if ($carte->idcartera==4)
                <tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">1345</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">430</td>
                  <td style="border: 1px solid #333;text-align: center;">2968</td>
                  <td style="border: 1px solid #333;text-align: center;">3398</td>
                  <td style="border: 1px solid #333;text-align: center;">743</td>
                </tr>
                @else
                @if ($carte->idcartera==5)
                <tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">4624</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">250</td>
                  <td style="border: 1px solid #333;text-align: center;">1310</td>
                  <td style="border: 1px solid #333;text-align: center;">1560</td>
                  <td style="border: 1px solid #333;text-align: center;">140</td>
                </tr>
                @else
                @if ($carte->idcartera==6)
                <tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">3980</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">395</td>
                  <td style="border: 1px solid #333;text-align: center;">1285</td>
                  <td style="border: 1px solid #333;text-align: center;">1680</td>
                  <td style="border: 1px solid #333;text-align: center;">257</td>
                </tr>
                @endif                @endif                @endif                @endif                @endif                @endif

              </tbody>
          </table>
      </div>
    </div>
  </div>
  <br><br>
<div class="row">
    <a href="{{URL::action('GraficoController@index')}}" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <a href="{{ url('reporte5', ['p1' => $carte->idcartera ]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3"><i class="fa fa-print"> IMPRIMIR</i></a>

  </div>


@endsection