<?php

include 'kdb.php';

$kodek = $_POST['kode_kebaya'];
$namak = $_POST['jenis_kebaya'];
$ukurank = $_POST['ukuran'];
$warnak = $_POST['warna'];
$stok = $_POST['stok'];

$ptk = mysqli_query($conn, "INSERT INTO kebaya SET kode_kebaya='$kodek', jenis_kebaya='$namak', ukuran='$ukurank', warna='$warnak', stok='$stok'") or die(mysql_error());

header('location: kebaya.php');

?>