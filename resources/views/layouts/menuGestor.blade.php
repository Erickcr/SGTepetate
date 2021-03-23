<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SGTepetate</title>

  <link rel="icon" href="{{asset('/img/logo.png')}}" type="image/icon type">


  <!-- Custom fonts for this template-->
  <link href="{{asset('temaGestor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('temaGestor/css/app.css')}}" rel="stylesheet">

  @yield('importOwl')

</head>

<body id="page-top" @yield('codigoBody')>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/sgtepetate">
        <div class="sidebar-brand-icon">
          <img src="{{asset('img/logo.png')}}" class="imgMenuGestor">
        </div>
        <div class="sidebar-brand-text mx-3">SGTepetate</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ Request::path() ==  'sgtepetate' ? 'active' : ''  }}">
        <a class="nav-link" href="/sgtepetate">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Gestión de la granja
      </div>

      <!-- Nav Item - Usuarios Collapse Menu -->
      @if (Auth::user()->havePermission('gestionUsuario.index'))
      <li class="nav-item
          @php
            if(strpos(Request::path(),'sgtepetate/Usuarios') !== false )
              echo 'active';
          @endphp
        ">
        <a class="nav-link" href="/sgtepetate/Usuarios">
          <i class="fas fa-users"></i>
          <span>Usuarios</span>
        </a>
      </li>
      @endif

      <li class="nav-item {{ Request::path() ==  'sgtepetate/perfil' ? 'active' : ''  }}">
        <a class="nav-link" href="/sgtepetate/perfil">
          <i class="fas fa-user"></i>
          <span>Perfil</span>
        </a>
      </li>

      <!-- Nav Item - Bitacora Collapse Menu -->
      <li class="nav-item 
      @php
            if(strpos(Request::path(),'sgtepetate/gestionBitacora') !== false )
              echo 'active';
              else if(strpos(Request::path(),'sgtepetate/gestionTarea') !== false )
              echo 'active';
          @endphp
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBitacora" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-clipboard-list"></i>
          <span>Bitácora</span>
        </a>
        <div id="collapseBitacora" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/sgtepetate/gestionBitacora">Ver Bitácora</a>
            <a class="collapse-item" href="/sgtepetate/gestionTareasPendientes">Ver Tareas Pendientes</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Acceso directo:</h6>
            <a class="collapse-item" href="/sgtepetate/gestionBitacora/nuevaBitacora">Registrar Bitácora</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Inventario Collapse Menu -->
      @if (Auth::user()->havePermission('GestionInventario.index'))
      <li class="nav-item 
        @php
          if(strpos(Request::path(),'sgtepetate/inventario') !== false )
            echo 'active';
        @endphp
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventario" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-warehouse"></i>
          <span>Inventario</span>
        </a>
        <div id="collapseInventario" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/sgtepetate/inventario">Gestión de Inventario</a>
            <a class="collapse-item" href="/sgtepetate/inventario/todo">Ver todo el Inventario</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Categorías:</h6>
            <a class="collapse-item" href="/sgtepetate/inventario/categoria/1">Alimento</a>
            <a class="collapse-item" href="/sgtepetate/inventario/categoria/2">Medicina</a>
            <a class="collapse-item" href="/sgtepetate/inventario/categoria/3">Productos</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Truchas Collapse Menu -->
      <li class="nav-item
          @php
            if(strpos(Request::path(),'sgtepetate/gestionTruchas') !== false )
              echo 'active';
          @endphp
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTruchas" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fish"></i>
          <span>Truchas</span>
        </a>
        <div id="collapseTruchas" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/sgtepetate/gestionTruchas">Gestión de Truchas</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">ACCESOS RÁPIDOS:</h6>
            <a class="collapse-item" href="/sgtepetate/gestionTruchas/Enfermedades">Enfermedades</a>
            <a class="collapse-item" href="/sgtepetate/gestionTruchas/Mortalidad">Mortalidad</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Ingresos y Egresos Collapse Menu -->
      @if (Auth::user()->havePermission('ingresosEgresos.index'))
      <li class="nav-item 
          @php
            if(strpos(Request::path(),'sgtepetate/ingresos-egresos') !== false )
              echo 'active';
          @endphp
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIE" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-dollar-sign"></i>
          <span>Ingresos y Egresos</span>
        </a>
        <div id="collapseIE" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/sgtepetate/ingresos-egresos">Gestión Financiera</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Accesos Directos:</h6>
            <a class="collapse-item" href="/sgtepetate/ingresos-egresos/ver-ingresos">Ver Ingresos</a>
            <a class="collapse-item" href="/sgtepetate/ingresos-egresos/ver-egresos">Ver Egresos</a>
            <a class="collapse-item" href="/sgtepetate/ingresos-egresos/historial">Ver Historial</a>
            <a class="collapse-item" href="/sgtepetate/ingresos-egresos/conceptos">Ver Conceptos</a>
            <a class="collapse-item" href="/sgtepetate/ingresos-egresos/nuevo-registro">Registrar Movimiento</a>
          </div>
        </div>
      </li>
      @endif

      @if (Auth::user()->havePermission('GestionProductos.index'))
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Página Publicitaria
      </div>

      <!-- Nav Item - Pedidos Collapse Menu -->
      <li class="nav-item
          @php
            if(strpos(Request::path(),'sgtepetate/pedidos') !== false )
              echo 'active';
          @endphp
      ">
        <a class="nav-link" href="/sgtepetate/pedidos">
          <i class="fas fa-shopping-cart"></i>
          <span>Pedidos</span></a>
      </li>

      <!-- Nav Item - Pedidos Collapse Menu -->
      <li class="nav-item
          @php
            if(strpos(Request::path(),'sgtepetate/gestionPagina') !== false )
              echo 'active';
          @endphp
      ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePublicidad" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-globe-americas"></i>
          <span>Publicidad</span>
        </a>
        <div id="collapsePublicidad" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/sgtepetate/gestionPagina">Gestión de Publicidad</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Accesos Rápidos:</h6>
            <a class="collapse-item" href="/sgtepetate/gestionPagina/createProducto">Agregar Producto</a>
            <a class="collapse-item" href="/sgtepetate/gestionPagina/createReceta">Agregar Receta</a>
            <a class="collapse-item" href="/sgtepetate/gestionPagina/createNoticia">Agregar Noticia</a>
            <a class="collapse-item" href="/sgtepetate/gestionPagina/createOferta">Agregar Anuncio</a>
          </div>
        </div>
      </li>

      @endif
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
             @if (Auth::user()->havePermission('GestionProductos.index'))
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if($nnoti==0)
                <span class="badge badge-counter">{{$nnoti}}</span>
                @else 
                <span class="badge badge-danger badge-counter">{{$nnoti}}</span>
                @endif
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in scrollChido" aria-labelledby="alertsDropdown" style="overflow-y: auto;max-height:350px">
                <h6 class="dropdown-header">
                  Notificaciones
                </h6>
                @if($nnoti==0)
                <a class="dropdown-item d-flex align-items-center" href="">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-bell-slash text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"></div>
                    <span class="font-weight-bold">No tienes notificaciones!</span>
                  </div>
                </a>
                @endif
                @foreach($notificaciones as $notificacion)
                <a class="dropdown-item d-flex align-items-center" href="/sgtepetate/revisarpedido/{{$notificacion->idPedido}}">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-concierge-bell text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{ $notificacion->created_at->format('d.m.Y H:i:s') }}</div>
                    <span class="font-weight-bold">Nuevo pedido registrado: <br> Orden #{{ str_pad($notificacion->idPedido,6,'0',STR_PAD_LEFT) }}</span>
                  </div>
                </a>
                @endforeach
              </div>
            </li>
            @endif

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" style="object-fit:cover;" src="{{asset('/storage/images/usuarios_img/'.Auth::user()->relation->foto)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-clipboard-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Bitacora
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('menu')</h1>
            @yield('generarReporte')
          </div>

          @yield('contenido')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SGTepetate 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Cerrar sesión" si está listo para salir del sistema.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <form action="{{route('logout')}}" method="POST">
            {{csrf_field()}}
            <button class="btn btn-primary"> Cerrar Sesión</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('temaGestor/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('temaGestor/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('temaGestor/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('temaGestor/js/sb-admin-2.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('temaGestor/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('temaGestor/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('temaGestor/js/demo/chart-pie-demo.js')}}"></script>

  <!-- El de tablas de pedidos-->
  <script src="{{asset('temaGestor/js/demo/datatables-demo.js')}}"></script>
  <script src="{{asset('temaGestor/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{asset('temaGestor/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src={{asset('temaGestor/jquery/jquery-3.4.1.min.js')}}></script>

</body>

</html>
