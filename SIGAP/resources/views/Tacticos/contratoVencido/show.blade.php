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
  
  <h4 align="center"><b>REPORTE DE CARTERA DE CLIENTES</b></h4>
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
                  <th style="border: 1px solid #333;text-align: center;">Nº</th>
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">CLIENTE/NOMBRE</th>
                  <th style="border: 1px solid #333;text-align: center;">SALDO CAPITAL</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL RECIBIDO</th>
                  <th style="border: 1px solid #333;text-align: center;">NEGOCIO</th>
                  <th style="border: 1px solid #333;text-align: center;">FECHA VENCIMIENTO</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL DEUDA</th>
                </tr>
              </thead>

              <?php
                $n=0;

                $i=0;
              ?>
              <tbody>
                @foreach ($consulta as $con)
                <?php
                $fecha_actual = $fecha_actual->format('d-m-Y');
                $anio = explode("-", $fecha_actual);
                $mes = explode("-", $fecha_actual);
                $dia = explode("-", $fecha_actual);
                $fechaven = $con->fechaultimapaga->format('d-m-Y');
                if () {
                    
                }  
                <tr>
                  <td style="border: 1px solid #333;">{{$i+1}}</td>
                  <td style="border: 1px solid #333;">{{$con->nombre}} {{$co->apellido}}</td>
                  <td style="border: 1px solid #333;">{{$con->montocapital}}</td>
                  <td style="border: 1px solid #333;">{{$con->monto}}</td>
                  <td style="border: 1px solid #333;">{{$con->nombreNegocio}}</td>
                  <td style="border: 1px solid #333;">{{$con->fechaultimapaga}}</td>
                  <td style="border: 1px solid #333;">{{$con->totalpendiente}}</td>
                </tr>
                ?>
                 @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>


@endsection