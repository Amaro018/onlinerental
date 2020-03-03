<?php 

include '../../../connection.php';

$output = '';
$start = $_POST['sDate'];
$return = $_POST['rDate'];
$current = $_POST['cDate'];
$color = $_POST['color'];
$size = $_POST['size'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$type_of_ship = $_POST['type_of_ship'];
$img_name = $_POST['img_name'];
$item_name = $_POST['item_name'];

$item_no = $_POST['item_no'];
$accNo = $_POST['accNo'];

$img = "SELECT * FROM tbl_item_photo_name WHERE item_no = '$item_no' AND item_photo_name = '$img_name' ";
$img_query = mysqli_query($con, $img);
$img_row = mysqli_fetch_array($img_query);

$user = "SELECT * FROM tbl_indreg WHERE accNo = '$accNo' ";
$user_query = mysqli_query($con, $user);
$user_row = mysqli_fetch_array($user_query);

$output .= '
	<table class="table table-bordered">
		<thead>
			<tr align="center">
				<th width="15%">Name</th>
				<th width="15%">Img</th>
				<th width="15%">Price</th>
				<th width="10%">Quantity</th>
				<th width="15%">Color</th>
				<th width="15%">Size</th>
				<th width="15%">Delivery Option</th>
			</tr>
		</thead>
		<tbody>
			<tr align="center">
				<td style="vertical-align: middle">'.$item_name.'</td>
				<td style="vertical-align: middle">
					<div style="width:60px; height:60px;padding: 0;overflow: hidden; border-radius: 50px; border: 1px solid #ccc;">
						<span style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="upload/'.$img_name.'" style="vertical-align: middle;" class="w-100">
					</div>
				</td>
				<td style="vertical-align: middle">
					<label>'.$price.'</label>
				</td>
				<td style="vertical-align: middle">
					<label>'.$qty.'</label>
				</td>
				<td style="vertical-align: middle">
					<label>'.$color.'</label>
				</td>
				<td style="vertical-align: middle">
					<label>'.$size.'</label>
				</td>
				<td style="vertical-align: middle">
					<label>'.$type_of_ship.'</label>
				</td>
			</tr>
			<tr align="center">
				<td colspan="5"></td>
				<td>
					<label><strong>Total</strong></label>
				</td>
				<td>
					<label><strong>'.$price*$qty.'</strong></label>
				</td>
			<tr>
		</tbody>
	</table>
';

if($type_of_ship != 'pickup'){
	$output .= '
		<form role="form" method="post" id="location">
			<div class="card">
				<div class="card-header">
					Location
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<label>Street:</label>
							<input type="text" class="form-control" id="st" value="'.$user_row['a_st'].'"> 
						</div>
						<div class="col-md-3">
							<label>Zone:</label>
							<input type="text" class="form-control" id="zone" value="'.$user_row['a_zone'].'">
						</div>
						<div class="col-md-3">
							<label>Barangay:</label>
							<input type="text" class="form-control" id="brgy" value="'.$user_row['a_brgy'].'">
						</div>
						<div class="col-md-3">
							<label>City:</label>
							<input type="text" class="form-control" id="city" value="'.$user_row['a_city'].'">
						</div>
					</div>
				</div>
			</div>
		</form>
	';
}

echo $output;

?>

