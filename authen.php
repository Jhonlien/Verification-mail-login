<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config.php';
require 'func.php';

$mail = new PHPMailer(true); 
openconn();global $conn;

$username 	= esc_string($_POST['username']);
$email 		= esc_string($_POST['email']);
$password 	= esc_string(md5($_POST['password']));
$hash 		= md5(rand(1000,5000));
$active 	= 'N';
$msg 		= '';

$q = "INSERT INTO `users`(`username`, `email`, `password`, `hash`, `active`) 
	VALUES ('$username','$email','$password','$hash','$active')";
$query = mysqli_query($conn, $q);

if($query){
	try {
		$mail->SMTPDebug = 2;                                
	    $mail->isSMTP();                                        
	    $mail->Host = 'smtp.gmail.com';                         
	    $mail->SMTPAuth = true;                                 
	    $mail->Username = 'devjhon409@gmail.com';            
	    $mail->Password = 'Nyamukhamil12';                           
	    $mail->SMTPSecure = 'ssl';                            
	    $mail->Port = 465;                           
	    $mail->setFrom('devjhon409@gmail.com', 'Jhon Dev');
	    $mail->addAddress($email, $username);
	    $mail->isHTML(true);                                  
	    $mail->Subject = 'Signup | Verification email';
	    $mail->Body    = "Thanks for signing up!
						Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below".
						"Please click this link to activate your account:
						http://localhost/phpmail/verify.php?email=$email&hash=$hash";
	    if($mail->send()){
	    	header('location:index.php');
	    }
	    else{
	    	echo "Something Wrong!";
	    }
	    
	}
	catch (Exception $e){

	}
}
?>