<?php 

include '../../connection.php';
session_start();

$cart_data = json_decode($_POST['cart'], true);
$count = json_decode($_POST['count'], true);
$accNo = $_SESSION['accNo'];
$start = array();
$end = array();

$cart = "SELECT * FROM tbl_cart WHERE accNo = '$accNo' AND cart_no = '$cart_data' ";
$cart_query = mysqli_query($con, $cart);
$cart_row = mysqli_fetch_array($cart_query);

$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$cart_row[2]' ";
$tr_query = mysqli_query($con, $tr);
while($tr_row = mysqli_fetch_array($tr_query)){
	array_push($start, $tr_row['date_to_be_rent']);
	array_push($end, $tr_row['date_to_be_return']);
}

$data = array(
	'start'		=>	$start,
	'end'		=>	$end,
	'cart'		=>	$cart_data,
	'count'		=>	$count
);

echo json_encode($data);
?>