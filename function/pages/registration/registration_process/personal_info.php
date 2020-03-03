<?php 

$fname = sanitize($_POST['fname']);
$mname = sanitize($_POST['mname']);
$lname = sanitize($_POST['lname']);
$suffix = sanitize($_POST['suffix']);
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];

function sanitize($data){
	$test = trim($data);
	$test = stripslashes($test);
	$test = htmlspecialchars($test);
	$test = filter_var($test, FILTER_SANITIZE_STRING);
	return $test;
}

$info = array();
$error = array();

if(!empty($fname)){
	if(!filter_var($fname, FILTER_VALIDATE_INT) === false) {
		array_push($info, 'fname');
		array_push($error, 'Invalid Data');
	} else {
		array_push($info, 'fname');
		array_push($error, 'ok');
	}
} else {
	array_push($info, 'fname');
	array_push($error, 'Must input data');

}

if(!empty($mname)){
	if(!filter_var($mname, FILTER_VALIDATE_INT) === false) {
		array_push($info, 'mname');
		array_push($error, 'Invalid Data');
	} else {
		array_push($info, 'mname');
		array_push($error, 'ok');
	}
} else {
	array_push($info, 'mname');
	array_push($error, 'Must input data');
}

if(!empty($lname)){
	if(!filter_var($lname, FILTER_VALIDATE_INT) === false) {
		array_push($info, 'lname');
		array_push($error, 'Invalid Data');
	} else {
		array_push($info, 'lname');
		array_push($error, 'ok');
	}
} else {
	array_push($info, 'lname');
	array_push($error, 'Must input data');
}

if(!filter_var($suffix, FILTER_VALIDATE_INT) === false) {
	array_push($info, 'suffix');
	array_push($error, 'Invalid Data');
} else {
	array_push($info, 'suffix');
	array_push($error, 'ok');
}

if(!empty($gender)){
	array_push($info, 'gender');
	array_push($error, 'ok'); 
} else {
	array_push($info, 'gender');
	array_push($error, 'Must input data');
}

if(!empty($birthdate)){
	array_push($info, 'birthdate');
	array_push($error, 'ok'); 
} else {
	array_push($info, 'birthdate');
	array_push($error, 'Must input data');
}

$data = array(
	// 'fname'		=>	$fname,
	// 'mname'		=>	$mname,
	// 'lname'		=>	$lname,
	// 'suffix'	=>	$suffix,
	// 'gender'	=>	$gender,
	// 'birthdate'	=>	$birthdate,
	'info'		=>	$info,
	'error'		=>	$error,
);

echo json_encode($data);

?>