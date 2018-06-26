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
              <tr>
                  <td style="border: 1px solid #333;"><span>1</span></td>
                  <td style="border: 1px solid #333;"><span>TEPECOYO</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 7500</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 3000</span></td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;"><span>2</span></td>
                  <td style="border: 1px solid #333;"><span>SANTA TECLA</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 11000</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 7900</span></td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;"><span>3</span></td>
                  <td style="border: 1px solid #333;"><span>ATEOS</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 2500</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 600</span></td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;"><span>4</span></td>
                  <td style="border: 1px solid #333;"><span>SACACOYO</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 8500</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 4000</span></td>
              </tr>
              <tr>
                  <td style="border: 1px solid #333;"><span>5</span></td>
                  <td style="border: 1px solid #333;"><span>LOURDES</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 5500</span></td>
                  <td style="border: 1px solid #333;" align="right"><span> 1000</span></td>
              </tr>
              <tr>
              	  <td style="border: 1px solid #333;"></td>
                  <td style="border: 1px solid #333;"><b><span>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b> $&nbsp;&nbsp;&nbsp; 35000</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b> $&nbsp;&nbsp;&nbsp; 16500</b></span></td>
              </tr>
		</table>
	</div>
</body>
</html>