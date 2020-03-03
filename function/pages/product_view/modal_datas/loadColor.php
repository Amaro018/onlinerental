<?php 

include '../../../connection.php';

$color = json_decode($_POST['dataColor'], true);
$size = json_decode($_POST['dataSize'], true);
$item_no = $_POST['item_no'];
$output = '';

$varSize = array();
$varColor = array();
$varImg = array();
$varImgAll = array();

$varPrice = '';
$varQty = 0;
$varNewQty = 0;

$color_arr = array('Red', 'Blue', 'Yellow', 'Violet', 'Green', 'Indigo', 'Orange', 'Black');
$size_arr = array('Xsmall', 'Small', 'Medium', 'Large', 'Xlarge');

if($color != '' && $size != '') {
	$output .= 'color n size';

	$varAll = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND color = '$color' ";
	$varAll_query = mysqli_query($con, $varAll);
	while($varAll_row = mysqli_fetch_array($varAll_query)){
		array_push($varSize, $varAll_row['size']);
		array_push($varColor, $varAll_row['color']);
		for($a = 0; $a < count($color_arr); $a++) {
			if(trim($varAll_row['color']) == $color_arr[$a]) {
				array_splice($color_arr, $a, 1);
			}
		}
		for($b = 0; $b < count($size_arr); $b++) {
			if(trim($varAll_row['size']) == $size_arr[$b]) {
				array_splice($size_arr, $b, 1);
			}
		}	
	}

	$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND color = '$color' AND size = '$size' ";
	$var_query = mysqli_query($con, $var);
	$var_row = mysqli_fetch_array($var_query);
		$varPrice = $var_row['price'];

	$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$var_row[0]' ";
	$img_query = mysqli_query($con, $img);
	$img_row = mysqli_fetch_array($img_query);
		array_push($varImg, $img_row['item_photo_name']);

	$imgAll = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$img_row[1]'";
	$imgAll_query = mysqli_query($con, $imgAll);
	while($imgAll_row = mysqli_fetch_array($imgAll_query)) { 
		array_push($varImgAll, $imgAll_row['item_photo_name']);
	}

	$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' AND rent_color = '$color' AND rent_size = '$size' ";
	$tr_query = mysqli_query($con, $tr);
	while($tr_row = mysqli_fetch_array($tr_query)){
		$varQty += $tr_row['rent_quantity'];
	}

	$varNewQty = $var_row['qty'] - $varQty;
} 
else if($color != ''){
	$output .= 'color';

	$var_color = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND color = '$color' ";
	$var_color_query = mysqli_query($con, $var_color);
	while($var_color_row = mysqli_fetch_array($var_color_query)){
		array_push($varSize, $var_color_row['size']);
		array_push($varColor, $var_color_row['color']);
		for($a = 0; $a < count($color_arr); $a++) {
			if(trim($var_color_row['color']) == $color_arr[$a]) {
				array_splice($color_arr, $a, 1);
			}
		}
		for($b = 0; $b < count($size_arr); $b++) {
			if(trim($var_color_row['size']) == $size_arr[$b]) {
				array_splice($size_arr, $b, 1);
			}
		}		
	}

	$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND color = '$color' ";
	$var_query = mysqli_query($con, $var);
	$var_row = mysqli_fetch_array($var_query);
		$varPrice = $var_row['price'];

	$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$var_row[0]' ";
	$img_query = mysqli_query($con, $img);
	$img_row = mysqli_fetch_array($img_query);
		array_push($varImg, $img_row['item_photo_name']);

	$imgAll = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$img_row[1]'";
	$imgAll_query = mysqli_query($con, $imgAll);
	while($imgAll_row = mysqli_fetch_array($imgAll_query)) { 
		array_push($varImgAll, $imgAll_row['item_photo_name']);
	}
}
else if($size != ''){
	$output .= 'size';

	$var_size = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND size = '$size' ";
	$var_size_query = mysqli_query($con, $var_size);
	while($var_size_row = mysqli_fetch_array($var_size_query)){
		array_push($varSize, $var_size_row['size']);
		array_push($varColor, $var_size_row['color']);
		for($a = 0; $a < count($size_arr); $a++) {
			if(trim($var_size_row['size']) == $size_arr[$a]) {
				array_splice($size_arr, $a, 1);
			}
		}
		for($b = 0; $b < count($color_arr); $b++) {
			if(trim($var_size_row['color']) == $color_arr[$b]) {
				array_splice($color_arr, $b, 1);
			}
		}			
	}

	$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' AND size = '$size' ";
	$var_query = mysqli_query($con, $var);
	$var_row = mysqli_fetch_array($var_query);
		$varPrice = $var_row['price'];

	$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$var_row[0]' ";
	$img_query = mysqli_query($con, $img);
	$img_row = mysqli_fetch_array($img_query);
		array_push($varImg, $img_row['item_photo_name']);

	$imgAll = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$img_row[1]'";
	$imgAll_query = mysqli_query($con, $imgAll);
	while($imgAll_row = mysqli_fetch_array($imgAll_query)) { 
		array_push($varImgAll, $imgAll_row['item_photo_name']);
	}
}
else{
	$output .= 'none';

	$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ";
	$var_query = mysqli_query($con, $var);
	$var_row = mysqli_fetch_array($var_query);
		$varPrice = $var_row['price'];

	$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' ";
	$img_query = mysqli_query($con, $img);
	$img_row = mysqli_fetch_array($img_query);
		array_push($varImg, $img_row['item_photo_name']);

	$imgAll = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND variants_no = '$img_row[1]'";
	$imgAll_query = mysqli_query($con, $imgAll);
	while($imgAll_row = mysqli_fetch_array($imgAll_query)) { 
		array_push($varImgAll, $imgAll_row['item_photo_name']);
	}
}

$data = array(
	'output'		=>	$output,
	'size'			=>	$varSize,
	'color'			=>	$varColor,
	'img'			=>	$varImg,
	'imgAll'		=>	$varImgAll,
	'qty'			=>	$varNewQty,
	'price'			=>	$varPrice,
	'item_no'		=>	$item_no,
	'color_arr'		=>	$color_arr,
	'size_arr'		=>	$size_arr
);

echo json_encode($data);
?>