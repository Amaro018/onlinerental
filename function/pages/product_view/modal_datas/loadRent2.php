<?php 

include '../../../connection.php';
$output = '';
$accNo = $_POST['accNo'];

if(isset($_POST['color'])){
	$color = $_POST['color'];
} else {
	$color = '';
}
if(isset($_POST['size'])){
	$size = $_POST['size'];
} else {
	$size = '';
}

$user = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$accNo' ");
$user_row = mysqli_fetch_array($user);

$start = $_POST['sDate'];
$return = $_POST['rDate'];
$current = $_POST['cDate'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$type_of_ship = $_POST['type_of_ship'];
$img_name = $_POST['img_name'];
$item_name = $_POST['item_name'];

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

$user = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$accNo' ");
$user_row = mysqli_fetch_array($user);

$address = $con->query("SELECT * FROM tbl_address WHERE accNo = '$user_row[accNo]' ");

if($type_of_ship != 'pickup'){
	$output .= '
		<form role="form" method="post" id="location">
			<div class="card">
				<div class="card-header lead">
					Address
				</div>
				<div class="card-body">
					<select class="custom-select col-md-3 mb-5">';
					while($address_row = mysqli_fetch_array($address)){
						$st = $address_row['st'];
						$zone = $address_row['zone'];
						$brgy = $address_row['brgy'];
						$city = $address_row['city'];
						$output .= '
							<option value="'.$address_row['address_type'].'">'.$address_row['address_type'].'</option>
						';
					}
			$output .= '
					</select>
					<div class="row">
						<div class="col-md-3">
							<label>Street:</label>
							<input type="text" class="form-control" id="st" value="'.$st.'"> 
						</div>
						<div class="col-md-3">
							<label>Zone:</label>
							<input type="text" class="form-control" id="zone" value="'.$zone.'">
						</div>
						<div class="col-md-3">
							<label>Barangay:</label>
							<input type="text" class="form-control" id="brgy" value="'.$brgy.'">
						</div>
						<div class="col-md-3">
							<label>City:</label>
							<input type="text" class="form-control" id="city" value="'.$city.'">
						</div>
					</div>
				</div>
			</div>
		</form>
	';
}
	

echo $output;

?>