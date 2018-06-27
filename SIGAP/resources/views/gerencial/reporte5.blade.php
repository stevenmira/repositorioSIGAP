<!DOCTYPE html>
<html>
<head>
	<title>Reporte 5</title>
</head>
<body>
	<div>
		<table>
			<tr>
				<th style="width: 500px;" align="center" valign="bottom">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AFIMID, S.A. DE C.V.
				</th>
				<td>
					<img src="img/log.jpg" width="180px" height="70px">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">ASESORES FINANCIEROS MICRO IMPULSADORES DE NEGOCIOS<br>SOCIEDAD ANONIMA DE CAPITAL<br>VARIABLE</td>
			</tr>
		</table>
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
      	<div align="text-right">Nombre Cartera: {{$cartera->nombre}}</div>
      	<div align="right">Ejecutivo: {{$cartera->ejecutivo}}</div>

          <table class="table table-striped table-bordered table-condensed text-centered"  style="border-collapse: collapse; " style="border: 1px solid #333;" width="100%">
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
              	@foreach ($consulta as $ca)
              	<tr style="border: 1px solid #333;text-align: center;">
                  <td style="border: 1px solid #333;text-align: center;">{{$ca->montocap}}</td>
                  <td style="border: 1px solid #333;text-align: center; width: 220px;">{{$ca->interes}}</td>
                  <td style="border: 1px solid #333;text-align: center;">{{$ca->capital}}</td>
                  <td style="border: 1px solid #333;text-align: center;">{{$ca->total}}</td>
                  <td style="border: 1px solid #333;text-align: center;">{{round($ca->mor,2)}}</td>
                </tr>
                @endforeach

              </tbody>
          </table>
      </div>
    </div>
  </div>

</body>
</html>