<?php 

include '../../connection.php';
$output = '';
$shop_no = $_POST['shop_no'];

$item_arr = array();
$tr_arr = array();
$review_arr = array();

$most = 0;
$item_no_most = 0;
$high = 0;
$item_no_high = 0;

$item = $con->query("SELECT * FROM tbl_item WHERE shop_no = '$shop_no' ");
$item_num = mysqli_num_rows($item);
	while($item_row = mysqli_fetch_array($item)){
		array_push($item_arr, $item_row['item_no']);

		$tr = $con->query("SELECT COUNT(transaction_no) FROM tbl_transaction_log WHERE item_no = '$item_row[item_no]' ");
		$tr_num = mysqli_num_rows($tr);
		
		if($tr_num != 0){
			while($tr_row = mysqli_fetch_array($tr)){
				array_push($tr_arr, $tr_row[0]);
			}
		}

		$review = $con->query("SELECT COUNT(review_no) FROM tbl_product_rate_reviews WHERE item_no = '$item_row[item_no]' ");
		$review_num = mysqli_num_rows($review);

		if($review_num != 0){
			while($review_row = mysqli_fetch_array($review)){
				array_push($review_arr, $review_row[0]);
			}
		}
		
	}

	for($a = 0; $a < count($tr_arr); $a++){
		for($b = 0; $b < count($tr_arr); $b++){
			if($tr_arr[$a] > $tr_arr[$b]){
				if($tr_arr[$a] > $most){
					$most =  $tr_arr[$a];
					$item_no_most = $item_arr[$a];
				}
			} else {
				if($tr_arr[$b] > $most){
					$most =  $tr_arr[$b];
					$item_no_most = $item_arr[$b];
				}
			}
		}
	}

	for($a = 0; $a < count($review_arr); $a++){
		for($b = 0; $b < count($review_arr); $b++){
			if($review_arr[$a] > $review_arr[$b]){
				if($review_arr[$a] > $high){
					$high =  $review_arr[$a];
					$item_no_high = $item_arr[$a];
				}
			} else {
				if($review_arr[$b] > $high){
					$high =  $review_arr[$b];
					$item_no_high = $item_arr[$b];
				}
			}
		}
	}

if($item_num != 0){
	$item_data = $con->query("SELECT * FROM tbl_item WHERE item_no = '$item_no_most' ");
	$item_data_row = mysqli_fetch_array($item_data);

	$img = $con->query("SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no_most' ");
	$img_row = mysqli_fetch_array($img);

	$output .= '
		<div class="my-2">
			<h5 class="text-secondary">
				<i class="fa fa-fire text-danger"></i> Hottest Item
			</h5>
			<div class="row">
				<div class="col-md-4">
					<div style="width: 5rem; height: 5rem; border: 1px solid #ddd; align-items: center; display: flex; border-radius: 10%; overflow: hidden;">
						<img src="upload/'.$img_row['item_photo_name'].'" class="w-100" style="vertical-align:middle;">
					</div>
				</div>
				<div class="col-md-8">
					<label class="text-secondary">Item Name: '.ucfirst($item_data_row['item_name']).'</label>
					<p class="text-secondary">Item Description: '.$item_data_row['item_desc'].'</p>
				</div>
			</div>
		</div>
	';

	$item_data1 = $con->query("SELECT * FROM tbl_item WHERE item_no = '$item_no_high' ");
	$item_data_row1 = mysqli_fetch_array($item_data1);

	$img1 = $con->query("SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no_high' ");
	$img_row1 = mysqli_fetch_array($img1);

	$output .= '
		<div class="my-2">
			<h5 class="text-secondary">
				<i class="fa fa-star text-warning"></i> Most Rated Item
			</h5>
			<div class="row">
				<div class="col-md-4">
					<div style="width: 5rem; height: 5rem; border: 1px solid #ddd; align-items: center; display: flex; border-radius: 10%; overflow: hidden;">
						<img src="upload/'.$img_row1['item_photo_name'].'" class="w-100" style="vertical-align:middle;">
					</div>
				</div>
				<div class="col-md-8">
					<label class="text-secondary">Item Name: '.ucfirst($item_data_row1['item_name']).'</label>
					<p class="text-secondary">Item Description: '.$item_data_row1['item_desc'].'</p>
				</div>
			</div>
		</div>
	';
} else {
	$output .= '
		<div class="my-2">
			<h5 class="text-secondary">
				<i class="fa fa-fire text-danger"></i> Hottest Item
			</h5>
			<div class="lead text-secondary text-center my-4">
				No data
			</div>
			<h5 class="text-secondary">
				<i class="fa fa-star text-warning"></i> Most Rated Item
			</h5>
			<div class="lead text-secondary text-center my-4">
				No data
			</div>
		</div>
	';
}


$data = array(
	'output'	=>	$output,
);

echo json_encode($data);
?>


