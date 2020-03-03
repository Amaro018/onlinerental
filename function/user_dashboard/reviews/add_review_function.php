<?php 

include '../../connection.php';
$rate = $_POST['rate'];
$review = $_POST['review'];
$tr_no = $_POST['tr_no'];
$date = date("Y-m-d H:i:sa"); 

$tr = "SELECT * FROM tbl_transaction_log WHERE transaction_no = '$tr_no' ";
$tr_query = mysqli_query($con, $tr);
$tr_row = mysqli_fetch_array($tr_query);

$tr_update = "UPDATE tbl_transaction_log SET review_status = 1 WHERE transaction_no = '$tr_no'  ";
mysqli_query($con, $tr_update);

$product_rate = "INSERT INTO tbl_product_rate_reviews values('','$tr_no','$tr_row[2]','$tr_row[1]','$rate','$review','$date') ";
mysqli_query($con, $product_rate);

$last_id = $con->insert_id;

echo $last_id;

?>