<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Porject 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/fontawesome-free/css/all.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/assets/dist/css/adminlte.min.css')?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
    <!-- summernote -->
    <!-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <!-- Inicio -->
            
            <!-- fin -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="<?php echo base_url(route_to('config'));?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    Configuración
                  <span class="float-right"><i class="fas fa-user"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div><a href="<?php echo base_url(route_to('cpassword'));?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    Password
                  <span class="float-right"><i class="fas fa-key"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url(route_to('logout'));?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Salir
                  <span class="float-right"><i class="fas fa-sign-out-alt"></i></span>
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
                
                <!-- Notifications Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url(route_to('panel'));?>" class="brand-link"
                style="background:#ffffff; text-align: center;">
                <img src="https://www.projectrade.com/wp-content/uploads/2021/03/cropped-cropped-Asset-1.png"
                    alt="Projectrade" style="text-align: center; width: 70px;" style="opacity: .8">
                <!-- <span style="color: black;">Projectrade</span> --> <br>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- SidebarSearch Form -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/access/deposito')?>" class="nav-link">
                                        <i class="fa fa-money-bill-alt"></i>
                                        <p>Depósito</p>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                            </ul>
                            
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/access/retiro')?>" class="nav-link">
                                        <i class="fab fa-bitcoin"></i>
                                        <p>Retiros</p>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                            </ul>
                            
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('/access/movimiento')?>" class="nav-link">
                                        <i class="fas fa-exchange-alt"></i>
                                        <p>Movimientos</p>
                                    </a>
                                </li>
                                <div class="dropdown-divider"></div>
                            </ul>
                            
                            <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="fas fa-people-arrows"></i>
                                        <p>Referidos</p>
                                    </a>
                                </li>
                            </ul> -->
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="alert alert-info" role="alert">
                        Estimados usuarios actualmente estamos en actualización, sus valores están siendo actualizados en el transcurso de los días.<br> Gracias por la confianza
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Bienvenido, <?= ucfirst(session('nombre')) ." ". ucfirst(session('apellido'));?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('access/')?>">Inicio</a></li>
                                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- Insertar extención de php -->
            <section class="content">
                <?= $this->renderSection('contenido')?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="https://www.projectrade.com/">Projectrade Vesión 1.4</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= base_url('/assets/js/custom.js')?>"></script>

    <script src="<?= base_url('/assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('/assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js')?>"></script>
    <script src="<?= base_url('https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js')?>"></script>
    <!-- ChartJS -->

    <script src="<?= base_url('/assets/plugins/chart.js/Chart.min.js')?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('/assets/plugins/sparklines/sparkline.js')?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('/assets/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
    <script src="<?= base_url('/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('/assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('/assets/plugins/moment/moment.min.js')?>"></script>
    <script src="<?= base_url('/assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
    <!-- Summernote -->
    <!-- <script src="assets/plugins/summernote/summernote-bs4.min.js"></script> -->
    <!-- overlayScrollbars -->
    <script src="<?= base_url('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/assets/dist/js/adminlte.js')?>"></script>
    <script src="<?= base_url('/assets/plugins/popper/popper.min.js')?>"></script>
    <script src="<?= base_url('/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="../assets/dist/js/pages/dashboard.js"></script> -->
    

    
</body>
</html>