<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}
require '../../functions.php';
//konfigurasi
$jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM mhs_aryarizky"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$mahasiswa = query("SELECT * FROM mhs_aryarizky LIMIT $awalData,$jumlahDataPerHalaman");
// tombol cari ditekan
if (isset($_GET["cari"])) {
    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM mhs_aryarizky WHERE 
                nim_mhs LIKE '%$keyword%' OR
                nama_mhs LIKE '%$keyword%' OR
                tahun_ajaran LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                no_hp LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%' OR
                tgl_lahir LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'
            ";
    $mahasiswa = query($query);
} else {
    // Query tanpa pencarian
    $mahasiswa = query("SELECT * FROM mhs_aryarizky LIMIT $awalData, $jumlahDataPerHalaman");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIAKAD - Sistem Informasi Akademik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
    <!-- styleku -->
    <link rel="stylesheet" href="../../dist/css/style3.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
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
            <a href="index.php" class="brand-link">
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
                            <a href="data.php" class="nav-link active">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>Data Mahasiswa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-thumbtack"></i>
                                <p>
                                    Tentang Saya
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="general.php" class="nav-link">
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
                            <a href="../../logout.php" class="nav-link">
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
                            <h1>Data Mahasiswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Mahasiswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn btn-primary" href="../../tambah.php" role="button"><i class="fas fa-user-plus"></i> Tambah Data Mahasiswa</a>
                                    <a class="btn btn-success" href="../../cetak.php" target="_blank" role="button"><i class="fas fa-print"></i> Cetak</a>
                                    <div class="card-tools">
                                        <form action="" method="get" autocomplete="off">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" name="keyword" class="form-control float-right" placeholder="Search" autofocus required>

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default" name="cari">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <!-- navigasi -->
                                    <?php if ($halamanAktif > 1) : ?>
                                        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
                                    <?php endif; ?>
                                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                        <?php if ($i == $halamanAktif) : ?>
                                            <a href="?halaman=<?= $i; ?>" style="color: white;background-color: red;font-weight: bold; padding-inline:5px;"><?= $i; ?></a>
                                        <?php else : ?>
                                            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                                        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
                                    <?php endif; ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Aksi</th>
                                                    <th>Gambar</th>
                                                    <th>Nim</th>
                                                    <th>Nama</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Jurusan</th>
                                                    <th>Nomor Hp</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Alamat</th>
                                                </tr>
                                            </thead>
                                            <?php $i = 1 + $awalData; ?>
                                            <?php foreach ($mahasiswa as $row) : ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td>
                                                            <div class="btn-group-vertical">
                                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?= $row["id_mhs"]; ?>">
                                                                    <i class="fas fa-eye"></i> View
                                                                </button>
                                                                <a class="btn btn-warning btn-sm" href="../../ubah.php?id_mhs=<?= $row["id_mhs"]; ?>" role="button"><i class="fas fa-edit"></i> Edit</a>
                                                                <a class="btn btn-danger btn-sm" href="../../hapus.php?id_mhs=<?= $row["id_mhs"]; ?>" onclick="return confirm('yakin dihapus?');" role="button"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                        </td>
                                                        <td><img src="../../dist/img/<?= $row["gambar"]; ?>" width="70"></td>
                                                        <td><?= $row["nim_mhs"]; ?></td>
                                                        <td><?= $row["nama_mhs"]; ?></td>
                                                        <td><?= $row["tahun_ajaran"]; ?></td>
                                                        <td><?= $row["jurusan"]; ?></td>
                                                        <td><?= $row["no_hp"]; ?></td>
                                                        <td><?= $row["jenis_kelamin"]; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($row["tgl_lahir"])); ?></td>
                                                        <td><?= $row["alamat"]; ?></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
            <strong>Copyright &copy; 2024-2025
                <a href="https://m.youtube.com/channel/UCwp6vwQcR5DfCrdJIUHtMEA" target="_blank" onClick="javascript:alert('Bantu klik subscribe ya bro :) ');">Arya Rizky Web</a>.</strong>
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
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example2").DataTable({
                paging: false,
                lengthChange: false,
                searching: false,
                ordering: false,
                info: false,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>
</body>

</html>
<!-- Modal -->
<?php foreach ($mahasiswa as $row) : ?>
    <div class="modal fade" id="exampleModal<?= $row["id_mhs"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog kuy">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-list"></i> Profil Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <h3 class="besar"><?= $row["nama_mhs"]; ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="../../dist/img/<?= $row["gambar"]; ?>" width="130" class="img-fluid" alt="Student Image">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody class="kecil">
                                    <tr>
                                        <th scope="row">Nim</th>
                                        <td><?= $row["nim_mhs"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tahun Ajaran</th>
                                        <td><?= $row["tahun_ajaran"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jurusan</th>
                                        <td><?= $row["jurusan"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nomor Hp</th>
                                        <td><?= $row["no_hp"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td><?= $row["jenis_kelamin"]; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td><?= date('d-m-Y', strtotime($row["tgl_lahir"])); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td><?= $row["alamat"]; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<style>
    .besar {
        font-family: "Poppins", sans-serif;
        font-size: 30px;
        font-weight: 700;
    }

    .kecil {
        font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
        line-height: 20px;
        font-weight: 400;
    }

    .kuy {
        max-width: 625px;
    }

    /* Add a media query to adjust styles for small screens (e.g., mobile phones) */
@media (max-width: 767px) {
    /* Style adjustments for small screens */
    .card-tools {
        margin-bottom: 10px;
    }

    .input-group-sm {
        width: 100%;
    }

    .input-group-sm input {
        border-radius: 0.2rem;
    }
}

/* Add this media query to apply specific styles for screens smaller than 576px (phones) */
@media (max-width: 575.98px) {
    .card-tools {
        margin-top: 10px;
    }

    .card-tools form {
        display: block;
    }

    .card-tools form .input-group {
        width: 100%;
    }

    .card-tools form .input-group input {
        margin-bottom: 5px;
    }
}

/* Add this media query to apply specific styles for screens larger than 576px (desktops) */
@media (min-width: 576px) {
    .card-tools {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .card-tools .card-title {
        flex: 1;
        margin-right: 10px;
    }

    .card-tools form {
        display: flex;
        align-items: center;
    }

    .card-tools form .input-group {
        width: 150px;
        margin-left: auto;
    }

    .card-tools form .input-group input {
        margin-bottom: 0;
    }

    .card-tools form .input-group-append {
        margin-left: -1px;
    }
}

</style>