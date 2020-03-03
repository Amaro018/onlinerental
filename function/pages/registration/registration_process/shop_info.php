<?php 

$shopname = sanitize($_POST['shopname']);
$shopemail = sanitize($_POST['shopemail']);
$shopdescription = sanitize($_POST['shopdescription']);
$shopst = sanitize($_POST['shopst']);
$shopzone = sanitize($_POST['shopzone']);
$shopbrgy = sanitize($_POST['shopbrgy']);
$shopcity = sanitize($_POST['shopcity']);
$shopcontact = $_POST['shopcontact'];

function sanitize($data){
	$test = trim($data);
	$test = stripslashes($test);
	$test = htmlspecialchars($test);
	$test = filter_var($test, FILTER_SANITIZE_STRING);
	return $test;
}

if(!empty($shopname)){
	if(!filter_var($shopname, FILTER_VALIDATE_INT) === false) {
		$shopname = 'shopname';
	} else {
		$shopname = 'ok';
	}
} else {
	$shopname = 'shopname';
}

if(!empty($shopemail)){
	if(!filter_var($shopemail, FILTER_VALIDATE_EMAIL)){
		$shopemail = 'shopemail';
	} else {
		$shopemail = 'ok';
	}
} else {
	$shopemail = 'shopemail';
}

if(!empty($shopdescription)){
	if(!filter_var($shopdescription, FILTER_VALIDATE_INT) === false) {
		$shopdescription = 'shopdescription';
	} else {
		$shopdescription = 'ok';
	}
} else {
	$shopdescription = 'shopdescription';
}

if(!empty($shopst)){
	if(!filter_var($shopst, FILTER_VALIDATE_INT) === false) {
		$shopst = 'shopst';
	} else {
		$shopst = 'ok';
	}
} else {
	$shopst = 'shopst';
}

if(!empty($shopzone)){
	// if(!filter_var($shopzone, FILTER_VALIDATE_INT) === false) {
	// 	$shopzone = 'shopzone';
	// } else {
		$shopzone = 'ok';
	// }
} else {
	$shopzone = 'shopzone';
}

if(!empty($shopbrgy)){
	if(!filter_var($shopbrgy, FILTER_VALIDATE_INT) === false) {
		$shopbrgy = 'shopbrgy';
	} else {
		$shopbrgy = 'ok';
	}
} else {
	$shopbrgy = 'shopbrgy';
}

if(!empty($shopcity)){
	if(!filter_var($shopcity, FILTER_VALIDATE_INT) === false) {
		$shopcity = 'shopcity';
	} else {
		$shopcity = 'ok';
	}
} else {
	$shopcity = 'shopcity';
}

if(!preg_match('/^[0-9]{11}$/', $shopcontact)){
	$shopcontact = 'shopcontact';
} else {
	$shopcontact = 'ok';
}


$data = array(
	'shopname'			=>	$shopname,
	'shopemail'			=>	$shopemail,
	'shopdescription'	=>	$shopdescription,
	'shopst'			=>	$shopst,
	'shopzone'			=>	$shopzone,
	'shopbrgy'			=>	$shopbrgy,
	'shopcity'			=>	$shopcity,
	'shopcontact'		=>	$shopcontact,
);

echo json_encode($data);
?>