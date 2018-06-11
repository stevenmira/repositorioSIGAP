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
  
  <h4 align="center"><b>REPORTE GENERAL DE CRÉDITO COMPLETO</b></h4>
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
                    <th width="175px">FECHA DE OTORGAMIENTO</th>
                    <th >CLIENTE</th>
                    <th width="270px">NEGOCIO</th>
                    <th width="100px">MONTO</th>
                    <th width="100px">CUOTA DIARIA</th>
                    <th>CARTERA</th>
                </tr>
              </thead>

              <tr>
                  <td>25-02-2018</td>
                  <td>Carlos Alberto Mancia Galindo</td>
                  <td>Venta de típicos</td>
                  <td>$. 1500</td>
                  <td>$. 150</td>
                  <td>Tepecoyo</td>
              </tr>
              <tr>
                  <td>TOTAL</td>
                  <td></td>
                  <td></td>
                  <td>$. tot 1</td>
                  <td>$. tot 2</td>
                  <td></td>
              </tr>

          </table>
      </div>
    </div>
  </div>


  <br>
  <div class="row">
    <a href="{{URL::action('CreditoCompletoController@create')}}" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <button type="submit" class="btn btn-danger btn-md col-md-offset-3">GENERAR REPORTE</button>

  </div>
  <br><br>
  

</section>
@endsection