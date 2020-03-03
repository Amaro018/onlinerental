<?php 

include '../../../connection.php';

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$suffix = $_POST['suffix'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];

$contact = $_POST['contact'];
$st = $_POST['st'];
$zone = $_POST['zone'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];

$email = $_POST['email'];
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];

$img = 'avatar1.png';

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$email_res = 'invalid email format';
} else {
	$email_res = 'email is good';
}

if(strlen($password) >= 8){
	if($password != $rpassword){
		$password_res = 'password doesn\'t match';
	} else {
		$password_res = 'password match';
	}
} else {
	$password_res = 'password must be 8 characters or above';	
}

if($email_res == 'email is good' && $password_res == 'password match'){
	$pass = password_hash($password, PASSWORD_DEFAULT);

	$reg = $con->query("INSERT INTO tbl_indreg (fname, mname, lname, suffix, gender, contact, bday, user_img) VALUES ('$fname', '$mname', '$lname', '$suffix', '$gender', $contact, '$birthdate', '$img') ");
	$last_id = $con->insert_id;
	$add = $con->query("INSERT INTO tbl_address (accNo, st, zone, brgy, city, address_type) VALUES ($last_id, '$st', '$zone', '$brgy', '$city', 'default') ");
	$acc = $con->query("INSERT INTO tbl_account (accNo, email, pword, rpword, userType, acc_status) VALUES ($last_id, '$email', '$pass', '$pass', 'user', 0) ");
}

$data = array(
	'pass'	=>	$password_res,
	'email'	=>	$email_res,
);

echo json_encode($data);

?>