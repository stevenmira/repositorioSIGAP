<!DOCTYPE html>
<html>
<head>
	<title>Reporte 10</title>
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
	
	  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed text-centered" style="border-collapse: collapse;" style="border: 1px solid #333;">
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
</body>
</html>