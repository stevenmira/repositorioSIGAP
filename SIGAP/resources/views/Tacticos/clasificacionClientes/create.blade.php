@extends ('layouts.inicio')
@section('contenido')
<style>
  .errors{
    background-color: #fcc;
    border: 1px solid #966;
  }
</style>

<br>    

  <div class="row">
        <!-- <img align="right"  src="{{asset('img/log.jpg')}}" width="180px" height="70px"> -->
        <h4 align="center"> <b>AFIMID, S.A. DE C.V.</b></h4>
        <h4 colspan="2" align="center">
          ASESORES FINANCIEROS MICRO IMPULSADORES DE NEGOCIOS<br>SOCIEDAD ANONIMA DE CAPITAL<br>VARIABLE
        </h4>
  </div>

<section class="content-header">
  <div class="row">
    <p class="col-md-4 col-lg-4 col-sm-4"><b>Fecha de emision:</b> {{$fecha_actual}}</p>
    <p class="col-md-3 col-lg-3 col-sm-3 col-md-offset-5"><b>Usuario:</b> Juan Pérez</p>
  </div>
  <br>

  <h1 align="center">REPORTE CLASIFICACIÓN DE CLIENTES</h1>
  <br>

  {!!Form::open(array('url'=>'clasificacion/clientes','method'=>'POST','autocomplete'=>'off'))!!}
  {{Form::token()}}

  
@if (Session::has('msj'))
  <div class="row">
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="errors">
        <ul>
          <p><b>Por favor, corrige lo siguiente:</b></p>
          <li>{{ Session::get('msj')}}</li>
        </ul>
      </div>
    </div>
  </div>
@endif

  <div class="row">
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      @if(count($errors) > 0)
      <div class="errors">
        <ul>
          <p><b>Por favor, corrige lo siguiente:</b></p>
          <?php $cont = 1; ?>
        @foreach($errors->all() as $error)
          <li>{{$cont}}. {{ $error }}</li>
          <?php $cont=$cont+1; ?>
        @endforeach
        </ul>
      </div>
    @endif
    </div>
  </div>
  <br>

  <div class="row col-md-12">

    <div class="form-group col-md-3">
        <div class="form-group">
        <label>CARTERA</label>
            <select name="idcartera"  class="form-control selectpicker" id="idcliente" data-Live-search="true">
            @foreach($carteras as $cartera)
            <option value="{{ $cartera->idcartera }}">{{$cartera->nombre}}</option>
            @endforeach
          </select>
        </div>
    </div>

</div>

  <br>
  <div class="row">
    <a href="" class="btn btn-primary btn-md col-md-offset-1"> REGRESAR</a>
    
    <input name="_token" value="{{csrf_token()}}" type="hidden"></input>
    <button type="submit" class="btn btn-danger btn-md col-md-offset-3">GENERAR REPORTE</button>

    <a href="" class="btn btn-success btn-md col-md-offset-3" data-target="#modal-delete-1" data-toggle="modal">AYUDA</a>

    @include('Tacticos.clasificacionClientes.modal')
  </div>
  <br><br>
  {!!Form::close()!!}

</section>
@endsection