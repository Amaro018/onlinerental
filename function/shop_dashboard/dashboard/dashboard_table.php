<?php 

include '../../connection.php';
$output = '';

$tr_no = $_POST['tr_no'];
$card_id = $_POST['card_id'];
$shop_no = $_POST['shop_no'];
$date = date('Y-m-d');

if($card_id != 'shop_followers'){
	$output .= '
	<div class="container mt-4 p-2 bg-light text-secondary">
		<nav class="navbar navbar-expand-sm justify-content-between">
			<a class="navbar-brand dashboard-brand">
				Dashboard / <label class="text-info">to be '.$card_id.'</label>
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-danger"><i class="fa fa-calendar-alt" style="font-size: 24px"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-primary"><i class="fa fa-ellipsis-v" style="font-size: 24px"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container my-4">
		<button type=""button class="btn btn-light mb-4 text-secondary" id="back_btn">
			<i class="fa fa-arrow-circle-left"></i> back to dashboard
		</button>
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8); border-bottom: none; ">
				To be '.$card_id.'
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<th width="20%">Customer Name</th>
							<th width="20%">Item Name</th>
							<th width="10%">Quantity</th>
							<th width="10%">Size</th>
							<th width="10%">Color</th>
							<th width="20%">'.ucfirst($card_id).' Date</th>	
							<th width="10%">Action</th>	
						</tr>
					</thead>
					<tbody>';
					for($a = 0; $a < count($tr_no); $a++){
						$all = "SELECT tbl_transaction_log.transaction_status, tbl_transaction_log.rent_size, tbl_transaction_log.rent_color, tbl_transaction_log.item_no, tbl_transaction_log.date_to_be_rent, tbl_transaction_log.rent_quantity, tbl_indreg.fname, tbl_indreg.mname, tbl_indreg.lname, tbl_indreg.suffix FROM tbl_transaction_log INNER JOIN tbl_indreg ON tbl_indreg.accNo=tbl_transaction_log.accNo WHERE transaction_no = '$tr_no[$a]' AND rent_date = '$date' ";
						$all_query = mysqli_query($con, $all);
						$all_num = mysqli_num_rows($all_query);

						if($all_num != 0){
							$all_row = mysqli_fetch_array($all_query);

							$item = "SELECT * FROM tbl_item WHERE item_no = '$all_row[3]' ";
							$item_query = mysqli_query($con, $item);
							$item_row = mysqli_fetch_array($item_query);

							if($all_row['transaction_status'] != 'Pickup' && $all_row['transaction_status'] != 'Delivered'){
								$color = 'success';
								$status = '';
								$text = ucfirst($card_id);
								$style = '';

							} else {
								$text = $all_row['transaction_status'];
								$color = 'danger';
								$status = 'disabled';
								$style = 'style="cursor: not-allowed"';
							}

							$output .= '
								<tr>
									<td>
										'.$all_row['fname'].' '.$all_row['mname'].' '.$all_row['lname'].' '.$all_row['suffix'].'
									</td>
									<td>'.$item_row['item_name'].'</td>
									<td>'.$all_row['rent_quantity'].'</td>
									<td>'.$all_row['rent_size'].'</td>
									<td>'.$all_row['rent_color'].'</td>
									<td>'.$all_row['date_to_be_rent'].'</td>
									<td>
										<button '.$status.' id="'.$tr_no[$a].'" type="button" class="btn btn-outline-'.$color.' btn-block btn-action" '.$style.'>'.$text.'</button>
									</td>
								</tr>
							';	
						}
					}
		$output .= '</tbody>
				</table>
			</div>
		</div>
	</div>
	';
} else{
	$output .= '
	<div class="container mt-4 p-2 bg-light text-secondary">
		<nav class="navbar navbar-expand-sm justify-content-between">
			<a class="navbar-brand dashboard-brand">
				Dashboard / <label class="text-info">'.ucfirst($card_id).'</label>
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-danger"><i class="fa fa-calendar-alt" style="font-size: 24px"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-primary"><i class="fa fa-ellipsis-v" style="font-size: 24px"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container my-4">
		<button type=""button class="btn btn-light mb-4 text-secondary" id="back_btn">
			<i class="fa fa-arrow-circle-left"></i> back to dashboard
		</button>
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8); border-bottom: none; ">
				'.ucfirst($card_id).'
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<th>Account No.</th>
							<th>Customer Name</th>
						</tr>
					</thead>
					<tbody>';
			
			$follow = $con->query("SELECT * FROM tbl_shop_followers WHERE shop_no = '$shop_no' ");
			$follow_num = mysqli_num_rows($follow);

			if($follow_num != 0){
				$follow_row = mysqli_fetch_array($follow);

				$indreg = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$follow_row[1]' ");
				$indreg_row = mysqli_fetch_array($indreg);

				$output .= '
					<tr>
						<td>'.$follow_row['accNo'].'</td>
						<td>'.$indreg_row['fname'].' '.$indreg_row['mname'].' '.$indreg_row['lname'].' '.$indreg_row['suffix'].'</td>
					</tr>
				';
			}

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
		border: 1px solid #ddd;
	}
</style>
