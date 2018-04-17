<?php

include "kdb.php";

$kode_sewa = $_GET['kode_sewa'];
$kode_kebaya = $_GET['kode_kebaya'];

$que = mysqli_query($conn, "UPDATE sewa set status='selesai' where kode_sewa='$kode_sewa'");
$que1 = mysqli_query($conn, "UPDATE kebaya SET stok=(stok+1) WHERE kode_kebaya='$kode_kebaya'");

if ($que && $que1) {
	header("location: datasewa.php");
}

?>