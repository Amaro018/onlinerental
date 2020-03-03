<?php 

include '../../connection.php';

$cart_no = json_decode($_POST['cart_no'], true);
$data = array();

$no = array();
// $qty = array();
// $tr_qty = array();


for($a = 0; $a < count($cart_no); $a++){
	$cart = "SELECT * FROM tbl_cart WHERE cart_no = '$cart_no[$a]' ";
	$cart_query = mysqli_query($con, $cart);
	$cart_row = mysqli_fetch_array($cart_query);

	$var = "SELECT * FROM tbl_item_size WHERE item_no = '$cart_row[2]' AND color = '$cart_row[5]' AND size = '$cart_row[4]'  ";
	$var_query = mysqli_query($con, $var);
	$var_row = mysqli_fetch_array($var_query);

	$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$cart_row[2]' AND rent_color = '$cart_row[5]' AND rent_size = '$cart_row[4]' ";
	$tr_query = mysqli_query($con, $tr);
	// while($tr_row = mysqli_fetch_array($tr_query)){
	// 	array_push($data, $tr_row['transaction_no']);
	// 	array_push($no, $cart_no[$a]);
	// 	array_push($qty, $var_row['qty']);
	// 	array_push($tr_qty, $tr_row['rent_quantity']);
	// }
	$rent_total = 0;
	while($tr_row = mysqli_fetch_array($tr_query)){
		$rent_total += $tr_row['rent_quantity'];
	}
	array_push($no, $cart_no[$a]);
	$total = $var_row['qty'] - $rent_total;
	array_push($data, $total);
	// array_push($qty, $var_row['qty']);
	// array_push($tr_qty, $rent_total);
}

$arr = array(
	'data'		=>	$data,
	'no'		=>	$no
	// 'qty'		=>	$qty,
	// 'tr_qty'	=>	$tr_qty
);

echo json_encode($arr);

?>