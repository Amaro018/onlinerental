<?php 

$st = sanitize($_POST['st']);
$brgy = sanitize($_POST['brgy']);
$city = sanitize($_POST['city']);
$zone = sanitize($_POST['zone']);
$contact = $_POST['contact'];

function sanitize($data){
	$test = trim($data);
	$test = stripslashes($test);
	$test = htmlspecialchars($test);
	$test = filter_var($test, FILTER_SANITIZE_STRING);
	return $test;
}

if(!empty($st)){
	if(!filter_var($st, FILTER_VALIDATE_INT) === false) {
		$st = 'st';
	} else {
		$st = 'ok';
	}
} else {
	$st = 'st';
}

if(!empty($brgy)){
	if(!filter_var($brgy, FILTER_VALIDATE_INT) === false) {
		$brgy = 'brgy';
	} else {
		$brgy = 'ok';
	}
} else {
	$brgy = 'brgy';
}

if(!empty($city)){
	if(!filter_var($city, FILTER_VALIDATE_INT) === false) {
		$city = 'city';
	} else {
		$city = 'ok';
	}
} else {
	$city = 'city';
}

if(!empty($zone)){
	$zone = 'ok';
} else {
	$zone = 'zone';
}

// if(! /^[0-9]{11}$/.test($contact)){
// 	$contact = 'contact';
// } else {
// 	$contact = 'ok';
// }

if(!preg_match('/^[0-9]{11}$/', $contact, $array)){
	$contact = 'contact';
} else {
	$contact = 'ok';
}

$data = array(
	'st'		=>	$st,
	'brgy'		=>	$brgy,
	'zone'		=>	$zone,
	'city'		=>	$city,
	'contact'	=>	$contact,
);

echo json_encode($data);

?>