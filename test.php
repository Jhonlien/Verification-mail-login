$to      = $email;
$subject = 'Signup | Verification email';
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$username.'
Password: '.$password.'
------------------------
 
Please click this link to activate your account:

http://localhost/phpmail/verify.php?email='.$email.'&hash='.$hash.'';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= 'From:noreply@yourwebsite.com'."\r\n";


mail($to, $subject, $message, $headers);

if($query){
	$msg .= 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
	echo $msg;
}