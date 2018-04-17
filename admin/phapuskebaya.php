<?php

include 'kdb.php';

$kode_kebaya = $_GET['kode_kebaya'];

$que = mysqli_query($conn, "DELETE FROM kebaya WHERE kode_kebaya='$kode_kebaya'") or die(mysql_error());

 header('location: kebaya.php');

?>