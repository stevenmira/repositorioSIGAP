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

              <tr>
                  <td style="border: 1px solid #333;">1</td>
                  <td style="border: 1px solid #333;">TEPECOYO</td>
                  <td style="border: 1px solid #333;" align="right"> 7500</td>
                  <td style="border: 1px solid #333;" align="right"> 3000</td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;">2</td>
                  <td style="border: 1px solid #333;">SANTA TECLA</td>
                  <td style="border: 1px solid #333;" align="right"> 11000</td>
                  <td style="border: 1px solid #333;" align="right"> 7900</td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;">3</td>
                  <td style="border: 1px solid #333;">ATEOS</td>
                  <td style="border: 1px solid #333;" align="right"> 2500</td>
                  <td style="border: 1px solid #333;" align="right"> 600</td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;">4</td>
                  <td style="border: 1px solid #333;">SACACOYO</td>
                  <td style="border: 1px solid #333;" align="right"> 8500</td>
                  <td style="border: 1px solid #333;" align="right"> 4000</td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;">5</td>
                  <td style="border: 1px solid #333;">LOURDES</td>
                  <td style="border: 1px solid #333;" align="right"> 5500</td>
                  <td style="border: 1px solid #333;" align="right"> 1000</td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"><b>TOTAL</b></td>
                  <td style="border: 1px solid #333; text-align: right;"><b><span class="pull-left">&nbsp;$</span> 35000</b></td>
                  <td style="border: 1px solid #333; text-align: right;"><b><span class="pull-left">&nbsp;$</span> 16000</b></td>
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