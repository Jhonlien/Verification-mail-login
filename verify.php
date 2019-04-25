<?php
include 'config.php';
openconn();

global $conn;
$email 	= @$_GET['email'];
$hash  	= @$_GET['hash'];
$active = 'Y';

$query = mysqli_query($conn, "SELECT `email`, `hash` FROM users WHERE `email` = '$email' AND `hash` = '$hash'");
$match = mysqli_num_rows($query);

if($match>0){
	mysqli_query($conn, "UPDATE `users` 
						SET `active`= '$active' WHERE `email` = '$email' ");
	header('location:index.php');
}
else{
	echo "<center> <h1> Something Wrong !!!! </h1> </center>";
}
?>