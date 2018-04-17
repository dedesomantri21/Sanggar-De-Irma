<?php
session_start();

if ($_SESSION['status'] != "login") {
  header("location: index.php");
}

include 'kdb.php';

$que = mysqli_query($conn, "select max(kode_pelanggan) as kodeterakhir from pelanggan");
$hasil = mysqli_fetch_array($que);
$kode_pelanggan = $hasil['kodeterakhir'];

$urutno = (int) substr($kode_pelanggan, 3,3);
$urutno++;

$char = "PLG";
$newno = $char . sprintf("%03s", $urutno);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sanggar Deirma</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Sanggar Deirma</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pelanggan">
          <a class="nav-link" href="pelanggan.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span class="nav-link-text">&nbsp;&nbsp;Pelanggan</span>
          </a>
        </li>   
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kebaya">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-female" aria-hidden="true"></i>
            <span class="nav-link-text">&nbsp;&nbsp;Kebaya</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="Kebaya.php">Data Kebaya</a>
            </li>
            <li>
              <a href="#">Data Sewa</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="pelanggan.php">Pelanggan</a>
        </li>
        <li class="breadcrumb-item active">Tambah Pelanggan</li>
      </ol>
      <div class="row">
        <div class="card card-register mx-auto mt-3" style="margin-bottom: 25px;">
      <div class="card-header"><b>Tambah Pelanggan</b></div>
      <div class="card-body" style="width: 30rem;">
        <form action="ptambahpelanggan.php" method="post" id="ftp">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Kode Pelanggan :</label>
                <input class="form-control" type="text" name="kode_pelanggan" value="<?php echo $newno; ?>" readonly required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nama Pelanggan :</label>
                <input class="form-control" type="text" name="nama_pelanggan" placeholder="Masukkan nama pelanggan..." required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Alamat Pelanggan :</label>
                <input class="form-control" type="text" name="alamat_pelanggan" placeholder="Masukkan alamat pelanggan..." required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>No KTP :</label>
                <input class="form-control" type="text" pattern="[0-9]+" title="Hanya bisa diisi oleh angka!" name="ktp_pelanggan" placeholder="Masukkan no ktp pelanggan..." required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>No Telepon :</label>
                <input class="form-control" type="text" pattern="[0-9]+" title="Hanya bisa diisi oleh angka!" name="no_telp_pelanggan" placeholder="Masukkan no telepon pelanggan..." required>
              </div>
            </div>
          </div>
          </div>
          <button class="btn btn-primary" name="tambah">Tambah</button>
        </form>
      </div>
    </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Unikom 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Yakin akan keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
  </div>
</body>
</html>
