
           <li class="treeview">
              <a href="#">
                <i class="fa fa-info-circle"></i>
                <span>Reportes Tactico</span>
                 
              </a>
            </li>
            <li>
              <a href="{{URL::action('CarteraClienteController@create')}}">
                <i class="fa fa-file-text"></i> <span>Cartera de Clientes</span>
               
              </a>
            </li>
            <li>
              <a href="{{URL::action('CreditoCompletoController@create')}}">
                <i class="fa fa-file-text"></i> <span>Creditos Completo</span>
                
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-file-text"></i> <span>Clientes Morosos</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('ContratoVencidoController@index')}}">
                <i class="fa fa-file-text"></i> <span>Contratos Vencidos</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('ClasificacionEjecutivosController@index')}}">
                <i class="fa fa-file-text"></i> <span><small>Clasificacion de Ejecutivos</small></span>
              </a>
            </li>