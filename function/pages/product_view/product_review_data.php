<?php 

include '../../connection.php';
$item_no = $_POST['item_no'];
$output = '';

$rate_count = array();
$rate_sum = 0;

$product_rate = "SELECT * FROM tbl_product_rate_reviews WHERE item_no = '$item_no' ";
$product_rate_query = mysqli_query($con, $product_rate);
$product_rate_num = mysqli_num_rows($product_rate_query);

for($a = 5; $a > 0; $a--){
	$count = "SELECT COUNT(rate) FROM tbl_product_rate_reviews WHERE item_no = '$item_no' AND rate = '$a' ";
	$query = mysqli_query($con, $count);
	$row = mysqli_fetch_array($query);

	array_push($rate_count, $row[0]);
}

if($product_rate_num != 0){
	while($product_rate_row = mysqli_fetch_array($product_rate_query)){
		$review_img = "SELECT * FROM tbl_product_rate_reviews_img WHERE review_no = '$product_rate_row[0]' ";
		$review_img_query = mysqli_query($con, $review_img);
		$review_img_num = mysqli_num_rows($review_img_query);

		$rate_sum += $product_rate_row['rate']; 
		$output .= '
		<div class="card my-2">
			<div class="card-body">';
			for($d = 5; $d > 5-$product_rate_row['rate']; $d--){
				$output .= '
					<i class="fa fa-star text-warning"></i>
				';
			}
			for($c = 5; $c > $product_rate_row['rate']; $c--){
				$output .= '
					<i class="fa fa-star text-secondary"></i>
				';	
			}
		$output.= '
				<label class="float-right">'.$product_rate_row['review_date'].'</label>
				<p>'.$product_rate_row['reviews'].'</p>
				<div class="row">';
				if($review_img_num != 0){
					while($review_img_row = mysqli_fetch_array($review_img_query)){
						$output .= '
							<div class="col-md-2">
								<div class="card">
									<div style="width:auto; height:100px; padding: 0;overflow: hidden;">
										<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$review_img_row['review_img_name'].'" style="vertical-align: middle;" class="w-100">
									</div>
								</div>
							</div>
						';
					}
				}
		$output .= '
				</div>
				</div>
			</div>
		</div>
		';
	}
} else {
	$output .= '
		<div class="card my-2">
			<div class="card-body">
				<h3 class="text-center text-secondary">There are no reviews.</h3>
			</div>
		</div>
	';
}

$data = array(
	'output'		=>	$output,
	'rate_count'	=>	$rate_count,
	'rate_sum'		=>	$rate_sum,
	'rate_num'		=>	$product_rate_num
);

echo json_encode($data);

?>