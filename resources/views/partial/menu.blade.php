
<!-- menu profile quick info -->
  <div class="profile clearfix">
    <div class="profile_pic">
      <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Bienvenido,</span>
      <h2>{{ Auth::User()->persona->nombre }}
        <span class="caret">{{ Auth::User()->getRoleDisplayNames() }} </span>
      </h2>
    </div>
  </div>
<!-- /menu profile quick info -->
  <br />
<!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li >
          <a href="{{ route('home.index')}}" >
            <i class="fa fa-home"></i>
              Inicio
          </a>
        </li>
        <li class="{{ setActiveroute('persona*')}}">
            <a>
              <i class="fa fa-cogs"></i>Configuracion<span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu" style="{{ openmenu('persona*')}}">
              <li class="" >
                <a class="" href="{{route('persona.index')}}">Usuarios</a>
              </li>
              <li>
                <a class=""  href="{{route('persona.usuarios.roles.index')}}">Roles</a>
              </li>

            </ul>
        </li>
        <li class="{{ setActiveroute('almacen*')}}">
          <a>
            <i class="fa fa-store"></i>
              Catalogo
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('almacen*')}}">
              <li class="{{ setActiveroute('almacen.producto*')}}">
                <a class="" href="{{route('almacen.producto.index')}}  ">
                  Productos
                </a>
              </li>
              <li class="{{ setActiveroute('almacen.proveedor*')}}">
                <a class="" href="{{route('almacen.proveedor.index')}}  ">
                  Proveedores
                </a>
              </li>
              <li class="{{ setActiveroute('almacen.categorias*')}}">
                <a class="" href="{{route('almacen.categorias.index')}}">
                  Categorias
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveroute('compras*')}}">
          <a>
            <i class="fa fa-shopping-cart"></i>
              Compras
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('compras*')}}">
              <li class="{{ setActiveroute('compras*')}}">
                <a class="" href="{{route('compras.orden.index')}}  ">
                  Orden de compra
                </a>
              </li>
               <li class="{{ setActiveroute('compra.ingresar*')}}">
                <a class="" href="{{route('compra.orden.ingresar')}}  ">
                  Ingresar Orden
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveroute('ventas*')}}">
          <a>
            <i class="fa fa-file-invoice"></i>
              Ventas
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('ventas*')}}">
               <li class="{{ setActiveroute('ventas.facturar*')}}">
                <a class="" href="{{route('ventas.facturar')}}">
                 Facturar
                </a>
              </li>
              <li class="{{ setActiveroute('ventas.index*')}}">
                <a class="" href="{{route('ventas.index')}}">
                 Facturas
                </a>
              </li>
            </ul>
        </li>
        <li class="{{ setActiveroute('inventario*')}}">
          <a>
            <i class="fa fa-boxes"></i>
              inventario
              <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu " style="{{ openmenu('inventario*')}}">
              <li class="{{ setActiveroute('inventario*')}}">
                <a class="" href="{{route('inventario.stock')}}">
                  Stock
                </a>
              </li>
              {{--  <li class="{{ setActiveroute('compra.ingresar*')}}">
                <a class="" href="{{route('compra.orden.ingresar')}}  ">
                  Ingresar Orden
                </a>
              </li> --}}
            </ul>
        </li>
      </ul>
    </div>
  </div>
<!-- /sidebar menu -->