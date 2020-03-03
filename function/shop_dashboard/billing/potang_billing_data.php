<?php 

include '../../connection.php';
$tr_no = $_POST['tr_no'];
$output = '';

$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE transaction_no = '$tr_no' ");
$tr_row = mysqli_fetch_array($tr);

$renter = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$tr_row[accNo]' ");
$renter_row = mysqli_fetch_array($renter);

$address = $con->query("SELECT * FROM tbl_address WHERE accNo = '$tr_row[accNo]' AND address_type = 'default' ");
$address_row = mysqli_fetch_array($address);

$item = $con->query("SELECT * FROM tbl_item WHERE item_no = '$tr_row[item_no]' ");
$item_row = mysqli_fetch_array($item);

$var = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$tr_row[item_no]' AND size = '$tr_row[rent_size]' AND color = '$tr_row[rent_color]' ");
$var_row = mysqli_fetch_array($var);

$shop = $con->query("SELECT * FROM tbl_shop WHERE  shop_no = '$item_row[shop_no]' ");
$shop_row = mysqli_fetch_array($shop); 

if($var){
	// echo 'fucking good';
} else {
	echo mysqli_error($con);
}

$amount = $tr_row['rent_quantity'] * $var_row['price'];
$bill = $con->query("SELECT * FROM tbl_billing WHERE transaction_no = '$tr_no' ORDER BY payment_no DESC ");
$bill_num = mysqli_num_rows($bill);

if($bill_num != 0){
	$bill_row = mysqli_fetch_array($bill);
	$balance = $bill_row['balance'];
} else {
	$balance = $amount;
}

$output .= '
	<div class="container-fluid">
		<input type="hidden" value="'.$tr_no.'" id="transaction_no">
		<p class="text-secondary">Transaction # '.$tr_no.'</p>
		<div class="row">
			<div class="col-md-6">
				<p class="lead m-0 text-secondary">'.$renter_row['fname'].' '.$renter_row['mname'].' '.$renter_row['lname'].' '.$renter_row['suffix'].'</p>
				<p class="m-0 text-secondary">Renter # '.$renter_row['accNo'].'</p>
				<p class="m-0 text-secondary">Contact # '.$renter_row['contact'].'</p>
			</div>
			<div class="col-md-6">
				<p class="lead m-0 text-secondary">'.$shop_row['shop_name'].'</p>
				<p class="m-0 text-secondary">Contact # '.$shop_row['shop_contact'].'</p>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 border-right">
				<p class="m-0 text-secondary lead">Billing Address</p>
				<p class="m-0 text-secondary">'.$address_row['st'].' '.$address_row['zone'].' '.$address_row['brgy'].' '.$address_row['city'].'</p>
			</div>
			<div class="col-md-6">
				<p class="m-0 text-secondary lead">Delivery Address</p>
				<p class="m-0 text-secondary">'.$address_row['st'].' '.$address_row['zone'].' '.$address_row['brgy'].' '.$address_row['city'].'</p>
			</div>
		</div>
	</div>
	<div class="container-fluid mt-2">
		<table class="table table-sm table-bordered text-center">
			<thead class="thead-light">
				<tr>
					<th>Item #</th>
					<th>Item Name</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>'.$item_row['item_no'].'</td>
					<td>'.$item_row['item_name'].'</td>
					<td>&#8369; '.number_format($amount, 2).'</td>
				</tr>
				<tr>
					<td colspan="2" class="font-weight-bold text-right">Delivery Fee:</td>
					<td>&#8369; '.number_format(0, 2).'</td>
				</tr>
				<tr>
					<td colspan="2" class="font-weight-bold text-right">Total:</td>
					<td>
						&#8369; '.number_format($amount, 2).'
						<input type="hidden" value="'.$balance.'" id="total">
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="container-fluid mt-2">
		<button type="button" class="btn btn-sm btn-success partial" style="border-radius: 20px; opacity: .8"><i class="fa fa-plus"></i> Partial Payment</button>
	</div>
	<div class="container-fluid mt-2">
		<table class="table table-bordered text-center">
			<thead class="thead-light">
				<tr>
					<th>PARTIAL PAYMENT</th>
					<th>PAYMENT DATE</th>
					<th>BALANCE</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody id="partial_table">';
			$billing = $con->query("SELECT * FROM tbl_billing WHERE transaction_no = '$tr_no' ");
			$billing_num = mysqli_num_rows($billing);
			if($billing_num != 0){
				while($billing_row = mysqli_fetch_array($billing)){
					$output .= '
						<tr>
							<td id="partial_td'.$billing_row['payment_no'].'">&#8369; '.number_format($billing_row['payment_amount'], 2).'</td>
							<td id="partial_date'.$billing_row['payment_no'].'">'.date("F jS Y", strtotime($billing_row['payment_date'])).'</td>
							<td id="partial_balance'.$billing_row['payment_no'].'">&#8369; '.number_format($billing_row['balance'], 2).'</td>
							<td>
								<button type="button" class="btn btn-outline-danger" id="delete'.$billing_row['payment_no'].'">
									<i class="fa fa-trash"></i>
								</button>
								<button type="button" class="btn btn-outline-info" id="edit'.$billing_row['payment_no'].'">
									<i class="fa fa-pen"></i>
								</button>
							</td>
						</tr>
					';	
				}
			}
			else {
				$output .= '
						<tr>
							<td colspan="4" class="lead" id="no_payment">No payment made</td>
						</tr>
					';	
			}
$output .= '</tbody>
		</table>
	</div>
';

echo $output;

?>
