<?php 

$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$rpassword = sanitize($_POST['rpassword']);

function sanitize($data){
	$test = trim($data);
	$test = stripslashes($test);
	$test = htmlspecialchars($test);
	$test = filter_var($test, FILTER_SANITIZE_STRING);
	return $test;
}

if(!empty($email)){
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email = 'email';
	} else {
		$email = 'ok';
	}	
} else {
	$email = 'email';
}
if(!empty($password)){
	if(preg_match('/^[0-9a-zA-Z ]*$/', $password)){
		if(strlen($password) >= 8){
			if($password != $rpassword){
				$password = 'ok';
				$rpassword = 'rpassword';
			} else {
				$password = 'ok';
				$rpassword = 'ok';
			}
		} else {
			$password = 'password';	
			$rpassword = 'rpassword';	
		}
	} else {
		$password = 'password';
		$rpassword = 'rpassword';
	}
} else {
	$password = 'password';
	$rpassword = 'rpassword';
}

$data = array(
	'email'		=>	$email,
	'password'	=>	$password,
	'rpassword'	=>	$rpassword,
);

echo json_encode($data);

?>