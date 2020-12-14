<aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu">
        <li class="active">
          <a class="" href="index.html">
              <i class="icon_house_alt"></i>
              <span>Inicio</span>
          </a>
        </li>
        <li class="sub-menu">
          <a href="{{ url('verEscritor') }}" class="">
              <i class="icon_profile"></i>
              <span>Autores</span>
          </a>
        </li>
        <li class="sub-menu">
          <a href="{{ url('verLibros') }}" class="">
              <i class="icon_book_alt"></i>
              <span>Libros</span>
          </a>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
                        {{-- <i class="icon_gift_alt"></i> --}}
                        <i class="icon_ribbon_alt"></i>
                        {{-- <i class="icon_bag_alt"></i>
                        <i class="icon_cart_alt"></i>
                        <i class="icon_mic_alt"></i> --}}
                        <span>Eventos</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
          <ul class="sub">
            <li><a class="" href="{{ url('altaEvento')}}">Crear Alta</a></li>
            <li><a class="" href="{{ url('verEventos')}}">Ver Lista</a></li>
            {{-- <li><a class="" href="grids.html">Grids</a></li> --}}
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
              <i class="icon_creditcard"></i>
              <span>Promociones</span>
              <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="{{ url('altaPromocion')}}">Crear Alta</a></li>
            <li><a class="" href="{{ url('verPromocion')}}">Ver Lista</a></li>
            {{-- <li><a class="" href="grids.html">Grids</a></li> --}}
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
              <i class="icon_bag_alt"></i>
              <span>Costos de Envío</span>
              <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="{{ url('altaCostoEnvio')}}">Crear Alta</a></li>
            <li><a class="" href="{{ url('verCostoEnvio')}}">Ver Lista</a></li>
            {{-- <li><a class="" href="grids.html">Grids</a></li> --}}
          </ul>
        </li>
        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon_documents_alt"></i>
              <span>Libros - PDF</span>
              <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a class="" href="basic_table.html">Basic Table</a></li>
          </ul>
        </li>
        <li class="sub-menu">
          <a href="{{ url('verPedidos')}}" class="">
              <i class="icon_profile"></i>
              <span>Pedidos</span>
              <span class="menu-arrow arrow_carrot-right"></span>
          </a>
        </li>
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>