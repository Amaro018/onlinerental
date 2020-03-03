<?php

include '../../../connection.php';
$item_no = $_POST['item_no'];

$var = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ");
$var_row = mysqli_fetch_array($var);

$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' ");
$tr_num = mysqli_num_rows($tr);

$qty = $var_row['qty'];
$qtyA = $var_row['qty'];

if($tr_num  != 0){
	while($tr_row = mysqli_fetch_array($tr)){
		$strdate = strtotime($tr_row['date_to_be_rent']);
		$ceil = ceil(($strdate-time())/60/60/24);
		if($ceil <= 4){
			$qtyA -= $tr_row['rent_quantity']; 
		}	
	}
}

$data = array(
	'qty'	=>	$qty,
	'qtyA'	=>	$qtyA,
);

echo json_encode($data);

?> 