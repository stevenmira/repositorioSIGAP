<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Refinanciamientos</title>
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
					Fecha de Emision: {{$fecha_actual}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
		</table>
	</div>
	<br>
	<div><h4 align="center"><b>REPORTE DE REFINANCIAMIENTOS</b></h4></div>
	<div> 
		<p style="font-size: 14px;" align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Fecha de Inicio</b> {{$desde}} 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Fecha Fin: </b> {{$hasta}}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			
		</p>
    </div>
	<div>
		<table align="center" style="width: 90%; border-collapse: collapse;">
			<thead>
                <tr style="border: 1px solid #333;text-align: center;">
                  <th style="border: 1px solid #333;text-align: center;"><span>Nº</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>CLIENTE/NOMBRE</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>NEGOCIO</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>SALDO CAPITAL (PREVIO)</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>MORA</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>CUOTA DIARIA</span></th>
                  <th style="border: 1px solid #333;text-align: center;"><span>INTERES</span></th>
                  
                </tr>
              </thead>

              <?php
                $n=0;

               
              ?>
              <tbody>
                @foreach ($clientes as $con)
                <tr>
                  <?php $n=$n+1?>
                  <td style="border: 1px solid #333;"><span>{{ $n }}</span></td>

                  <td style="border: 1px solid #333;"><span>{{ $con->nombre }} {{ $con->apellido }}</span></td>
                  
                  
                  <td style="border: 1px solid #333; text-align: right;"><span>{{ $con->nombreNegocio}}</span></td>
                  <?php $ant = round($con->anterior,2) ?>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $ant }}</span></td>
                  <?php $mr = round($con->mora,2) ?>
                  <td style="border: 1px solid #333; text-align: right;"><span>$&nbsp;&nbsp;{{ $mr}}</span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span>{{$con->cuotadiaria}}</span></td>
       
                  <td style="border: 1px solid #333; text-align: right;"><span>{{$con->interes *100  }}%</span></td>
               
                
                </tr>
                 
                @endforeach
                <tr style="color: black;">
                  <td style="border: 1px solid #333"></td>
                  <td style="border: 1px solid #333"><span><b>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b></b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{ $total2}}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b>$&nbsp;&nbsp;{{ $total1}}</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b></b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span><b></b></span></td>
                  
                   
                </tr>
              </tbody>
		</table>
	</div>
</body>
</html>