<?php 
include '../../../connection.php';
$output = '';
$item_no = $_POST['item_no'];
$accNo = $_POST['accNo'];

$color_arr = array('Red','Blue','Yellow','Violet','Green','Indigo','Orange','Black');
$size_arr = array('Xsmall','Small','Medium','Large','Xlarge');
$color_data =  array();
$size_data =  array();

$c = array();
$s = array();

$item = $con->query("SELECT * FROM tbl_item WHERE item_no = '$item_no' ");
while($item_row = mysqli_fetch_array($item)) {
	$var = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ");
	$var_row = mysqli_fetch_array($var);

	$img = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	$img_row = mysqli_fetch_array($img);
	$output .= '
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
				<p id="per_price">&#8369;'.number_format($var_row['price'], 2).'</p>
				<input type="hidden" value="'.number_format($var_row['price'], 2).'" id="price" name="price"> 
				<input type="hidden" value="'.$item_no.'" id="item_no" name="item_no"> 
				<input type="hidden" value="'.$accNo.'" id="accNo" name="accNo"> 
			</div>
		</div>
		<div class="col-md-1" id="img_group">
	';
	$i = 0;
	$img1 = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	while($img_row1 = mysqli_fetch_array($img1)){
		$output .= '
			<div class="card bg-light">
				<div style="width:auto; height:70px;padding: 0;overflow: hidden;">
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_row1['item_photo_name'].'" id="img'.$i.'" style="vertical-align: middle;" class="w-100 img-switch">
				</div>
			</div>
		';
		$i++;
	}
	$output .= '
		</div>
		<div class="col-md-7 offset-md-1">
			<div class="form-group" id="color_group">
	';
	$var1 = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ");
	while($var_row1 = mysqli_fetch_array($var1)){
		if(count($color_data) == 0) {
			if($var_row1['color'] != ''){
				for($a = 0; $a < count($color_arr); $a++) {
					if($var_row1['color'] == $color_arr[$a]) {
						array_splice($color_arr, $a, 1);
						array_push($color_data, $var_row1['color']);
						$output .= '
							<label>Color:</label><em><small class="text-danger ml-4" id="color_label"></small></em><br>
							<button type="button" class="btn btn-outline-primary color" style="border-radius:20px" id="color'.$var_row1['color'].'">'.$var_row1['color'].'</button>
						';	
					}	
				}
			}
		} else {
			for($a = 0; $a < count($color_data); $a++) {
				if($var_row1['color'] != ''){
					for($b = 0; $b < count($color_arr); $b++) {
						if($var_row1['color'] == $color_arr[$b]) {
							if($var_row1['color'] != $color_data[$a]) {
								array_splice($color_arr, $b, 1);
								array_push($color_data, $var_row1['color']);
								$output .= '
									<button type="button" class="btn btn-outline-primary color" style="border-radius:20px" id="color'.$var_row1['color'].'">'.$var_row1['color'].'</button>
								';
							}
						}
					}
				}
			}	
		}	
	}
	$output .= '
			</div>
			<div class="form-group" id="size_group">
	';
	$var2 = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ");
	while($var_row2 = mysqli_fetch_array($var2)) {
		if(count($size_data) == 0) {
			for($b = 0; $b < count($size_arr); $b++) {
				if(trim($var_row2['size']) == $size_arr[$b]) {
					array_splice($size_arr, $b, 1);
					array_push($size_data, trim($var_row2['size']));
					$output .= '
						<label>Size:</label><em><small class="text-danger ml-4" id="size_label"></small></em><br>
						<button type="button" class="btn btn-outline-primary size" style="border-radius:20px" id="size'.$var_row2['size'].'">'.$var_row2['size'].'</button>
					';		
				}	
			}
		} else {
			for($a = 0; $a < count($size_data); $a++) {
				for($b = 0; $b < count($size_arr); $b++) {
					if($var_row2['size'] == $size_arr[$b]) {
						if($var_row2['size'] != $size_data[$a]) {
							array_splice($size_arr, $b, 1);
							array_push($size_data, $var_row2['size']);	
							$output .= '
								<button type="button" class="btn btn-outline-primary size" style="border-radius:20px" id="size'.$var_row2['size'].'">'.$var_row2['size'].'</button>
							';
						}
					}
				}
			}
		}
	}
	$output .= '
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>Quantity:</label>
						<div class="input-group">
							<input type="number" readonly id="qty" name="qty" class="form-control col-md-6 bg-white" value="1">
							<input type="hidden" id="max_qty">
							<div class="input-group-append">
								<button type="button" class="btn btn-outline-default input-group-text" id="subBtn" disabled><i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-outline-default input-group-text" id="addBtn" disabled><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<small id="stocked" class="container text-danger"></small>
						<small id="available" class="container text-success"></small>
					</div>
					<div class="col-md-6">
						<label>Delivery Options:</label>
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
			</div>
			<button type="submit" id="rent_now" class="btn col-md-5" style="background-color: rgba(253, 126, 20, 0.8); color: white"><i class="fa fa-plus"></i> Rent Now</button>
			<button type="button" id="add_to_cart" class="btn col-md-5" style="background-color: rgba(9, 15, 126, 0.8); color:white;"><i class="fa fa-cart-plus"></i> Add to Cart</button>
		</div>
		<input type="hidden" id="color" name="color" value="">
		<input type="hidden" id="size" name="size" value="">
	';

	$v = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ");
	while($v_r = mysqli_fetch_array($v)){
		if($v_r['color'] != ''){
			array_push($c, $v_r['color']);
		}
		if($v_r['size'] != ''){
			array_push($s, $v_r['size']);
		}
	}

	$type = count($c);
}

$data = array(
	'output'	=>	$output,
	'color'		=>	$c,	
	'size'		=>	$s,
	'type'		=>	$type	
);

echo json_encode($data);

?>