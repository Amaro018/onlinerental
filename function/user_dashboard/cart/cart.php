<?php 

include '../../connection.php';
$output = '';
$accNo = $_POST['accNo'];

$cart = $con->query("SELECT * FROM tbl_cart WHERE accNo = '$accNo' ");
$cart_num = mysqli_num_rows($cart);

if($cart_num != 0){
	$output .= '
		<table class="table cart_display" id="cart">
			<thead>
				<tr>
					<th>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="allCheck" name="allCheck">
							<label class="custom-control-label" for="allCheck"></label>
						</div>
					</th>
					<th>
						<span style="cursor: pointer; display:none;" id="allCheck-trash" class="text-danger">
							<i class="fa fa-trash" style="font-size: 24px;"></i> Delete
						</span>
					</th>
					<th colspan="5"></th>
					<th colspan="2">
						<button type="button" id="rent_out1" class="btn btn-outline-success btn-block" style="border-radius: 1.5rem">Rent Out</button>
					</th>
				</tr>
				<tr>
					<th></th>
					<th>Image</th>
					<th>Name</th>
					<th>Size</th>
					<th>Color</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Pre-total</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
	';
	while($cart_row = mysqli_fetch_array($cart)){
		$item = $con->query("SELECT * FROM tbl_item WHERE item_no = '$cart_row[item_no]' ");
		$item_row = mysqli_fetch_array($item);

		$variants = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$cart_row[item_no]' AND size = '$cart_row[item_size]' AND color = '$cart_row[item_color]' ");
		$variants_row = mysqli_fetch_array($variants);

		$output .= '

		';
	}	
	$output .= '
		<tr>
			<td colspan="4"></td>
			<td colspan="2">
				<button type="button" id="rent_out2" class="btn btn-outline-success btn-block" style="border-radius: 1.5rem">Rent Out</button>
			</td>
			<td><strong id="total">Total: </strong></td>
			<td><strong id="price">&#8369; 0</strong></td>
		</tr>
		</tbody>
	</table>
	';
}

$data = array(
	'output'	=>	$output
);

echo json_encode($data);

?>