@extends ('layouts.inicio')
@section('contenido')
<section class="content-header">
  <h1 style="color: #333333; font-family: 'Times New Roman', Times, serif;">
     REPORTE DE CARTERAS COMPLETA
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active"><a href="#"> Clientes</a></li>
    <li class="active">Activos</li>
  </ol>
</section>

<section class="content">

  <!-- Notificación -->
  @if (Session::has('create'))
  <div class="alert  fade in" style="background:  #ccff90;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>Los datos del cliente <b>{{ Session::get('create')}}</b> han sido guardados correctamente.</h4>
  </div>
  @endif
  <!-- Fin Notificación -->
  
  <!-- /.row -->

  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <div class="alert  fade in" style="background:  rgba(255, 235, 59, 0.7);">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <font face="Comic Sans MS,arial,verdana">Puedes realizar tus búsquedas por el  <b>Número de DUI</b> ó bien por el <b style="color: black;"> Nombre</b> ó <b style="color: black;"> Apellido</b> <b style="color: black;">Completo </b> ó <b style="color: black;"> Parcial </b> del cliente</font>
      </div>
      @include('Tacticos.carteraCompleta.search')
    </div>
  </div>


<div class="row">
  <a href="#" class="btn btn-danger btn-lg col-md-offset-2"><i class="fa fa-chevron-left" aria-hidden="true"></i> Atrás</a>
</div>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h3 style="text-align:center; font-family:  Times New Roman, sans-serif; color: #1C2331; float: right;"><b>{{$fecha_actual}}</b></h3>
  </div>
</div>

</section>



@endsection