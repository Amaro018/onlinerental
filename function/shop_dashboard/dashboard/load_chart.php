<?php 

include '../../connection.php';
$shop_no = $_POST['shop_no'];

$item_no = array();
$star = array();
$count = array();

$arr = array(1,2,3,4,5);

$item = "SELECT * FROM tbl_item WHERE shop_no = '$shop_no' ";
$item_query = mysqli_query($con, $item);
while($item_row = mysqli_fetch_array($item_query)){
	array_push($item_no, $item_row['item_no']);
}

for($a = 0; $a < count($item_no); $a++){
	$date = "SELECT * FROM tbl_product_rate_reviews WHERE item_no = '$item_no[$a]' ";
	$query = mysqli_query($con, $date);
	while($row = mysqli_fetch_array($query)){
		array_push($star, $row['rate']);
	}
}
$d = 0;

for($b = 0; $b < count($arr); $b++){
	for($c = 0; $c < count($star); $c++){
		if($arr[$b] == $star[$c]){
			$d++;
		}
	}
	array_push($count, $d);
	$d = 0;
}

$data = array(
	'item_no'		=>	$item_no,
	'star'			=>	$star,
	'count'			=>	$count,
	'arr'			=>	$arr
);

echo json_encode($data);

?>