<?php 

include '../../connection.php';
$output = '';
$date = date('Y-m-d');

$output .= '
	<div class="card my-5" style="border-radius: 1rem; overflow: hidden;">
		<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8); border-bottom: none; ">
			Billing
		</div>
		<div class="card-body">
			<table class="table table-bordered table-hover text-center">
				<thead>
					<tr>
						<th>Customer Name</th>
						<th>Status</th>
						<th>Balance</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			';
			$tr = $con->query("SELECT * FROM tbl_transaction_log WHERE rent_date = '$date' ");
			while($tr_row = mysqli_fetch_array($tr)){
				$indreg = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$tr_row[2]' ");
				$indreg_row = mysqli_fetch_array($indreg);

				$bill = $con->query("SELECT * FROM tbl_billing WHERE transaction_no = '$tr_row[transaction_no]' ");
				$bill_num = mysqli_num_rows($bill);

				$var = $con->query("SELECT * FROM tbl_item_size WHERE item_no = '$tr_row[item_no]' AND size = '$tr_row[rent_size]' AND color = '$tr_row[rent_color]' ");
				$var_row = mysqli_fetch_array($var);

				if($bill_num != 0){
					$bill_row = mysqli_fetch_array($bill);
					$status = $bill_row['payment_status'];
					$balance = $bill_row['balance'];
				} else {
					$status = $tr_row['transaction_status'];
					$balance = $var_row['price'] * $tr_row['rent_quantity'];
				}

				$output .= '
					<tr>
						<td>'.$indreg_row['fname'].' '.$indreg_row['mname'].' '.$indreg_row['lname'].' '.$indreg_row['suffix'].'</td>
						<td>'.$status.'</td>
						<td>&#8369; '.$balance.'</td>
						<td>
							<button id="'.$tr_row['transaction_no'].'" type="button" class="btn btn-outline-success btn-block btn-action-view">View</button>
						</td>
					</tr>
				';
			}
$output .= '
				</tbody>
			</table>
		</div>
	</div>
';

echo $output;


?>

<style>
	.table{
		color: gray;
	}
	.table thead tr th{
		border: none;
	}
</style>

