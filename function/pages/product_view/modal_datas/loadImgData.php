<?php 

include '../../../connection.php';
$item_no = $_POST['item_no'];
$output = '';

if(!empty($_POST['color']) && !empty($_POST['size'])){
	$color = $_POST['color'];
	$size = $_POST['size'];
	$type = 'colorsize';

	$var = $con->query("SELECT * FROM tbl_item_size WHERE color = '$color' AND size = '$size' AND item_no = '$item_no' ");
	$var_row = mysqli_fetch_array($var);

	$img = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	$img_row = mysqli_fetch_array($img);

	$i = 0;
	$img_all = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	while($img_all_row = mysqli_fetch_array($img_all)){
		$output .= '
			<div class="card bg-light">
				<div style="width:auto; height:70px;padding: 0;overflow: hidden;">
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_all_row['item_photo_name'].'" id="img'.$i.'" style="vertical-align: middle;" class="w-100 img-switch">
				</div>
			</div>
		';
		$i++;
	}

	$price = $var_row['price'];
	$qty = $var_row['qty'];
	$qtyA = $var_row['qty'];
	$name = $img_row['item_photo_name'];

	$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' AND rent_color = '$color' AND rent_size = '$size' ");
	$tr_num = mysqli_num_rows($tr);

	if($tr_num != 0){
		while($tr_row = mysqli_fetch_array($tr)){
			$strdate = strtotime($tr_row['date_to_be_rent']);
			$date = date('F d', $strdate);
			$ceil = ceil(($strdate-time())/60/60/24);
			if($ceil <= 2){
				$qtyA -= $tr_row['rent_quantity']; 
			}	
		}
	} 

	// $araw = strtotime("2011-01-10 1:10:32");
	// $aldaw = date("F d", $araw);
	// $aa = strtotime($aldaw);

	// $d1=strtotime("January 07");
	// $d2=ceil(($aa-time())/60/60/24);

	// $d = strtotime("-7 days");
	// $me = date("Y-m-d h:i:sa", $d);
}
else if(!empty($_POST['color'])){
	$color = $_POST['color'];
	$type = 'color';

	$var = $con->query("SELECT * FROM tbl_item_size WHERE color = '$color' AND item_no = '$item_no' ");
	$var_row = mysqli_fetch_array($var);

	$img = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	$img_row = mysqli_fetch_array($img);

	$i = 0;
	$img_all = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	while($img_all_row = mysqli_fetch_array($img_all)){
		$output .= '
			<div class="card bg-light">
				<div style="width:auto; height:70px;padding: 0;overflow: hidden;">
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_all_row['item_photo_name'].'" id="img'.$i.'" style="vertical-align: middle;" class="w-100 img-switch">
				</div>
			</div>
		';
		$i++;
	}

	$price = $var_row['price'];
	$qty = $var_row['qty'];
	$qtyA = $var_row['qty'];
	$name = $img_row['item_photo_name'];

	$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' AND rent_color = '$color' ");
	$tr_num = mysqli_num_rows($tr);

	if($tr_num != 0){
		while($tr_row = mysqli_fetch_array($tr)){
			$strdate = strtotime($tr_row['date_to_be_rent']);
			$date = date('F d', $strdate);
			$ceil = ceil(($strdate-time())/60/60/24);
			if($ceil <= 2){
				$qtyA -= $tr_row['rent_quantity']; 
			}	
		}
	} 
}
else if(!empty($_POST['size'])){
	$size = $_POST['size'];
	$type = 'size';

	$var = $con->query("SELECT * FROM tbl_item_size WHERE size = '$size' AND item_no = '$item_no' ");
	$var_row = mysqli_fetch_array($var);

	$img = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	$img_row = mysqli_fetch_array($img);

	$i = 0;
	$img_all = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	while($img_all_row = mysqli_fetch_array($img_all)){
		$output .= '
			<div class="card bg-light">
				<div style="width:auto; height:70px;padding: 0;overflow: hidden;">
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_all_row['item_photo_name'].'" id="img'.$i.'" style="vertical-align: middle;" class="w-100 img-switch">
				</div>
			</div>
		';
		$i++;
	}

	$price = $var_row['price'];
	$qty = $var_row['qty'];
	$qtyA = $var_row['qty'];
	$name = $img_row['item_photo_name'];

	$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' AND rent_size = '$size' ");
	$tr_num = mysqli_num_rows($tr);

	if($tr_num != 0){
		while($tr_row = mysqli_fetch_array($tr)){
			$strdate = strtotime($tr_row['date_to_be_rent']);
			$date = date('F d', $strdate);
			$ceil = ceil(($strdate-time())/60/60/24);
			if($ceil <= 2){
				$qtyA -= $tr_row['rent_quantity']; 
			}	
		}
	} 
} 
else {
	$type = 'none';
	$var = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ");
	$var_row = mysqli_fetch_array($var);

	$img = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	$img_row = mysqli_fetch_array($img);

	$i = 0;
	$img_all = $con->query("SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[variants_no]' ");
	while($img_all_row = mysqli_fetch_array($img_all)){
		$output .= '
			<div class="card bg-light">
				<div style="width:auto; height:70px;padding: 0;overflow: hidden;">
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_all_row['item_photo_name'].'" id="img'.$i.'" style="vertical-align: middle;" class="w-100 img-switch">
				</div>
			</div>
		';
		$i++;
	}

	$price = $var_row['price'];
	$qty = $var_row['qty'];
	$qtyA = $var_row['qty'];
	$name = $img_row['item_photo_name'];

	$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' ");
	$tr_num = mysqli_num_rows($tr);

	if($tr_num != 0){
		while($tr_row = mysqli_fetch_array($tr)){
			$strdate = strtotime($tr_row['date_to_be_rent']);
			$date = date('F d', $strdate);
			$ceil = ceil(($strdate-time())/60/60/24);
			if($ceil <= 2){
				$qtyA -= $tr_row['rent_quantity']; 
			}	
		}
	} 
}

$data = array(
	'img'		=>	$name,
	'price'		=>	$price,
	'qty'		=>	$qty,
	'qtyA'		=>	$qtyA,
	'output'	=>	$output,
	'type'		=>	$type,
	// 'me'		=>	$me,
	// 'd2'		=>	$d2,
	// 'aldaw'		=>	$aldaw,
);

echo json_encode($data);

?>