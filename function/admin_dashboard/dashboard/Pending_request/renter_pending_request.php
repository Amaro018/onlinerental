<?php 
include '../../../connection.php';
$output = '
<div class="container mt-4">
	<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Renter pending account</div>
				<div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
					<div id="body_header" class="mb-3">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Renter ID</th>
									<th>Renter Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
					</div>
				</div>
	</div>
</div>
';
$mg_pendingRenter = $con->query("SELECT tbl_account.status,tbl_indreg.accNo, tbl_indreg.fname, tbl_indreg.lname, tbl_account.email,tbl_account.userType FROM tbl_indreg INNER JOIN tbl_account ON tbl_indreg.accNo = tbl_account.accNo WHERE status = 'pending' AND userType = 'user';");
 	while($row=$mg_pendingRenter->fetch_array()){


$output .= '
		<tr>
			<td>
			<input type="hidden" name="shopNo_pending" id="statusNo_pending'.$row['accNo'].'" value="'. $row['accNo'] .'">
			<input type="hidden" name="accNo_pending" id="accNo_pending'.$row['accNo'].'" value="'. $row['accNo'] .'">
			'. $row['accNo'] .'</td>
			<td>'. $row['fname']. ' ' .$row['lname'] .'</td>
			<td>'. $row['email'] .'</td>			

			<td>
			
				<form method="POST" action="view_pending_user_acc.php">
					<button type="button" id="mg_modal" name="submit" class="btn btn-success">View</button>
					<button type="button" onclick="accept_renter('.$row['accNo'].');" id="'.$row['accNo'].'" class="pending_accept btn btn-primary text-light">Accept</button>
				</form>
			</td>
		</tr>
';
		
}

echo $output;

?>