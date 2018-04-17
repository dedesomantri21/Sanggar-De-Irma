<?php
$server = "localhost";
$db		= "deirma";
$username = "root";
$password = "";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
	die("koneksi gagal : " . mysqli_connect_error());
}

?>