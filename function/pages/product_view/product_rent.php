<?php 

include '../../connection.php';

if(isset($_POST['color'])){
	$color = $_POST['color'];
} else {
	$color = '';
}

if(isset($_POST['size'])){
	$size = $_POST['size'];
} else {
	$size = '';
}

$start = $_POST['sDate'];
$return = $_POST['rDate'];
$current = $_POST['cDate'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$type_of_ship = $_POST['type_of_ship'];
$img_name = $_POST['img_name'];
$item_name = $_POST['item_name'];

$item_no = $_POST['item_no'];
$accNo = $_POST['accNo'];

$st = $_POST['st'];
$zone = $_POST['st'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];

$a = 'not available';
$b = 'on process';
$c = $return;

$review_status = 0;

$tr = "INSERT INTO tbl_transaction_log values('',$item_no,$accNo,$qty,'$color','$size','$type_of_ship','$st','$zone','$brgy','$city','$current','$start','$return','$c','$a','$b',$review_status) ";
mysqli_query($con, $tr);

echo $item_no;

?>