<!DOCTYPE html>
<html>
<head>
	<title>Reporte Cartera de Clientes Extendido</title>
	<style type="text/css">
		@page{
			margin-top: 7.0mm;
            margin-left: 7.0mm;
            margin-right: 7.0mm;
            margin-bottom: 7.0mm;

		}
		span{
			font-size: 12px;
		}
	</style>
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
	<br>
	<div style="width: 100%">
		<table style="width: 100%">
			<tr>				
				<td align="right">
					{{$fecha_actual}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
		</table>
	</div>
	<br>
	<div><h4 align="center"><b>REPORTE CARTERA DE CLIENTES EXTENDIDO</b></h4></div>
	<div> 
		<p style="font-size: 14px;" align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Fecha de inicio:</b> {{$desde}} 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Fecha Fin:</b> {{$hasta}}
		</p>
    </div>
	<div>
		<table align="center" style="width: 90%; border-collapse: collapse;">
			<tr>
				<th style="border: 1px solid #333;" width="40px"><span>NO.</span></th>
                <th style="border: 1px solid #333;"><span>CARTERA</span></th>
                <th style="border: 1px solid #333;" width="150px"><span>SALDO CAPITAL</span></th>
                <th style="border: 1px solid #333;" width="150px"><span>MORA</span></th>
			</tr>
			<?php $cont = 1;?>
			@foreach ($carteraExtendido as $con)
              <tr>
                  <td style="border: 1px solid #333;"><span>{{$cont}}</span></td>
                  <td style="border: 1px solid #333;"><span>{{ $con->nombre }}</span></td>

                  @if( $con->monto != null)
				  <?php $b=round($con->monto,2) ?>
                  <td style="border: 1px solid #333;" align="right"><span>$ {{ $b }}</span></td>
                  @else
                  <td style="border: 1px solid #333;" align="right"><span>$ 0</span></td>
                  @endif

                  @if( $con->mora != null)
				  <?php $c=round($con->mora,2) ?>
                  <td style="border: 1px solid #333;" align="right"><span>$ {{ $c }}</span></td>
                  @else
                  <td style="border: 1px solid #333;" align="right"><span>$ 0</span></td>
                  @endif
              </tr>
              <?php $cont = $cont + 1; ?>
            @endforeach
              <tr>
              	  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"><b><span>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b> $&nbsp;&nbsp;&nbsp; {{$sumaMonto}}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b> $&nbsp;&nbsp;&nbsp; {{$sumaMora}}</b></span></td>
              </tr>
		</table>
	</div>
</body>
</html>