<?php 

include '../../connection.php';
$accNo = $_POST['accNo'];
$output = '';

$transaction = "SELECT * FROM tbl_transaction_log WHERE accNo = '$accNo' ";
$transaction_query = mysqli_query($con, $transaction);
$transaction_num = mysqli_num_rows($transaction_query);

if($transaction_num != 0){
	$output .= '
		<div class="card mt-4">
			<div class="card-header">
				<h6>Transaction Details</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Transaction no.</th>
								<th>Quantity</th>
								<th>Size</th>
								<th>Color</th>
								<th>Delivery Option</th>
								<th>Transaction Status</th>
							</tr>
						</thead>
						<tbody>

	';
	while($transaction_rows = mysqli_fetch_array($transaction_query)){
		$output .= '
			<tr>
				<td>'.$transaction_rows['transaction_no'].'</td>
				<td>'.$transaction_rows['rent_quantity'].'</td>
				<td>'.$transaction_rows['rent_size'].'</td>
				<td>'.$transaction_rows['rent_color'].'</td>
				<td>'.$transaction_rows['rent_delivery_option'].'</td>
				<td>'.$transaction_rows['transaction_status'].'</td>
			</tr>
		';	
	}
	$output .= '
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card mt-4">
					<div class="card-header">
						Receive Item
					</div>
					<div class="card-body" id="receive_item">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card mt-4">
					<div class="card-header">
						Waiting List
					</div>
					<div class="card-body" id="waiting_list">
					</div>
				</div>
			</div>
		</div>

		';

} else {
	$output .= '
		<div class="card m-5">
			<div class="card-body">
				<h3 class="text-center text-secondary p-4">There are no on process rental!</h3>
			</div>
		</div>
	';
}

echo $output;
?>

	


	