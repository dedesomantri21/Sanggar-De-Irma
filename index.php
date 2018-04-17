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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body style="background: url('gambar/kebaya.jpg') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
  <div class="container">
    <div class="card card-login mx-auto" style="margin-top: 14rem; opacity: 0.85;">
      <div class="card-header">Login Sanggar Deirma</div>
      <div class="card-body">
        <form action="admin/ceklogin.php" method="post" onSubmit="return validasi()">
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Masukkan Username...">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan Password...">
          </div>
          <div style="text-align: right;">
            <!-- <input type="submit" value="Login" class="btn btn-primary tombollogin"> -->
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sweetalert2.js"></script>
  
  
</body>

<script type="text/javascript">
    function validasi() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      if (username != "" && password != "") {
        return true;
      } else {
          swal(
          'Oops...',
          'Username dan Password harus diisi',
          'error');
      }
      return false;
    }
</script>
</html>
