<?php
include 'kdb.php';
if (isset($_POST)) {
	
$kode_kebaya = $_POST['kode_kebaya'];
$jenis_kebaya = $_POST['jenis_kebaya'];
$ukuran = $_POST['ukuran'];
$warna = $_POST['warna'];
$stok = $_POST['stok'];

$que = mysqli_query($conn, "UPDATE kebaya SET jenis_kebaya='$jenis_kebaya', ukuran='$ukuran', warna='$warna', stok='$stok' WHERE kode_kebaya='$kode_kebaya' ");
}
header('location: kebaya.php');

?>