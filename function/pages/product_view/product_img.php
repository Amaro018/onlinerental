<?php

include '../../connection.php';

$item_no = $_POST['item_no'];
$output = '';

$img1 = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' LIMIT 1";
$img_query = mysqli_query($con, $img1);
while($img_row = mysqli_fetch_array($img_query)){
	$output .= '
		<div class="card">
			<div style="height: 60%;">
        	<span style="display: inline-block;height: 100%;vertical-align: middle;"></span><img id="expandedImg" src="upload/'.$img_row['item_photo_name'].'" style="vertical-align: middle;" class="w-100">
	     	</div>	
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
		
	';
	$img2 = "SELECT * FROM tbl_item_photo_name WHERE variants_no = '$img_row[1]' ";
	$img2_query = mysqli_query($con, $img2);
	while($img2_row = mysqli_fetch_array($img2_query)){
		$output .= '
			<div class="col-md-4">
				<div class="card">
					<div style="height: 15%;">
			        	<span style="display: inline-block;height: 100%;vertical-align: middle"></span><img src="upload/'.$img2_row['item_photo_name'].'" style="vertical-align: middle;" class="w-100 imgs">
			     	</div>
				</div>
			</div>
		';
	}
	$output .= '
				</div>
			</div>
		</div>
	';
}

echo $output;

?>

