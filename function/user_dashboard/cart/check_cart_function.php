<?php 

include '../../connection.php';

$checkBox = json_decode($_POST['checkBox'], true);
$checkBoxQty = json_decode($_POST['checkBoxQty'], true);
$price = array();

for($a = 0; $a < count($checkBox); $a++) {
	$cart = "SELECT * FROM tbl_cart WHERE cart_no = '$checkBox[$a]' ";
	$cart_query = mysqli_query($con, $cart);
	$cart_row = mysqli_fetch_array($cart_query);
	$pre_total = $cart_row['item_price'] * $checkBoxQty[$a]; 
	// array_push($price, $cart_row['item_price']);
	array_push($price, $pre_total);
}

$total = array_sum($price);

echo $total;
?>