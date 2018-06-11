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
                  <th style="border: 1px solid #333;text-align: center;">INTERES DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">CAPITAL DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL RECIBIDO DIARIO</th>
                  <th style="border: 1px solid #333;text-align: center;">#CUOTAS ATRASADAS</th>
                  <th style="border: 1px solid #333;text-align: center;">PRECIO DE CUOTA</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL CUOTAS ATRASADAS</b></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="border: 1px solid #333;">1</td>
                  <td style="border: 1px solid #333;">Juan Rodrigo Galindo Ordoñez</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span> 300</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span> 300</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span> 300</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span> 300</td>
                  <td style="border: 1px solid #333; text-align: right;">4</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span> 300</td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span> 300</td>
                </tr>
                <tr>
                  <td style="border: 1px solid #333"><span><b>TOTAL</b></span></td>
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a href="#" data-title="Total de Intereses" class="rojo total"> <b>tot. 0</b></a></td>
                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a href="#" data-title="Total de Intereses" class="rojo total"> <b>tot. 1</b></a></td>

                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a href="#" data-title="Total de cuota capital" class="rojo total"> <b>tot.2</b></a></td>

                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a href="#" data-title="Total diario" class="rojo total"> <b>tot. 3</b> </a></td>
                   <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a href="#" data-title="Total diario" class="rojo total"> <b>tot. 4</b> </a></td>
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
    <button type="submit" class="btn btn-danger btn-md col-md-offset-3">GENERAR REPORTE</button>

  </div>
  <br><br>
  

</section>
@endsection