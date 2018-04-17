<?php

include 'kdb.php';

$kodep = $_POST['kode_pelanggan'];
$namap = $_POST['nama_pelanggan'];
$alamatp = $_POST['alamat_pelanggan'];
$ktpp = $_POST['ktp_pelanggan'];
$notelpp = $_POST['no_telp_pelanggan'];

$ptp = mysqli_query($conn, "INSERT INTO pelanggan SET kode_pelanggan='$kodep', nama_pelanggan='$namap', alamat_pelanggan='$alamatp', ktp_pelanggan='$ktpp', no_telp_pelanggan='$notelpp'") or die(mysql_error());

header('location: pelanggan.php');

?>