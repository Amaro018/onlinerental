<?php

include '../../../connection.php';
$accNo = $_POST['accNo'];

$user = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$accNo' ");
$user_row = mysqli_fetch_array($user);

$st = $user_row['a_st'];
$zone = $user_row['a_zone'];
$brgy = $user_row['a_brgy'];
$city = $user_row['a_city'];

$data = array(
	'st'		=>	$st,
	'zone'		=>	$zone,
	'brgy'		=>	$brgy,
	'city'		=>	$city,
);

echo json_encode($data);

?>