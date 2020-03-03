<?php 

include '../../../connection.php';
session_start();

$output = '';
$shop_no =  $_SESSION['shop_no'];

$current_date = strtotime(date('Y-m-d'));
$current_day = date('d', $current_date);
$current_month = date('m', $current_date);

$output .= '
	<table class="table table-bordered text-center table-hover">
		<thead>
			<tr>
				<th>Transaction #</th>
				<th>Item #</th>
				<th>Item Status</th>
				<th>Transaction Status</th>
				<th>Start Date</th>
			</tr>
		</thead>
		<tbody>
';

$shop = "SELECT * FROM tbl_item WHERE shop_no = '$shop_no' ";
$shop_query = mysqli_query($con, $shop);
while($shop_row = mysqli_fetch_array($shop_query)) {
	$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$shop_row[1]' ";
	$tr_query = mysqli_query($con, $tr);
	$tr_num = mysqli_num_rows($tr_query);
	if($tr_num != 0) {
		while($tr_row = mysqli_fetch_array($tr_query)) {
			$tr_date = strtotime($tr_row['date_to_be_rent']);
			$tr_day = date('d', $tr_date);
			$tr_month = date('m', $tr_date);
			$tr_txt_month = date('M', $tr_date);

			if($tr_month >=  $current_month){
				if($tr_day > $current_day){
					$day = $tr_day - $current_day;
					if($day > 15) {
						$update = "UPDATE tbl_transaction_log SET transaction_status = 'pending' WHERE transaction_no = '$tr_row[0]' ";
						mysqli_query($con, $update);
					} else {
						$update = "UPDATE tbl_transaction_log SET transaction_status = 'on process' WHERE transaction_no = '$tr_row[0]' ";
						mysqli_query($con, $update);
					}
				}
			}

			$output	.= '
				<tr>
					<td>'.$tr_row['transaction_no'].'</td>
					<td>'.$tr_row['item_no'].'</td>
					<td>'.$tr_row['item_status'].'</td>
					<td>'.$tr_row['transaction_status'].'</td>
					<td>'.$tr_txt_month.' '.$tr_day.'</td>
				</tr>
			';
		}
	}
}

$output .= '
		</tbody>
	</table>
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
	.table thead tr{
		border: 1px solid #ddd;
	}
</style>