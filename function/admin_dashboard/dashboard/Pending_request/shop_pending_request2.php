<?php 
include '../../../connection.php';
$output = "";
$output .= '
<div class="container mt-4" id="shop_pending_request">
	<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Shop pending account</div>
				<div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
					<div id="body_header" class="mb-3">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Shop Name</th>
									<th>Owner Name</th>
									<th>Contact #</th>
									<th>Action</th>
								</tr>
							</thead>
					</div>
				</div>
	</div>
</div>
';

//ALTER TABLE `tbl_shop` DROP `status`;
$mg_pendingShop = $con->query("SELECT tbl_shop.accNo,tbl_shop.shop_name,tbl_shop.shop_email,tbl_indreg.accNo, tbl_indreg.fname, tbl_indreg.mname, tbl_indreg.lname, tbl_indreg.suffix, tbl_account.email,tbl_account.userType, tbl_indreg.contact FROM tbl_indreg INNER JOIN tbl_account ON tbl_indreg.accNo = tbl_account.accNo INNER JOIN tbl_shop ON tbl_shop.accNo = tbl_indreg.accNo WHERE userType = 'userShop' AND status='pending';");
 	while($row=$mg_pendingShop->fetch_array()){


$output .= '
		<tr>
			<td>
			<input type="hidden" name="shopNo_pending" id="shopNo_pending'.$row['accNo'].'" value="'. $row['accNo'] .'">
			<input type="hidden" name="accNo_pending" id="accNo_pending'.$row['accNo'].'" value="'. $row['accNo'] .'">
			'. $row['shop_name'] .'</td>
			<td>'. $row['fname'] .' '. $row['lname'].'</td>	 		
			<td>'. $row['contact'] .'</td>
			<td>
			
				<form method="POST" action="">
					<button type="button" name="submit" id="mg_modal" class="btn btn-success">View</button>

					<button type="button" onclick="accept_shop('.$row['accNo'].')" id="accept_shop'.$row['accNo'].'" class="pending_accept btn btn-primary text-light">Accept</button>
					</form>
			</td>		
		</tr>
';
		
}

echo $output;

?>