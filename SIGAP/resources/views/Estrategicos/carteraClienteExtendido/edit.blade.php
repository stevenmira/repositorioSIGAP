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
  
  <h4 align="center"><b>REPORTE GENERAL DE CARTERAS DE CLIENTES EXTENDIDO</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-4 col-lg-4 col-sm-4"><b>Fecha de inicio:</b> {{$desde}}</p>
    <p class="col-md-3 col-lg-3 col-sm-3 col-md-offset-1"><b>Fecha Fin:</b> {{$hasta}}</p>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <tr>
                    <th style="border: 1px solid #333;" width="75px">NO.</th>
                    <th style="border: 1px solid #333;">CARTERA</th>
                    <th style="border: 1px solid #333;" width="175px">SALDO CAPITAL</th>
                    <th style="border: 1px solid #333;" width="175px">MORA</th>
                </tr>
              </thead>

              <?php $cont = 1;?>
              @foreach ($carteraExtendido as $con)
                <tr>
                    <td style="border: 1px solid #333;">{{$cont}}</td>
                    <td style="border: 1px solid #333;">{{ $con->nombre }}</td>

                    @if( $con->monto != null)
                    <?php $b=round($con->monto,2) ?>
                    <td style="border: 1px solid #333;" align="right">$ {{ $b}}</td>
                    @else
                    <td style="border: 1px solid #333;" align="right">$ 0</td>
                    @endif

                    @if( $con->mora != null)
                    <?php $c=round($con->mora,2) ?>
                    <td style="border: 1px solid #333;" align="right">$ {{ $c }}</td>
                    @else
                    <td style="border: 1px solid #333;" align="right">$ 0</td>
                    @endif
                </tr>
                <?php $cont = $cont + 1; ?>
              @endforeach

              <tr>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"><b><span>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>{{$sumaMonto}}</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span>
                  {{$sumaMora}}</td>
              </tr>
          </table>
      </div>
    </div>
  </div>


  <br>
  <div class="row">
    <a href="{{URL::action('CarteraClienteExtendidoController@create')}}" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <a href="{{ url('carteraClienteExtendidoPDF', ['p1' => $desde, 'p2' => $hasta]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3"><i class="fa fa-print"> IMPRIMIR</i></a>

  </div>
  <br><br>
  

</section>
@endsection