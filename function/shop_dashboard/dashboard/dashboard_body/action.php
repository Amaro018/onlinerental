<?php 

include '../../../connection.php';
$tr_no = $_POST['tr_no'];
$text = '';

$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE transaction_no = '$tr_no' ");
$tr_row = mysqli_fetch_array($tr);

if($tr_row['rent_delivery_option'] != 'ship'){
	$text = 'Pickup';
	$con->query("UPDATE tbl_transaction_log SET transaction_status = '$text' WHERE transaction_no = '$tr_no' ");
} else {
	$text = 'Delivered';
	$con->query("UPDATE tbl_transaction_log SET transaction_status = '$text' WHERE transaction_no = '$tr_no' ");
}

echo $text;

?>