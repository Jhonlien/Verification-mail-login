<?php
$host = 'localhost'; $username = 'root'; $password = ''; $database = 'mail';

function openconn(){
	global $host, $username, $password, $database, $conn;
	$conn = mysqli_connect($host, $username, $password) or die('Connection Error <br>'.mysqli_connect_error());
	mysqli_select_db($conn,$database);
}

function closeconn(){
	global $conn;
	mysqli_close();
}
?>