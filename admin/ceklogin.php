<?php

include 'kdb.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'");
$hasil = mysqli_num_rows($query);

if ($hasil > 0) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";	
	header("location: index.php");
} else {
	echo "<script>alert('salah');</script>";
}

?>