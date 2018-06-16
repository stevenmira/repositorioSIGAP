<!DOCTYPE html>
<html>
<head>
	<title>Reporte Cartera de Clientes</title>
	<style type="text/css">
		@page{
			margin-top: 7.0mm;
            margin-left: 7.0mm;
            margin-right: 7.0mm;
            margin-bottom: 7.0mm;

		}
		span{
			font-size: 11px;
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
	<div><h4 align="center"><b>REPORTE DE CARTERA DE CLIENTES</b></h4></div>
	<div> 
		<p style="font-size: 14px;" align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Cartera</b> {{$cartera->nombre}} 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Fecha:</b> {{$fecha}}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Ejecutivo:</b> {{$cartera->ejecutivo}}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Supervisor:</b> {{$cartera->supervisor}}
		</p>
    </div>
	<div>
		<table align="center" style="width: 90%; border-collapse: collapse;">
			<thead>
                <tr style="border: 1px solid #333;text-align: center;">
                  <th style="border: 1px solid #333;text-align: center;"><span>Nº</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>CLIENTE/NOMBRE</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>SALDO CAPITAL</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>INTERES DIARIO</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>CAPITAL DIARIO</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>TOTAL RECIBIDO DIARIO</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>#CUOTAS ATRASADAS</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>PRECIO DE CUOTA</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>TOTAL CUOTAS ATRASADAS</span></b></th>
                </tr>
              </thead>

              <?php
                $sum_saldo_capital=0;
                $sum_interes_diario=0;
                $sum_capital_diario=0;
                $sum_recibo_diario=0;
                $sum_total_atrasadas=0;

                $n=0;

                $i=0;
              ?>
              <tbody>
                @foreach ($consulta as $con)
                <tr>
                  <?php $n=$n+1?>
                  <td style="border: 1px solid #333;"><span>{{ $n }}</span></td>

                  <td style="border: 1px solid #333;"><span>{{ $con->nombre }} {{ $con->apellido }}</span></td>
                  
                  <?php $saldo_capital = $con->monto - $con->cuotacapital; ?>
                  @if($con->monto == null)
                  <?php 
                     $sum_saldo_capital = $sum_saldo_capital + $array2[$i];
                  ?>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $array2[$i] }}</span></td>
                  @else
                  <?php 
                     $sum_saldo_capital = $sum_saldo_capital + $saldo_capital;
                  ?>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $saldo_capital }}</span></td>
                  @endif


                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $con->interes }}</span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $con->cuotacapital }}</span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $con->totaldiario }}</span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span>{{$array[$i]}}</span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $con->cuotadiaria }}</span></td>
                  <?php $total = $array[$i] * $con->cuotadiaria ?>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $total }}</span></td>
                </tr>
                  <?php 
                     $sum_interes_diario = $sum_interes_diario + $con->interes; 
                     $sum_capital_diario = $sum_capital_diario + $con->cuotacapital;
                     $sum_recibo_diario =  $sum_recibo_diario+  $con->totaldiario;
                     $sum_total_atrasadas = $sum_total_atrasadas + $total;

                     $i = $i + 1;

                  ?>
                @endforeach
                <tr style="color: black;">
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333"><span><b>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{ $sum_saldo_capital }}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{$sum_interes_diario}}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{ $sum_capital_diario}}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{  $sum_recibo_diario }}</b></span></td>
                   <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{  $sum_total_atrasadas }}</b></span></td>
                </tr>
              </tbody>
		</table>
	</div>
</body>
</html>