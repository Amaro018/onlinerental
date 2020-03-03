<?php 

include '../../connection.php';
$accNo = $_POST['accNo'];
$output = '';
$style = 'style="vertical-align:middle;"';

$tr = "SELECT * FROM tbl_transaction_log WHERE accNo = '$accNo' AND review_status = 1";
$tr_query = mysqli_query($con, $tr);
$tr_num = mysqli_num_rows($tr_query);

if($tr_num != 0){
	$output .= '
		<table class="table table-bordered mt-5">
			<thead align="center">
				<tr>
					<th width="20%">Item Image</th>
					<th width="20%">Item Name</th>
					<th width="20%">Item Description</th>
					<th width="20%">Transaction Date</th>
					<th width="20%">Action</th>
				</tr>
			</thead>
			<tbody align="center">
	';
	while($tr_row = mysqli_fetch_array($tr_query)){
		$item = "SELECT * FROM tbl_item WHERE item_no = '$tr_row[1]' ";
		$item_query = mysqli_query($con, $item);
		$item_row = mysqli_fetch_array($item_query);		 

		$var = "SELECT * FROM tbl_item_size WHERE size = '$tr_row[5]' AND color = '$tr_row[4]' ";
		$var_query = mysqli_query($con, $var);
		$var_row = mysqli_fetch_array($var_query);

		$img = "SELECT * FROM tbl_item_photo_name WHERE variants_no = '$var_row[0]' ";
		$img_query = mysqli_query($con, $img);
		$img_row = mysqli_fetch_array($img_query);

		$output .= '
			<tr>
				<td '.$style.'>
					<div style="width: 80px; height: 80px; align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%; overflow: hidden;">
						<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
						<img src="upload/'.$img_row['item_photo_name'].'" alt="hakdog" class="w-100" style="vertical-align:middle;">
					</div>
				</td>
				<td '.$style.'>
					'.$item_row['item_name'].'
				</td>
				<td '.$style.'>
					'.$item_row['item_desc'].'
				</td>
				<td '.$style.'>
					'.$tr_row['rent_date'].'
				</td>
				<td '.$style.'>
					<button disabled type="button" class="btn btn-outline-danger btn-block btn-review" id="'.$tr_row['transaction_no'].'">Reviewed</button>
				</td>
			</tr>
		';	
	}
	$output .= '
			</tbody>
		</table>
	';
} else {

}

echo $output;

?>

