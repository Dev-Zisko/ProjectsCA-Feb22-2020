<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coalición AntiCorrupción | Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor2/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../css/aeros.css" rel="stylesheet">
  <link rel="stylesheet" href="../../js/chosen/chosen.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar MODIFICADO POR AEROS -->
    <!--
    <ul style="background: #004A7F;" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img style="width: 100%; height: 100%;" src="../../images/loguito.png">
        </div>
        @if (Auth::guest())
          <div class="sidebar-brand-text mx-3">Usuario</div>
        @else
          <div class="sidebar-brand-text mx-3">Admin</div>
        @endif
      </a>

      <hr class="sidebar-divider my-0">

      <div style="color: white; text-align: center; margin-top: 3px;" class="sidebar-heading">
        Opciones:
      </div>
      @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('metrics') }}">
            <i class="fas fa-fw fa-filter"></i>
            <span>Filtros</span>
          </a>
        </li>
      @else
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('users') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Usuarios</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('organizations') }}">
          <i class="fas fa-fw fa-building"></i>
          <span>Organizaciones</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('initiatives') }}">
          <i class="fas fa-fw fa-scroll"></i>
          <span>Iniciativas</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('metrics') }}">
          <i class="fas fa-fw fa-filter"></i>
          <span>Filtros</span>
        </a>
      </li>
      @endif
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    -->
    <!-- End of Sidebar MODIFICADO POR AEROS-->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav style="background: #5E727C !important;" class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- INICIO CAMBIOS AEROS -->

          <ul class="top-header-aeros">
            @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('metricsorganizations') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>Organizaciones</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('metricsinitiatives') }}">
                <i class="fas fa-fw fa-scroll"></i>
                <span>Iniciativas</span>
              </a>
            </li>
            @else
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('users') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Usuarios</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('organizations') }}">
                <i class="fas fa-fw fa-building"></i>
                <span>Organizaciones</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('initiatives') }}">
                <i class="fas fa-fw fa-scroll"></i>
                <span>Iniciativas</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('godparents') }}">
                <i class="fas fa-fw fa-user-tag"></i>
                <span>Padrinos</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('metrics') }}">
                <i class="fas fa-fw fa-filter"></i>
                <span>Filtros</span>
              </a>
            </li>
            @endif
          </ul>


          <!-- FIN CAMBIOS AEROS -->

          <!-- Sidebar Toggle (Topbar) -->
          <button style="background: #E0E0E0;" id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i style="color: #004A7F;" class="fa fa-bars"></i>
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
            @if (Auth::guest())
              
            @else
              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span style="color: white !important;" class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                  <img class="img-profile rounded-circle" src="../../images/avatar.jpg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Salir</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            @endif
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            @yield('head-content')
            
          </div>

          @yield('content')
    
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020 coalicionanticorrupcion.com </span>
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

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor2/jquery/jquery.min.js"></script>
  <script src="../../vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor2/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor2/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>
  <script src="../../js/chosen/chosen.jquery.min.js"></script>
  <script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 1,
            no_results_text: "Nada registrado!",
            width: "100%"
        });
    });
  </script>
</body>

</html>
