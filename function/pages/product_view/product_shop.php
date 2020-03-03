<?php

include '../../connection.php';
$item_no = $_POST['item_no'];
$data = '';

if(!empty($_POST['accNo'])){
	$avail = $con->query("SELECT * FROM tbl_item WHERE item_no = '$item_no' ");
	$avail_row = mysqli_fetch_array($avail);

	$accNo = $_POST['accNo'];
	$follow = $con->query("SELECT * FROM tbl_shop_followers WHERE accNo = '$accNo' AND shop_no = '$avail_row[0]' ");
	$follow_num = mysqli_num_rows($follow);

	if($follow_num != 0){
		$data = 'Unfollow';

	} else {
		$data = 'Follow';
	}

} else {
	$data = 'Follow';
}

$item = "SELECT * FROM tbl_item WHERE item_no = '$item_no' ";
$item_query = mysqli_query($con, $item);
$item_row = mysqli_fetch_array($item_query);

$shop = "SELECT * FROM tbl_shop WHERE shop_no = '$item_row[0]' ";
$shop_query = mysqli_query($con, $shop);
$shop_row = mysqli_fetch_array($shop_query);


$output = '
	<div class="card">
		<div class="card-body">
			<h5 class="text-secondary goto_shop" id="'.$shop_row['shop_no'].'" style="cursor: pointer;">'.$shop_row['shop_name'].'</h5>
			<div class="row" align="center">
				<div class="col-md-6">
					<h5 class="chat_shop" id="'.$shop_row['shop_no'].'" style="cursor: pointer; color: rgba(9, 15, 126, 0.8)"><i class="fa fa-comments"></i> Chat</h5>
				</div>
				<div class="col-md-6">
					<h5 class="follow_shop" id="'.$shop_row['shop_no'].'" style="cursor: pointer; color: rgba(19, 30, 253, 0.8)"><i class="fa fa-location-arrow"></i>'.$data.'</h5>
				</div>
			</div>
			<hr>
		</div>
	</div>
';

echo $output;

?>