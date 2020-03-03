<?php 

include '../../connection.php';
$output = '';

$item = "SELECT * FROM tbl_item ";
$item_query = mysqli_query($con, $item);
$item_num = mysqli_num_rows($item_query);

if($item_num != 0){
	while($item_row = mysqli_fetch_array($item_query)){

		$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_row[1]' ";
		$var_query = mysqli_query($con, $var);
		$var_row = mysqli_fetch_array($var_query);

		$img = "SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[0]' ";
		$img_query = mysqli_query($con, $img);
		$img_num = mysqli_num_rows($img_query);
		$img_row = mysqli_fetch_array($img_query);

		if($img_num != 0){
			$src = 'upload/'.$img_row['item_photo_name'];
		} else {
			$src = 'images/php.png';
		}

		$output .= '
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="card">
					<div style="width:auto; height:250px;padding: 0;overflow: hidden;">
						<a href="product_desc.php?item_no='.$item_row['item_no'].'"><span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="'.$src.'" style="vertical-align: middle;" class="w-100"></a>
					</div>
					<div class="card-footer">
						<h5 class="card-title">'.$item_row['item_name'].'</h5>
						<p class="card-text">&#8369; '.$var_row['price'].'</p>
					</div>
				</div>
			</div>
		';
	}
}

echo $output;

?>

