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
  
  <h4 align="center"><b>REPORTE DE CLASIFICACION DE EJECUTIVOS</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp; José Castro</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Supervisor:</b>&nbsp;&nbsp;&nbsp; Pedro Lopéz</p>
  </div>


  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed text-centered" style="border: 1px solid #333;">
              <thead>
                <tr style="border: 1px solid #333;text-align: center;">
                  <th style="border: 1px solid #333;text-align: center;">Nº</th>
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">EJECUTIVO</th>
                  <th style="border: 1px solid #333;text-align: center;">CARTERA ASIGNADA</th>
                  <th style="border: 1px solid #333;text-align: center;">CANTIDAD DE CLIENTES</th>
                  <th style="border: 1px solid #333;text-align: center;">CANTIDAD DE PAGOS</th>
                  <th style="border: 1px solid #333;text-align: center;">CLASIFICACION</th>
                </tr>
              </thead>
              <?php
                $n=0;

                $i=0;
                $min = 200;
                $max = 1200;
                $run = rand ( $min , $max );
                $ran = rand ( 3 , 16 );
              ?>
              <tbody>
                @foreach ($consulta as $ca)
                @if ($ca->nom > 50 && $ide='A')
                <tr>
                  <td style="border: 1px solid #333;">{{$i+1}}</td>
                  <td style="border: 1px solid #333;">{{$ca->eje}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nome}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nom}}</td>
                  <td style="border: 1px solid #333;">{{$ca->mon}}</td>
                  <td style="border: 1px solid #333;">A</td>
                </tr>
                @else
                @if ($ca->nom > 30 && $ca->nom <= 50 && $ide='B')
                <tr>
                  <td style="border: 1px solid #333;">{{$i+1}}</td>
                  <td style="border: 1px solid #333;">{{$ca->eje}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nome}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nom}}</td>
                  <td style="border: 1px solid #333;">{{$ca->mon}}</td>
                  <td style="border: 1px solid #333;">B</td>
                </tr>
                @else
                @if ($ca->nom > 20 && $ca->nom <= 30 && $ide='C')
                <tr>
                  <td style="border: 1px solid #333;">{{$i+1}}</td>
                  <td style="border: 1px solid #333;">{{$ca->eje}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nome}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nom}}</td>
                  <td style="border: 1px solid #333;">{{$ca->mon}}</td>
                  <td style="border: 1px solid #333;">C</td>
                </tr>
                @else
                @if ($ca->nom <= 20 && $ide='D')
                <tr>
                  <td style="border: 1px solid #333;">{{$i+1}}</td>
                  <td style="border: 1px solid #333;">{{$ca->eje}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nome}}</td>
                  <td style="border: 1px solid #333;">{{$ca->nom}}</td>
                  <td style="border: 1px solid #333;">{{$ca->mon}}</td>
                  <td style="border: 1px solid #333;">D</td>
                </tr>
                @endif
                @endif
                @endif
                @endif
              @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
<div class="row">
    <a href="{{URL::action('ClasificacionEjecutivosController@index')}}" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <a href="{{ url('reporte10', ['p1' => $ide ]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3"><i class="fa fa-print"> IMPRIMIR</i></a>

  </div>


@endsection