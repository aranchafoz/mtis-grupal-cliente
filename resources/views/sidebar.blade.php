<div class="sidebar" data-color="grey" data-image="{{ url("img/tesla-sidebar.png") }}">
  <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Tesla
            </a>
        </div>

        <ul class="nav">
           <li {{request()->is('contratar') ? 'class=active' : ''}}>
                <a href="{{ route("contratar") }}">
                    <i class="pe-7s-user"></i>
                    <p>Contratar personal</p>
                </a>
            </li>
             <li {{request()->is('subida') ? 'class=active' : ''}}>
                <a href="{{ route("subida") }}">
                    <i class="pe-7s-copy-file"></i>
                    <p>Subida de archivos</p>
                </a>
            </li>
             <li {{request()->is('qasoftware') ? 'class=active' : ''}}>
                <a href="{{ route("qasoftware") }}">
                    <i class="pe-7s-note2"></i>
                    <p>QA Software Apps</p>
                </a>
            </li>
            <li>
              <p class="logo">Paneles y placas</p>
            </li>
             <li {{request()->is('manufactura') ? 'class=active' : ''}}>
                <a href="{{ route("manufactura") }}">
                    <i class="pe-7s-tools"></i>
                    <p>Manufactura</p>
                </a>
            </li>
             <li {{request()->is('ecommerce') ? 'class=active' : ''}}>
                <a href="{{ route("ecommerce") }}">
                    <i class="pe-7s-portfolio"></i>
                    <p>E-commerce</p>
                </a>
            </li>
             <li {{request()->is('programacion') ? 'class=active' : ''}}>
                <a href="{{ route("programacion") }}">
                    <i class="pe-7s-timer"></i>
                    <p>Programación</p>
                </a>
            </li>
        </ul>
  </div>
</div>
