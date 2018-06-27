<!DOCTYPE html>
<html>
<head>
	<title>Reporte 9</title>
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
    <p class="col-md-2 col-lg-2 col-sm-2 col-lg-offset-10 col-md-offset-10">{{$fecha_actual}}</p>
  </div>
  
  <h4 align="center"><b>REPORTE DE CARTERA DE CLIENTES</b></h4>
  <br>
  <div class="row form-group">
    <p class="col-md-3 col-lg-3 col-sm-3"><b>Cartera:</b>&nbsp;&nbsp;&nbsp; {{$cartera->nombre}}</p>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed text-centered" style="border-collapse: collapse;"  style="border: 1px solid #333;">
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
                <tr>
                  <td style="border: 1px solid #333;">{{$i+1}}</td>
                  <td style="border: 1px solid #333;">{{$con->nomcli}} {{$con->ape}}</td>
                  <td style="border: 1px solid #333;">{{$con->monto}}</td>
                  <td style="border: 1px solid #333;">{{$con->monto - $con->deuda}}</td>
                  <td style="border: 1px solid #333;">{{$con->negono}}</td>
                  <td style="border: 1px solid #333;">{{$con->fecha}}</td>
                  <td style="border: 1px solid #333;">{{$con->deuda}}</td>
                </tr>
                
                 @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
</body>
</html>