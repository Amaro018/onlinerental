 <?php 

include '../../../connection.php';
$shop_no = $_POST['shop_no'];
$item_no = array();
$tr_no = array();
$date_arrange = array();
$tobe_pickup = 0;

$item = "SELECT * FROM tbl_item WHERE shop_no = '$shop_no' ";
$item_query = mysqli_query($con, $item);
$item_num = mysqli_num_rows($item_query);

if($item_num != 0){
	while($item_row = mysqli_fetch_array($item_query)){
		array_push($item_no, $item_row['item_no']);
	}
}
$date = date('Y-m-d');

for($a = 0; $a < count($item_no); $a++){
	$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no[$a]' AND rent_date = '$date' AND rent_delivery_option = 'pickup' ";
	$tr_query = mysqli_query($con, $tr);
	$tr_num = mysqli_num_rows($tr_query);

	if($tr_num != 0){
		while($tr_row = mysqli_fetch_array($tr_query)){
			$tobe_pickup += 1;
			array_push($tr_no, $tr_row['transaction_no']);
		}
	}
}

$arrange = "SELECT * FROM tbl_transaction_log ORDER BY date_to_be_rent";
$query = mysqli_query($con, $arrange);
while($row = mysqli_fetch_array($query)){
	for($b = 0; $b < count($tr_no); $b++){
		if($row['transaction_no'] == $tr_no[$b]){
			array_push($date_arrange, $tr_no[$b]);
		}
	}
}

$data = array(
	'item_no'		=>	$item_no,
	'tr_no'			=>	$tr_no,
	'date_arrange'	=>	$date_arrange,
	'tobe_pickup'	=>	$tobe_pickup
);

echo json_encode($data);

?>