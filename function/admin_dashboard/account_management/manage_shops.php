<?php 
include '../../connection.php';
$output = '
	<div class="container my-4">
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Shop Management</div>
				<div class="container">
					<div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
						<div id="body_header" class="mb-3">
							<table class="table table-bordered text-center">
								<thead>
									<tr>
										<th>Shop No.</th>
										<th>Shop Name</th>
										<th>Shop Contact</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
							<tbody>
					</div>
				</div>
			</div>
		</div>
	</div>
';
$mg_shop = $con->query("SELECT tbl_shop.shop_name,tbl_shop.shop_no,tbl_shop.shop_contact,tbl_shop.shop_email FROM tbl_shop INNER JOIN tbl_account ON tbl_shop.accNo = tbl_account.accNo WHERE status = 'verified';");
 	while($row=$mg_shop->fetch_array()){
$output .= '
		<tr>
			<td id="'.$row['shop_no'].'">'. $row['shop_no'] .'</td>
			<td>'. $row['shop_name'].'</td>
			<td>'. $row['shop_contact'] .'</td>
			<td>'. $row['shop_email'] .'</td>
			<td>
			
				<form method="POST" action="">
					<button type="button" id="mg_modal" name="submit" class="btn btn-success">View</button>
				</form>
			</td>
		</tr>
';
		
}

echo $output;

?>