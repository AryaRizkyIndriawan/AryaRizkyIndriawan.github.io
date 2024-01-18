<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ../../login.php");
  exit;
}
require '../../functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD - Sistem Informasi Akademik</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" href="https://saweria.co/stekomaryarizky" target="_blank">
            <i class="fas fa-hand-holding-usd"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index.php" class="brand-link">
        <img src="../../dist/img/stekom.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="logo-lg  pull-left"><b>S I A K A D</b><span style="font-size:11px;"> ver. 3.2</span></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/foto.jpg" class="img-responsive" alt="User Image" style=" height: 70px; width: 50px;  ">
          </div>
          <div class="info">
            <a href="#" class="d-block" style="font-size: 16px; color: #B9BEC7;">ARYA RIZKY INDRIAWAN</a>
            <small style="font-size: 14px; color: #B9BEC7;">6304920060054</small>
            <div class="d-flex">
              <img src="../../dist/img/gif 2.gif" class="img-responsive" alt="User Image" style="width: 25px;">
              <img src="../../dist/img/gif 2.gif" class="img-responsive" alt="User Image" style="width: 25px;">
              <img src="../../dist/img/gif 2.gif" class="img-responsive" alt="User Image" style="width: 25px;">
              <img src="../../dist/img/gif 2.gif" class="img-responsive" alt="User Image" style="width: 25px;">
              <img src="../../dist/img/gif 2.gif" class="img-responsive" alt="User Image" style="width: 25px;">
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../../index.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="data.php" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>Data Mahasiswa</p>
              </a>
            </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-thumbtack"></i>
                <p>
                  Tentang Saya
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="general.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Social Media</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../web.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>My Website</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
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
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>My Social Media</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">My Social Media</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>224</h3>
                  <p>FOLLOWER</p>
                </div>
                <div class="icon">
                  <i class="fab fa-facebook"></i>
                </div>
                <a href="https://www.facebook.com/11AryaRI" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success" style="height: 141px ;">
                <div class="inner">
                  <p>CHAT ME</p>
                </div>
                <div class="icon">
                  <i class="fab fa-whatsapp"></i>
                </div>
                <a href="https://wa.me/+6282134752922" class="small-box-footer" style="position: absolute; bottom: 0; width: 100%; text-align: center;">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>29</h3>

                  <p>FOLLOWER</p>
                </div>
                <div class="icon">
                  <i class="fab fa-instagram"></i>
                </div>
                <a href="https://www.instagram.com/arya_rizky11" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>1</h3>

                  <p>SUBSCRIBE</p>
                </div>
                <div class="icon">
                  <i class="fab fa-youtube"></i>
                </div>
                <a href="https://youtube.com/channel/UCwp6vwQcR5DfCrdJIUHtMEA" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>0</h3>

                  <p>FOLLOWER</p>
                </div>
                <div class="icon">
                  <i class="fab fa-github"></i>
                </div>
                <a href="https://github.com/AryaRizkyIndriawan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2024-2025 <a href="https://m.youtube.com/channel/UCwp6vwQcR5DfCrdJIUHtMEA" target="_blank" onClick="javascript:alert('Bantu klik subscribe ya bro :) ');">Arya Rizky Web</a>.</strong> All rights reserved.
    </footer>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>