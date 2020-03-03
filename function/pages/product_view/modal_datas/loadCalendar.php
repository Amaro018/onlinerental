<?php 

include '../../../connection.php';

$item_no = $_POST['item_no'];
$start = array();
$end = array();

$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' ";
$tr_query = mysqli_query($con, $tr);
while($tr_row = mysqli_fetch_array($tr_query)){
	array_push($start, $tr_row['date_to_be_rent']);
	array_push($end, $tr_row['date_to_be_return']);
}

$data = array(
	'start'	=>	$start,
	'end'	=>	$end
);

echo json_encode($data);
?>