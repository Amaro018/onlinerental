<?php 

include '../../../connection.php';
session_start();

$item_no = $_POST['item_no'];
$accNo = $_POST['accNo'];
$output1 = '';

$color_arr = array('Red','Blue','Yellow','Violet','Green','Indigo','Orange','Black');
$size_arr = array('Xsmall','Small','Medium','Large','Xlarge');
$color_data =  array();
$size_data =  array();

$vv = array();

$i = 0;

$v = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ";
$v_q = mysqli_query($con, $v);
$v_n = mysqli_num_rows($v_q);

while($v_r = mysqli_fetch_array($v_q)){
	array_push($vv, $v_r['color']);
}

$item = "SELECT * FROM tbl_item WHERE item_no = '$item_no' ";
$item_query = mysqli_query($con, $item);
while($item_row = mysqli_fetch_array($item_query)) {

	$variants_no = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no'";
	$variants_no_query = mysqli_query($con, $variants_no);
	$row_no = mysqli_fetch_array($variants_no_query);

	$log = "SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' AND rent_size = '$row_no[4]' AND rent_color = '$row_no[5]' AND item_status = 'not available' ";
	$log_query = mysqli_query($con, $log);
	$log_row = mysqli_fetch_array($log_query);

	$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$row_no[0]' ";
	$img_query = mysqli_query($con, $img);
	$img_row = mysqli_fetch_array($img_query);
		$output1 .= '
			<div class="col-md-3"> 		
				<div class="card bg-light">
					<div style="width:auto; height:214px;padding: 0;overflow: hidden;">
						<span style="display: inline-block;height: 100%; vertical-align: middle"></span><img id="switchImg" src="upload/'.$img_row['item_photo_name'].'" style="vertical-align: middle;" class="w-100">
						<input type="hidden" value="'.$img_row['item_photo_name'].'" id="img_name" name="img_name"> 
					</div>
				</div>
				<div align="center">
					<label class="text-capitalize">'.$item_row['item_name'].'</label>
					<input type="hidden" value="'.$item_row['item_name'].'" id="item_name" name="item_name"> 
					<p id="per_price">&#8369;'.number_format($row_no['price'], 2).'</p>
					<input type="hidden" value="'.number_format($row_no['price'], 2).'" id="price" name="price"> 
					<input type="hidden" value="'.$item_no.'" id="item_no" name="item_no"> 
					<input type="hidden" value="'.$accNo.'" id="accNo" name="accNo"> 
				</div>
			</div>
			<div class="col-md-1" id="img_group">
		';

	$img_query2 = mysqli_query($con, $img);
	while($img_row2 = mysqli_fetch_array($img_query2)) {
		$output1 .= '
			<div class="card bg-light" id="imgDiv'.$i.'">
				<div style="width:auto; height:70px;padding: 0;overflow: hidden;">
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_row2['item_photo_name'].'" id="img'.$i.'" style="vertical-align: middle;" class="w-100 img-switch">
				</div>
			</div>
		';
		$i++;
	}

	$output1 .= '</div><div class="col-md-7 offset-md-1"><div class="form-group">';

	$variants = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no'";
	$variants_query = mysqli_query($con, $variants);
	while($variants_row = mysqli_fetch_array($variants_query)) {
		if(count($color_data) == 0) {
			for($b = 0; $b < count($color_arr); $b++) {
				if(trim($variants_row['color']) == $color_arr[$b]) {
					array_splice($color_arr, $b, 1);
					array_push($color_data, trim($variants_row['color']));
					$output1 .= '
						<label>Color:</label><em><small class="text-danger ml-4" id="color_label">'.trim($variants_row['color']).'</small></em><br>
						<button type="button" class="btn btn-outline-primary color" style="border-radius:20px" id="color'.trim($variants_row['color']).'">'.trim($variants_row['color']).'</button>
					';	
				}	
			}
		} else {
			for($a = 0; $a < count($color_data); $a++) {
				for($b = 0; $b < count($color_arr); $b++) {
					if(trim($variants_row['color']) == $color_arr[$b]) {
						if(trim($variants_row['color']) != $color_data[$a]) {
							array_splice($color_arr, $b, 1);
							array_push($color_data, trim($variants_row['color']));
							$output .= '
								<button type="button" class="btn btn-outline-primary color" style="border-radius:20px" id="color'.trim($variants_row['color']).'">'.trim($variants_row['color']).'</button>
							';
						}
					}
				}
			}
		}		
	}

	$output1 .= '</div><div class="form-group" id="size_group">';

	$variants_query1 = mysqli_query($con, $variants);
	while($variants_row1 = mysqli_fetch_array($variants_query1)) {
		if(count($size_data) == 0) {
			for($b = 0; $b < count($size_arr); $b++) {
				if(trim($variants_row1['size']) == $size_arr[$b]) {
					array_splice($size_arr, $b, 1);
					array_push($size_data, trim($variants_row1['size']));
					$output1 .= '
						<label>Size:</label><em><small class="text-danger ml-4" id="size_label">'.trim($variants_row1['size']).'</small></em><br>
						<button type="button" class="btn btn-outline-primary size" style="border-radius:20px" id="size'.trim($variants_row1['size']).'">'.trim($variants_row1['size']).'</button>
					';		
				}	
			}
		} else {
			for($a = 0; $a < count($size_data); $a++) {
				for($b = 0; $b < count($size_arr); $b++) {
					if(trim($variants_row1['size']) == $size_arr[$b]) {
						if(trim($variants_row1['size']) != $size_data[$a]) {
							array_splice($size_arr, $b, 1);
							array_push($size_data, trim($variants_row1['size']));	
							$output1 .= '
								<button type="button" class="btn btn-outline-primary size" style="border-radius:20px" id="size'.trim($variants_row1['size']).'">'.trim($variants_row1['size']).'</button>
							';
						}
					}
				}
			}
		}	
	}

	$output1 .= '</div><div class="row"><div class="col-md-6"><div class="form-group" id="qty_group"><label id="qty_label">Quantity: </label>';

	$variants1 = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND variants_no = '$row_no[0]' ";
	$variants_query2 = mysqli_query($con, $variants1);
	while($variants_row2 = mysqli_fetch_array($variants_query2)) {
		$var1 = $variants_row2['qty']; 
		$var2 = $log_row['rent_quantity'];
		$qty_val = $var1 - $var2;
		if($qty_val > 1) {
			$text = ' items available.';
		} else {
			$text = ' item available.';
		}
		$output1 .='
		<div class="input-group">
			<input type="number" readonly id="qty" name="qty" class="form-control col-md-6 bg-white" value="1">
			<input type="hidden" id="max_qty">
			<div class="input-group-append">
				<button type="button" class="btn btn-outline-default input-group-text" id="subBtn" disabled><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-outline-default input-group-text" id="addBtn" disabled><i class="fa fa-plus"></i></button>
			</div>
		</div>
		<small id="stock" class="container text-danger"></small>
		<small id="available" class="container text-success"></small>
		';
	}

	$output1 .= '</div></div>
			<div class="col-md-6">
				<label>Delivery Options: </label>
				<div class="custom-control custom-radio">
					<input type="radio" class="custom-control-input" id="pickup" name="options" >
					<label class="custom-control-label" for="pickup">Pickup</label>
				</div> 
				<div class="custom-control custom-radio">
					<input type="radio" class="custom-control-input" id="ship" name="options" >
					<label class="custom-control-label" for="ship">Deliver</label>
				</div> 
				<input type="hidden" value="" name="type_of_ship" id="type_of_ship"> 
			</div>
		</div>
	';

	$output1 .= '
		<button type="submit" id="rent_now" class="btn col-md-5" style="background-color: rgba(253, 126, 20, 0.8); color: white"><i class="fa fa-plus"></i> Rent Now</button>
		<button type="button" id="add_to_cart" class="btn col-md-5" style="background-color: rgba(9, 15, 126, 0.8); color:white;"><i class="fa fa-cart-plus"></i> Add to Cart</button>
		';

	$output1 .= '</div>';
}

$output1 .= '
	<input type="hidden" id="color" name="color" value="">
	<input type="hidden" id="size" name="size" value="">
';


$data = array(
	'output1'		=>	$output1,
	'var'			=>	$v_n,
	'color'			=> 	$vv
	/*'color'			=>	$color_data,
	'color_arr'		=>	$color_arr,
	'size'			=>	$size_data,
	'size_arr'		=>	$size_arr*/
);

echo json_encode($data);
?>

