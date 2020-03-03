<?php 

include '../../connection.php';
$output = '';
$item_sum = array();
$item_no = array();
$item_count = array();

if(!empty($_POST['category'])){
	$category = $_POST['category'];
	$all_category = implode("','",$category);
	// $all_category = implode("','",$category);
	// ".implode("','", $category)." ?? this is working
	$cat = $con->query("SELECT * FROM tbl_category WHERE category_no IN ('$all_category') ");
	// $item = "SELECT * FROM tbl_item WHERE item_category IN ('$all_category') LIMIT 0, 19 ";
	// $item_query = mysqli_query($con, $item);
	// $item_num = mysqli_num_rows($item_query);
} else{
	$cat = $con->query("SELECT * FROM tbl_category");
	// $item = "SELECT * FROM tbl_item LIMIT 0, 19";
	// $item_query = mysqli_query($con, $item);
	// $item_num = mysqli_num_rows($item_query);
}

while($cat_row = mysqli_fetch_array($cat)){
	$item = $con->query("SELECT * FROM tbl_item WHERE category_no = '$cat_row[category_no]' ");
	$item_num = mysqli_num_rows($item);

	if($item_num != 0){
		// $output .= '<div class="row no-gutters mb-2">';
		while($item_row = mysqli_fetch_array($item)){
			if(!empty($_POST['size']) && !empty($_POST['color'])){
				$size = $_POST['size'];
				$color = $_POST['color'];
				$all_size = implode("','", $size);
				$all_color = implode("','", $color);

				$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_row[item_no]' AND size IN ('$all_size') AND color IN ('$all_color')";
				$var_query = mysqli_query($con, $var);
				$var_num = mysqli_num_rows($var_query);
				$var_row = mysqli_fetch_array($var_query);
			}
			else if(!empty($_POST['size']) && empty($_POST['color'])){
				$size = $_POST['size'];
				$all_size = implode("','", $size);

				$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_row[item_no]' AND size IN ('$all_size') ";
				$var_query = mysqli_query($con, $var);
				$var_num = mysqli_num_rows($var_query);
				$var_row = mysqli_fetch_array($var_query);
			}
			else if(empty($_POST['size']) && !empty($_POST['color'])){
				$color = $_POST['color'];
				$all_color = implode("','", $color);

				$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_row[item_no]' AND color IN ('$all_color') ";
				$var_query = mysqli_query($con, $var);
				$var_num = mysqli_num_rows($var_query);
				$var_row = mysqli_fetch_array($var_query);
			} 
			else{
				$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_row[item_no]' ";
				$var_query = mysqli_query($con, $var);
				$var_num = mysqli_num_rows($var_query);
				$var_row = mysqli_fetch_array($var_query);
			}

			if($var_num != 0){
				$img = "SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ";
				$img_query = mysqli_query($con, $img);
				$img_num = mysqli_num_rows($img_query);
				$img_row = mysqli_fetch_array($img_query);

				if($img_num != 0){
					$src = 'upload/'.$img_row['item_photo_name'];
				} else {
					$src = 'images/php.png';
				}

				$rate_holder = 0;

				$rate = "SELECT * FROM tbl_product_rate_reviews WHERE item_no = '$item_row[item_no]' ";
				$rate_query = mysqli_query($con, $rate);
				$rate_num = mysqli_num_rows($rate_query);
				while($rate_row = mysqli_fetch_array($rate_query)){
					$rate_holder += $rate_row['rate'];
				}

				array_push($item_count, $rate_num);
				array_push($item_sum, $rate_holder);
				array_push($item_no, $item_row['item_no']);

				$output .= '
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-6 mb-4" id="'.$item_row['item_no'].'">
						<div class="card">
							<div class="border" style="width:100%; height:30%; padding: 0;overflow: hidden;">
								<a href="product_desc.php?item_no='.$item_row['item_no'].'"><span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="'.$src.'" style="vertical-align: middle;" class="w-100"></a>
							</div>
							<div class="card-footer">
								<h5 class="card-title">'.$item_row['item_name'].'</h5>
								<p class="card-text">&#8369; '.$var_row['price'].'</p>
								<div class="stars-outer">
									<div class="stars-inner">
									</div>
								</div>
							</div>
						</div>
					</div>
				';
			} 
		// $output .= '</div>';
		}
	}
}

if($output == ''){
	$output .= '
		<div class="col-md-12">
			<div class="card p-5" align="center">
				<div class="card-body">
					<h3>No data found!</h3>
				</div>
			</div>
		</div>
	';
} else {

}


$data = array(
	'output'		=>	$output,
	'item_sum'		=>	$item_sum,
	'item_no'		=>	$item_no,
	'item_count'	=>	$item_count
);
echo json_encode($data);

?>