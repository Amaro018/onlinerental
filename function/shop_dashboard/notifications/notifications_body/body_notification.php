<?php 

include '../../../connection.php';
session_start();

$shop_no = $_SESSION['shop_no'];
$output = '';

$notif = "SELECT * FROM tbl_shop_notifications WHERE shop_no = '$shop_no' ";
$notif_query = mysqli_query($con, $notif);
$notif_num = mysqli_num_rows($notif_query);

if($notif_num != 0){
	$output .= '
	<ul class="nav mb-2">
		<li class="nav-item">
			<a class="nav-link" href="#" id="order">
				<i class="fal fa-inbox"></i> Order Notifications
				<span class="badge badge-secondary badge-order">4</span>
			</a>
			<div class="underline-order"></div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#" id="date">
				<i class="fal fa-calendar"></i> Date Notifications
				<span class="badge badge-secondary badge-date">4</span>
			</a>
			<div class="underline-date"></div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#" id="return">
				<i class="fal fa-tag"></i> Return Notifications
				<span class="badge badge-secondary badge-return">4</span>
			</a>
			<div class="underline-return"></div>
		</li>
	</ul>
	<table class="table">
		<thead>
			<tr>
				<th width="10%">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="allCheck" name="allCheck">
						<label class="custom-control-label" for="allCheck"></label>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
	';
	while($notif_row = mysqli_fetch_array($notif_query)){
		$tr = "SELECT * FROM tbl_transaction_log WHERE transaction_no = '$notif_row[2]' ";
		$tr_query = mysqli_query($con, $tr);
		$tr_row = mysqli_fetch_array($tr_query);

		$acc = "SELECT * FROM tbl_indreg WHERE accNo = '$tr_row[2]' ";
		$acc_query = mysqli_query($con, $acc);
		$acc_row = mysqli_fetch_array($acc_query);

		if($notif_row['shop_notif_status'] == 0){
			$bgColor = 'background-color: rgba(220, 53, 69, 0.1)';
		} else{
			$bgColor = 'background-color: white';
		}

		$output .= '
			<tr style="'.$bgColor.'">
				<td>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="'.$tr_row['transaction_no'].'" name="'.$tr_row['transaction_no'].'">
						<label class="custom-control-label" for="'.$tr_row['transaction_no'].'"></label>
					</div>
				</td>
				<td>
					<strong>Facebook</strong>
				</td>
				<td>
					<strong>'.$acc_row['fname'].' '.$acc_row['lname'].'</strong>
					has order an item with a item number of '.$tr_row['item_no'].'  
				</td>
			</tr>
		';	
	}
	$output .= '
			</tbody>
		</table>
	'; 
} else {
	$output .= '
		<div class="card m-5">
			<div class="card-body">
				<h3 class="text-center text-secondary p-4">There are no notifications.</h3>
			</div>
		</div>
	';
}

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
		/*border-bottom: 1px solid #ddd;*/
	}
	#body_notification ul li div{
		border-bottom: 3px solid rgba(220, 53, 69, 0.8);
		width: 0%;
	}
	#body_notification a{
		padding-bottom: .3rem;
		color: gray;
	}
</style>

		
	