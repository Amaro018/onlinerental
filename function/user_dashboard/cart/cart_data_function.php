<?php 

include '../../connection.php';
session_start();

$output = '';
$cart_no = array();
$cart_val = array();
$accNo = $_SESSION['accNo'];

$cart = "SELECT * FROM tbl_cart WHERE accNo = '$accNo' ";
$cart_query = mysqli_query($con, $cart);
$cart_num = mysqli_num_rows($cart_query);

if($cart_num != 0) {
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
	while($cart_row = mysqli_fetch_array($cart_query)){
		
		$item = "SELECT * FROM tbl_item WHERE item_no = '$cart_row[item_no]' ";
		$item_query = mysqli_query($con, $item);
		$item_row = mysqli_fetch_array($item_query);

		$variants = "SELECT * FROM tbl_item_size WHERE item_no = '$cart_row[item_no]' AND size = '$cart_row[item_size]' AND color = '$cart_row[item_color]' ";
		$variants_query = mysqli_query($con, $variants);
		$variants_row = mysqli_fetch_array($variants_query);

		$img = "SELECT * FROM tbl_item_photo_name WHERE variants_no = '$variants_row[variants_no]' LIMIT 1 ";
		$img_query = mysqli_query($con, $img);
		$img_row = mysqli_fetch_array($img_query);

		$tr_log = "SELECT * FROM tbl_transaction_log WHERE item_no = '$cart_row[item_no]' AND rent_size = '$cart_row[item_size]' ";
		$tr_query = mysqli_query($con, $tr_log);
		$tr_num = mysqli_num_rows($tr_query);
		
		$a = $variants_row['qty'];
		$b = 0;
		$c = 0;
		if($tr_num != 0) {
			while($tr_row = mysqli_fetch_array($tr_query)) {
				$b += $tr_row['rent_quantity'];
			}
			$c = $a - $b;
			array_push($cart_no, $cart_row['cart_no']);
			array_push($cart_val, $c);
		} else {
			array_push($cart_no, $cart_row['cart_no']);
			array_push($cart_val, $a);
		}
		$quantity = 1;
		$output .= '
			<tr>
				<td width="5%">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input cart_no" id="'.$cart_row['cart_no'].'" name="'.$cart_row['cart_no'].'">
						<label class="custom-control-label" for="'.$cart_row['cart_no'].'"></label>
					</div>
				</td>
				<td width="15%">
					<div style="width: 100px; height: 100px; align-items: center; display: flex; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
						<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
						<img src="upload/'.$img_row['item_photo_name'].'" class="w-100" style="vertical-align:middle;">
					</div>
				</td>
				<td width="15%">'.$item_row['item_name'].'</td>
				<td width="10%">'.$cart_row['item_size'].'</td>
				<td width="10%"><i class="fa fa-circle" style="color:'.$cart_row['item_color'].'"></i> '.$cart_row['item_color'].'</td>
				<td width="10%">
					&#8369; 
					<label id="'.$cart_row['cart_no'].'price">'.$cart_row['item_price'].'</label>
				</td>
				<td width="10%">
					<input type="number" class="form-control qty" value="1" max="10" min="1" id="'.$cart_row['cart_no'].'qty">
				</td>
				<td width="15%">
					&#8369; 
					<label id="'.$cart_row['cart_no'].'pre-total">'.$cart_row['item_price'] * $quantity.'</label>
					<label id="avail'.$cart_row['cart_no'].'"></label>
				</td>
				<td width="10%">
					<i id="'.$cart_row['cart_no'].'" class="fa fa-trash text-danger cart-trash" style="font-size: 20px;"></i>
					<i class="fa fa-heart text-info '.$cart_row['cart_no'].'" style="font-size: 20px;"></i>
				</td>
			</tr>
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
else {
	$output .= '
		<div class="card m-5">
			<div class="card-body">
				<h3 class="text-center text-secondary p-4">There are no items added on cart!</h3>
			</div>
		</div>
	';
}

$data = array(
	'output'		=>	$output,
	'cart_no'			=>	$cart_no,
	'cart_val'			=>	$cart_val
);

echo json_encode($data);

?>