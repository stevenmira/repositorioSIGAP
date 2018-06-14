<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-ayuda">

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
            aria-label="Close">
                 <span aria-hidden="true">×</span>
            </button>
            <h2 class="modal-title"><i class="fa fa-info-circle"></i> Reporte de Refinanciamientos </h2 >
                

               

        <blockquote>
            <p>Este reporte mostrara un grafico mensual de alguna cartera en especifico</p>
        </blockquote>

        <blockquote>
            <h3>¿Qué veo en la pantalla?</h3>
            <p>Aqui encontrará un calendario desplegable, por lo que debera seleccionar una fecha en especifico 
                y una cartera, para generar el grafico de ese mes.
            </p>
            
        </blockquote>
        <img class="img-square"  src="{{asset('img/modals/modal1/1.png')}}" class="img-fluid" alt="Responsive image">
        <div class="row">
        <div class="form-group">
        <div class="modal-footer">
                <input name="_token" value="{{csrf_token()}}" type="hidden"></input> 
                <a data-dismiss="modal" class="btn btn-danger btn-lg col-md-offset-2">Entendido</a>
               
        </div>
        </div>
        </div>

    </div>
</div>