<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-ayuda">

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" 
            aria-label="Close">
                 <span aria-hidden="true">×</span>
            </button>
            <h2 class="modal-title"><i class="fa fa-info-circle"></i> Reporte de Control de credito </h2 >
                <blockquote>
                    Ayuda sobre el reporte
                </blockquote>

               

        <blockquote>
            <p>Recuerde este es un proceso automatico, las tasas de interes se aplicaran segun el tipo de Credito
            que usted escoja.</p>
            <p>En el caso particular del credito de tipo normal
            dependera del monto que el cliente solicite.</p>
        </blockquote>
           
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