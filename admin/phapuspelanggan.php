<?php

include 'kdb.php';

$kode_pelanggan = $_GET['kode_pelanggan'];

$que = mysqli_query($conn, "DELETE FROM pelanggan WHERE kode_pelanggan='$kode_pelanggan'") or die(mysql_error());

 header('location: pelanggan.php');

?>