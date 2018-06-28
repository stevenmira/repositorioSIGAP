<li class="treeview">
              <a href="#">
                <i class="fa fa-info-circle"></i>
                <span>Reportes Estrategicos</span>
                 
              </a>
            </li>
            <li>
              <a href="{{URL::action('CarteraClienteGeneralController@create')}}">
                <i class="fa fa-file-text"></i> <span>Carteras de Clientes General</span>
               
              </a>
            </li>
            <li>
            <a href="{{URL::action('ControlCreditoController@index')}}">
                <i class="fa fa-file-text"></i> <span>Control de Credito</span>
                
              </a>
            </li>
            <li>
              <a href="{{URL::action('CarteraClienteExtendidoController@create')}}">
                <i class="fa fa-file-text"></i> <span>Cartera de Cliente Extendido</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('RefinanciamientoController@index')}}">
                <i class="fa fa-file-text"></i> <span>Refinanciamientos</span>
              </a>
            </li>
            <li>
              <a href="{{URL::action('GraficoController@index')}}">
                <i class="fa fa-file-text"></i> <span><small>Consolidado Mensual de Cartera</small></span>
              </a>
            </li>