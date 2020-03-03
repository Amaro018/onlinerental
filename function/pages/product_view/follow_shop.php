<?php 

include '../../connection.php';
$accNo = $_POST['accNo'];
$shop_no = $_POST['shop_no'];
$text = $_POST['text'];

$output = '';
$newTxt = '';

if($text == 'Follow'){
	$con->query("INSERT INTO tbl_shop_followers VALUES('','$accNo','$shop_no')");
	$output .= 'Shop has been followed';
	$newTxt .= 'Unfollow';
} else {
	$con->query("DELETE FROM tbl_shop_followers WHERE accNo = '$accNo' AND shop_no = '$shop_no' ");
	$output .= 'Shop has been unfollowed';
	$newTxt .= 'Follow';
}

$data = array(
	'output'	=>	$output,
	'text'		=>	$newTxt
);

echo json_encode($data);
?>