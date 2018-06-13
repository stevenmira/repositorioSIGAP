            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text"></i>
                <span>Reportes Tacticos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               <li><a  href="{{URL::action('CarteraClienteController@create')}}"><i class="fa fa-circle-o">
               </i>Cartera de Clientes</a></li>
               <li><a  
                href="{{URL::action('CreditoCompletoController@create')}}"><i class="fa fa-circle-o">
                </i>Creditos Completo 
                </a></li>
               <li><a  href=""><i class="fa fa-circle-o"></i>Clientes Morosos </a></li>
               <li><a  href=""><i class="fa fa-circle-o"></i>Contratos Vencidos</a></li>
               <li><a  href=""><i class="fa fa-circle-o"></i>Clasificacion de Clientes</a></li>
               <li><a  href=""><i class="fa fa-circle-o"></i>Clasificacion de Ejecutivos</a></li>
              </ul>
            </li>
            <li>
              <a href="">
                <i class="fa fa-plus-square"></i> 
                <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
              <ul class="treeview-menu">

                <li><a  href=""><i class="fa fa-circle-o"></i> Manual de Usuario</a></li>

              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>