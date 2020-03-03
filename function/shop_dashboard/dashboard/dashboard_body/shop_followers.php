<?php 

include '../../../connection.php';
$shop_no = $_POST['shop_no'];
$count = 0;

$follow = $con->query("SELECT COUNT(follower_no) FROM tbl_shop_followers WHERE shop_no = '$shop_no' ");
$follow_num = mysqli_num_rows($follow);

if($follow_num != 0){
	$follow_row = mysqli_fetch_array($follow);
	$count = $follow_row[0];
}

echo $count;

?>