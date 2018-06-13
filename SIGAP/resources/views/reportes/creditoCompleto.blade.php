<!DOCTYPE html>
<html>
<head>
	<title>Reporte Creditos Completos</title>
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
	<div><h4 align="center"><b>REPORTE GENERAL DE CRÉDITO COMPLETO</b></h4></div>
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
				<th style="border: 1px solid #333;"><span>FECHA</span></th>
                <th style="border: 1px solid #333;"><span>CLIENTE</span></th>
                <th style="border: 1px solid #333;"><span>NEGOCIO</span></th>
                <th style="border: 1px solid #333;"><span>MONTO</span></th>
                <th style="border: 1px solid #333;"><span>CUOTA DIARIA</span></th>
                <th style="border: 1px solid #333;"><span>CARTERA</span></th>
			</tr>
			@foreach ($creditosCompletos as $cc)
              <tr>
                  <td style="border: 1px solid #333;"><span>{{$cc->fecha}}</span></td>
                  <td style="border: 1px solid #333;"><span>{{$cc->nombre}} {{$cc->apellido}}</span></td>
                  <td style="border: 1px solid #333;"><span>{{$cc->nombreNegocio}}</span></td>
                  <td style="border: 1px solid #333;" align="right"><span>{{$cc->monto}}</span></td>
                  <td style="border: 1px solid #333;" align="right"><span>{{$cc->cuotadiaria}}</span></td>
                  <td style="border: 1px solid #333;"><span>{{$cc->nombreCartera}}</span></td>
              </tr>
              @endforeach
              <tr>
                  <td style="border: 1px solid #333;"><b><span>TOTAL</b></span></td>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b><span class="pull-left">&nbsp;$</span> {{$total1}}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b><span class="pull-left">&nbsp;$</span> {{$total2}}</b></span></td>
                  <td style="border: 1px solid #333;"></td>
              </tr>
		</table>
	</div>
</body>
</html>