<?php 

include '../../../connection.php';
session_start();

$output = '';

$output = '

<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th>Account No.</th>
				<th>Name</th>
				<th>User Type</th>
				<th>Email</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
';

$status_table = $con->query("SELECT tbl_indreg.accNo, tbl_indreg.fname, tbl_indreg.lname, tbl_account.email,tbl_account.userType, tbl_status.pending FROM tbl_indreg INNER JOIN tbl_account ON tbl_indreg.accNo = tbl_account.accNo INNER JOIN tbl_status ON tbl_account.email = tbl_status.email WHERE pending = true ");
 	while($row=$status_table->fetch_array()){
$output .= '
		<tr>
			<td>'. $row['accNo'] .'</td>
			<td>'. $row['fname']. ' ' .$row['lname'] .'</td>
			<td>'. $row['userType'] .'</td>
			<td>'. $row['email'] .'</td>
			
			<td>
			
				<form method="POST" action="view_pending_user_acc.php">
					<button type="submit" name="submit" class="btn btn-success">View</button>

					<button type="button" id="'.$row['accNo'].'" class="pending_accept btn btn-primary text-light">Accept</button>
					<input type="hidden" name="accNo" value="'. $row['accNo'] .'">
					<button type="submit" name="submit" class="btn btn-danger">Reject</button>
					</form>
			</td>
		</tr>
';
}
								/*  Approved Function */
								
									if(isset($_GET['email']))
									{
										$email = $_GET['email'];
										$result = $con->query("UPDATE tbl_status SET pending = false WHERE email = '$email' ");

										if($result)
										{
											?>
											<script>
												alert("The account has been approved");
												window.location.href='pending_request.php';
											</script><?php
										}
										else{
											?>
											<script>
												alert("Failed to approved account");
												window.location.href='pending_request.php';
											</script><?php
										 }
									}
				$output .= '
							</tbody>
						</table>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	';

		



echo $output;
?>