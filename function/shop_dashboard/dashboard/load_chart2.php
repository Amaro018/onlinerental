<?php 

include '../../connection.php';
$shop_no = $_POST['shop_no'];

$item_no = array();
$star = array();
$star_sum = 0;

$item = $con->query("SELECT * FROM tbl_item WHERE shop_no = '$shop_no' ");
while($item_row = mysqli_fetch_array($item)){
	array_push($item_no, $item_row['item_no']);
}

for($a = 0; $a < count($item_no); $a++){
	$rate = $con->query("SELECT * FROM tbl_product_rate_reviews WHERE item_no = '$item_no[$a]' ");
	while($rate_row = mysqli_fetch_array($rate)){
		array_push($star, $rate_row['rate']);
	}
}

$star_sum = array_sum($star);

$data = array(
	'item_no'	=>	$item_no,
	'star_sum'	=>	$star_sum,
	'star'		=>	$star,
	'num'		=>	count($star)
);

echo json_encode($data);

?>