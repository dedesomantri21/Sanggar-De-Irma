<?php
include 'kdb.php';
if (isset($_POST)) {
	
$kode_pelanggan = $_POST['kode_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$ktp_pelanggan = $_POST['ktp_pelanggan'];
$no_telp_pelanggan = $_POST['no_telp_pelanggan'];

$que = mysqli_query($conn, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', ktp_pelanggan='$ktp_pelanggan', no_telp_pelanggan='$no_telp_pelanggan' WHERE kode_pelanggan='$kode_pelanggan' ");
}
header('location: pelanggan.php');

?>