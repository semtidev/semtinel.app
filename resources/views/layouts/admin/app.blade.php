<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Semtinel') }} - Admin</title>
  <link rel="shortcut icon" href="http://localhost/semtinel/public/themes/semtinel/img/favicon.png" />
  
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/semtinel/vendor/fas-620/css/all.min.css">
  <!-- Material Design Icons -->
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/semtinel/vendor/mdi-6.9/css/materialdesignicons.min.css">
  <!-- Select2 Plugin -->
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/adminlte320/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/adminlte320/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Floating Vue -->
  <link rel="stylesheet" href="http://localhost/semtinel/node_modules/floating-vue/dist/style.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/adminlte320/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/adminlte320/plugins/toastr/toastr.min.css">
  <!-- App style-->
  <link rel="stylesheet" href="http://localhost/semtinel/public/themes/semtinel/css/app.css">

  @yield('level_css')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  
  <!-- App container -->
  <div id="app">
    <!-- App wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/') }}" class="nav-link align-middle">Portal</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <router-link 
              to="/semtinel/public/admin" 
              class="nav-link align-middle active"
              v-on:click="setAppActive()">
              Semtinel Admin
            </router-link>
          </li>
          <li><a class="nav-link" href="{{ url('/logistics') }}">Log&iacute;stica</a></li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- User Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown">
              @isset($_SESSION['semtinel'])
                @php
                    echo $_SESSION['semtinel']['user']['first_name'] . ' ' . $_SESSION['semtinel']['user']['last_name'];
                @endphp
              @endisset
            </a>
            <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
              <a href="logout" class="dropdown-item">
                <i class="mdi mdi-power-plug-off"></i>&nbsp;Desconectar
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link">
          <img src="http://localhost/semtinel/public/themes/semtinel/img/semtinel.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1">
          <span class="brand-text font-weight-light">Semtinel</span>&nbsp;<span class="logo-app-version">v1.0</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="overflow-y: auto;">

          <!-- Sidebar Menu -->
          <admin-sidebar></admin-sidebar>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper px-2">
        <!-- Content Header (Page header) -->
        @yield('content-header')

        <!-- Main content -->
        <section class="content">

            <main class="py-4">
                @yield('content')
            </main>

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
          Plataforma de Gesti&oacute;n Empresarial <b>Semtinel - Admin</b> v1.0
        </div>
        Copyright &copy; {{ date('Y') }} <b>A.E.I. UCM</b> - <b>BBI</b>. Servicios Informáticos.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
  </div>

  <!-- jQuery -->
  <script src="http://localhost/semtinel/public/themes/adminlte320/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="http://localhost/semtinel/public/themes/adminlte320/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 Plugin -->
  <script src="http://localhost/semtinel/public/themes/adminlte320/plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <script src="http://localhost/semtinel/public/themes/adminlte320/dist/js/adminlte.min.js"></script>
  <!-- Toastr -->
  <script src="http://localhost/semtinel/public/themes/adminlte320/plugins/toastr/toastr.min.js"></script>
  <!-- App Script -->
  <script src="http://localhost/semtinel/public/themes/semtinel/js/app.js"></script>
  <script src="http://localhost/semtinel/public/themes/semtinel/js/buttons-ripple.js"></script>

  @yield('level_js')

</body>
</html>