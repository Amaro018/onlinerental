<?php 

include '../../connection.php';
$output= '';
$tr_no = $_POST['tr_no'];

$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE transaction_no  = '$tr_no' ");
$tr_row = mysqli_fetch_array($tr);

$item = $con->query("SELECT * FROM tbl_item WHERE item_no = '$tr_row[1]' ");
$item_row = mysqli_fetch_array($item);

$var = $con->query("SELECT price FROM tbl_item_size WHERE item_no = '$tr_row[1]' AND color = '$tr_row[4]' AND size = '$tr_row[5]' ");
$var_row = mysqli_fetch_array($var);

$indreg = $con->query("SELECT * FROM tbl_indreg WHERE accNo  = '$tr_row[2]' ");
$indreg_row = mysqli_fetch_array($indreg);

$amount = $var_row['price'] * $tr_row['rent_quantity']; 

$output .= '
	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th>PAYMENT</th>
				<th>AMOUNT</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="py-5">
					<div>'.$item_row['item_name'].'</div>
				</td>
				<td class="py-5">
					<div>&#8369; '.number_format($amount, 2).'</div>
				</td>
				<td></td>
			</tr>
			<tr>
				<td><strong>TOTAL</strong></td>
				<td>&#8369; '.number_format($amount, 2).'</td>
				<td></td>
			</tr>
			<tr>
				<td><strong>PARTIAL PAYMENT</strong></td>
				<td>&#8369; '.number_format(0, 2).'</td>
				<td>
					<button type="button" class="btn btn-outline-success">Set Partial Payment</button>
				</td>
			</tr>
			<tr>
				<td><strong>BALANCE</strong></td>
				<td>&#8369; '.number_format(0, 2).'</td>
				<td></td>
			</tr>						
		</tbody>
	</table>
';

echo $output;


?>

