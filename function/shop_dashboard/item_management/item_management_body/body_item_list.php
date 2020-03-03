<?php 

include '../../../connection.php';
session_start();

$shop_no = $_SESSION['shop_no'];
$output = '';

$item = "SELECT * FROM tbl_item WHERE shop_no = '$shop_no' ";
$item_query = mysqli_query($con, $item);
$item_num = mysqli_num_rows($item_query);

if($item_num != 0){
	$output .= '
		<table class="table" id="tbl_item_list">
			<thead>
				<tr>
					<th><small>Item #</small></th>
					<th><small>Image</small></th>
					<th><small>Name</small></th>
					<th><small>Category</small></th>
					<th><small>Status</small></th>
					<th><small>Action</small></th>
				</tr>
			</thead>
			<tbody>
	';
	while($item_row = mysqli_fetch_array($item_query)){
		$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_row[1]' ";
		$img_query = mysqli_query($con, $img);
		$img_num = mysqli_num_rows($img_query);
		$img_row = mysqli_fetch_array($img_query);

		if($img_num != 0){
			$src = 'upload/'.$img_row['item_photo_name'];
		} else {
			$src = 'images/php.png';
		}

		$availability = $item_row['availability'];
		if($availability == 1) {
			$status = '<i class="fa fa-circle text-success"></i>';
		} else {
			$status = '<i class="fa fa-circle text-success"></i>';
		}

		$output .= '
			<tr>
				<td>'.$item_row['item_no'].'</td>
				<td>
					<div style="width: 5rem; height: 5rem; align-items: center; display: flex; border: 1px solid #ddd">
						<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
						<img src="'.$src.'" class="w-100" style="vertical-align:middle;">
					</div>
				</td>
				<td>'.$item_row['item_name'].'</td>
				<td>'.$item_row['category_no'].'</td>
				<td>'.$status.'</td>
				<td>
					<button type="button" id="view_item" value="'.$item_row['item_no'].'" class="btn btn-outline-success" style="border-radius: 20px">View</button>
				</td>
			</tr>
		';
	}
	$output .= '
			</tbody>
		</table>
	';
}

echo $output;

?>

<style>
	#tbl_item_list{
		color: gray;
	}
	#tbl_item_list thead tr th{
		border: none;
	}
	#tbl_item_list thead tr{
		/*border-bottom: 1px solid #ddd;*/
	}
	#tbl_item_list td{
		vertical-align: middle;
	}
</style>

