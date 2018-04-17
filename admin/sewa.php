<?php
session_start();

if ($_SESSION['status'] != "login") {
  header("location: index.php");
}

include 'kdb.php';

$que = mysqli_query($conn, "select max(kode_sewa) as kodeterakhir from sewa");
$hasil = mysqli_fetch_array($que);
$kode_sewa = $hasil['kodeterakhir'];

$urutno = (int) substr($kode_sewa, 3,3);
$urutno++;

$char = "SWK";
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
  <link href="../css/sb-admin.css" rel="stylesheet">../
  <link href="../css/bootstrap-datepicker3.css" rel="stylesheet">
  <link href="../css/select2.min.css" rel="stylesheet">
  <link href="../css/sweetalert2.css">
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
            <span class="nav-link-text clr">Dashboard</span>
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
              <a href="kebaya.php">Data Kebaya</a>
            </li>
            <li>
              <a href="datasewa.php">Data Sewa</a>
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
        <li class="breadcrumb-item active">Penyewaan</li>
      </ol>
      <div class="row">
        <div class="card card-register mx-auto mt-3" style="margin-bottom: 25px; width: 50rem;">

<?php
  include "kdb.php";

  $kode_kebaya = $_GET['kode_kebaya'];
  $que = mysqli_query($conn, "Select kode_kebaya, jenis_kebaya, ukuran, warna from kebaya where kode_kebaya='$kode_kebaya'");
  while ($data = mysqli_fetch_array($que)) {
?>

      <div class="card-header"><b>Penyewaan</b></div>
      <div class="card-body" >
        <form action="psewa.php" method="post" id="fs">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Kode Sewa :</label>
                <input class="form-control" type="text" name="kode_sewa" value="<?php echo $newno; ?>" readonly required>
              </div>
                <input class="form-control" type="hidden" name="kode_kebaya" value="<?php echo $data['kode_kebaya']; ?>" readonly required>
<?php
$que1 = mysqli_query($conn, "SELECT * from pengguna") or die(mysql_error());
$data1 = mysqli_fetch_array($que1);
$hasil1 = $data1[0];
?>
                <input class="form-control" type="hidden" name="kode_pengguna" value="<?php echo $hasil1; ?>" readonly required>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label>Jenis Kebaya :</label>
                <input class="form-control" type="text" name="jenis_kebaya" id="jenis_kebaya" value="<?php echo $data['jenis_kebaya']; ?>" readonly required>
              </div>
              <div class="col-md-4">
                <label>Ukuran :</label><br>
                <input class="form-control" type="text" name="ukuran" id="ukuran" value="<?php echo $data['ukuran']; ?>" readonly required>
              </select>
              </div>
              <div class="col-md-4">
                <label>Warna :</label><br>
                <input class="form-control" type="text" name="warna" id="warna" value="<?php echo $data['warna']; ?>" readonly required>
              </select>
              </div>
            </div>
          </div>
<?php
}
?>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nama Pelanggan :</label>
                <select class="form-control" name="kode_pelanggan" required>
                  <option value="">Pilih salah satu</option>
<?php
$que2 = mysqli_query($conn, "SELECT * FROM pelanggan") or die(mysql_error());
while ($data2 = mysqli_fetch_array($que2)) {
?>
                  <option name="kode_pelanggan" value="<?php echo $data2['kode_pelanggan']; ?>"><?php echo $data2['nama_pelanggan']; ?></option>
<?php
}
?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Tanggal Mulai :</label><br>
                <div class="input-daterange input-group" id="datepicker">
                  <input type="text" name="tanggal_sewa" id="tanggal_sewa" class="input-sm form-control" required>
                  <span class="input-group-addon">&nbsp;&nbsp;Sampai&nbsp;&nbsp;</span>
                  <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="input-sm form-control" required>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Harga :</label>
                <input class="form-control" type="text" pattern="[0-9]+" title="Hanya bisa diisi oleh angka!" name="total_bayar" placeholder="isi harga sewa..." required>
              </div>
            </div>
          </div>
          </div>
          <button class="btn btn-primary" name="sewa" id="sewa">Sewa</button>
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
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/select2.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
    <script type="text/javascript">
      $('.input-daterange').datepicker({
        format: "yyyy-mm-dd",
        autoclose:true
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#nama_pelanggan').select2({
          placeholder: "Pilih salah satu";
        });
      });
    </script>
  </div>
</body>
</html>