<!DOCTYPE html>
<html>
<head>
	<title>Reporte Clasificacion de Clientes</title>
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
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<img src="img/log.jpg" width="180px" height="70px">
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
        <b>Fecha Emisión:</b>{{$fecha_actual}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
		</table>
	</div>
	<br>
	<div><h4 align="center"><b>REPORTE CLASIFICACION DE CLIENTES</b></h4></div>
	<div> 
		<p style="font-size: 14px;" align="left">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Cartera</b> {{$cartera->nombre}} 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Ejecutivo:</b> {{$cartera->ejecutivo}}
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<b>Supervisor:</b> {{$cartera->supervisor}}-->
		</p>
    </div>
	<div>
		<table align="center" style="width: 90%; border-collapse: collapse;">
            <thead>
                <tr style="border: 1px solid #333;text-align: center;">
                <th style="border: 1px solid #333;text-align: center;">Nº</th>
                  <th style="border: 1px solid #333;text-align: center; width: 190px;">NEGOCIO</th>
                  <th style="border: 1px solid #333;text-align: center; width: 190px;">NOMBRE</th>
                  <th style="border: 1px solid #333;text-align: center;">CUOTAS ATRASADAS</th>
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
              <!--  <tr style="color: black;">
                  <td style="border: 1px solid #333"><span><b>TOTAL</b></span></td>
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de Intereses" class="rojo total"> <b></b></a></td>
                
                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de Intereses" class="rojo total"> <b></b></a></td>

                  <td style="border: 1px solid #333; text-align: right;"><span class="pull-left">&nbsp;$</span><a style="color: black;" href="#" data-title="Total de cuota capital" class="rojo total"> <b></b></a></td>
                  <td style="border: 1px solid #333"></td>
            </tr>-->
              </tbody>
		</table>
	</div>
</body>
</html>