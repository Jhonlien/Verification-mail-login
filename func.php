<?php
function esc_string($string){
	global $conn; 
	$data = mysqli_escape_string($conn, $string);
	return $data;
}

?>