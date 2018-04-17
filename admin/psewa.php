<?php
include 'kdb.php';

$kode_sewa = $_POST['kode_sewa'];
$kode_kebaya = $_POST['kode_kebaya'];
$kode_pelanggan = $_POST['kode_pelanggan'];
$tanggal_sewa = $_POST['tanggal_sewa'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$kode_pengguna = $_POST['kode_pengguna'];
$status = 'dipinjam';
$total_bayar = $_POST['total_bayar'];

	$quer = mysqli_query($conn, "SELECT * FROM kebaya where kode_kebaya='$kode_kebaya'");
	$data = mysqli_fetch_array($quer);
	if ($data['stok']==0) {
		echo "<script>alert('stok kosong!');  window.location = 'kebaya.php';</script>";
	} elseif ($tanggal_sewa == $tanggal_kembali) {
		echo "<script>alert('tanggal sewa tidak boleh sama dengan tanggal kembali!'); window.location = 'kebaya.php';</script>";
	} elseif ($data['stok'] > 0) {
		$tgl1 = new DateTime($tanggal_sewa);
		$tgl2 = new DateTime($tanggal_kembali);
		$proses = $tgl1->diff($tgl2);
		$hasil = $proses->days;
		
		$que = mysqli_query($conn, "INSERT INTO sewa (kode_sewa, kode_kebaya, kode_pelanggan, tanggal_sewa, tanggal_kembali, kode_pengguna, status, total_bayar) VALUES('$kode_sewa', '$kode_kebaya', '$kode_pelanggan', '$tanggal_sewa', '$tanggal_kembali', '$kode_pengguna', '$status', '$total_bayar')");
		$query = mysqli_query($conn, "UPDATE kebaya SET stok=(stok-1) WHERE kode_kebaya='$kode_kebaya'");
		header("location: datasewa.php");
	} else {
		echo '<script> alert("gagal input data!"); window.location = "kebaya.php"; </script>';
	}
	
?>