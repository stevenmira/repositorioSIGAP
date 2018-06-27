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
    <p class="col-md-4 col-lg-4 col-sm-4 col-lg-offset-9 col-md-offset-9"><b>Fecha Emision:</b>{{$fecha_actual}}</p>
  </div>
  
  <h4 align="center"><b>REPORTE DE CLASIFICACIÓN DE CLIENTES</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Cartera:</b>&nbsp;&nbsp;&nbsp; {{$cartera->nombre}}</p>
    <!--<p class="col-md-3 col-lg-3 col-sm-3"><b>Fecha:</b>&nbsp;&nbsp;&nbsp;</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Ejecutivo:</b>&nbsp;&nbsp;&nbsp; José Castro</p>
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Supervisor:</b>&nbsp;&nbsp;&nbsp; Pedro Lopéz</p>
  -->
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed text-centered" style="border: 1px solid #333;">
              <thead>
                <tr style="border: 1px solid #333;text-align: center;">
                 <th style="border: 1px solid #333;text-align: center;">Nº</th>
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">NEGOCIO/NOMBRE</th>
                  <th style="border: 1px solid #333;text-align: center; width: 220px;">NOMBRE/APELLIDO</th>
                  <th style="border: 1px solid #333;text-align: center;">TOTAL CUOTAS ATRASADAS</th>
                  <th style="border: 1px solid #333;text-align: center;">PRESTAMO VENCIDO</th>
                  <th style="border: 1px solid #333;text-align: center;">CLASIFICACIÓN</th>
                </tr>
              </thead>
              <?php
                $n=0;

                $i=0;
              ?>
              <tbody>
                @foreach ($consulta2 as $con)
                <tr>
                <?php $n=$n+1?>
                  <td style="border: 1px solid #333;">{{ $n }}</td>
                  <td style="border: 1px solid #333;">{{$con->nnegocio}}</td>
                  <td style="border: 1px solid #333;">{{$con->nombre}} {{$con->apellido}}</td>             
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>{{$con->estado}}</td>
                  @if($con->estadodos=='VENCIDO'&& $con->estado<=2)
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>Sí</td>                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>C</td>
                
                  @endif
                  @if($con->estadodos=='VENCIDO'&& $con->estado>2)
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>Sí</td>                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>D</td>
                
                  @endif
                  @if($con->estadodos=='ACTIVO' && $con->estado<=2)
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>NO</td> 
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>A</td>
                  @endif
                  @if($con->estadodos=='ACTIVO' && $con->estado>2)
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>NO</td>                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;</span>B</td>
                  @endif
                  
                 </tr>  
                @endforeach
               <!-- <tr style="color: black;">
                  <td style="border: 1px solid #333"><span><b>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de Intereses" class="rojo total"> <b></b></a></td>
                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de Intereses" class="rojo total"> <b></b></a></td>

                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de cuota capital" class="rojo total"> <b></b></a></td>
                  <td style="border: 1px solid #333"></td>
            </tr>-->
              </tbody>
          </table>
      </div>
    </div>
  </div>


  <br>
  <div class="row">
    <a href="{{URL::action('ClasificacionClienteController@create')}}" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <a href="{{ url('clasificacionClientePDF', ['p1' =>$cartera->idcartera, 'p2' =>$fecha_actual ]) }}" target="_blank" class="btn btn-danger btn-md col-md-offset-3"><i class="fa fa-print"> IMPRIMIR</i></a>

  </div>
  <br><br>
  

</section>
@endsection