<?php 
include '../../../connection.php';
$output = '
<div class="container mt-4">
    <div class="card" style="border-radius: 1rem; overflow: hidden;">
        <div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Renter Issues</div>
			<div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
				<div id="body_header" class="mb-3">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Subject</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
				</div>
			</div>
	</div>
</div>
';
/*
$mg_shop = $con->query("SELECT * FROM tbl_shop");
 	while($row=$mg_shop->fetch_array()){
$output .= '
		<tr>
			<td id="'.$row['shop_no'].'">'. $row['shop_no'] .'</td>
			<td>'. $row['shop_name'].'</td>
			<td>'. $row['shop_contact'] .'</td>
			<td>'. $row['shop_email'] .'</td>
			<td>
			
				<form mmethod="POST" action="view_pending_user_acc.php">
					<button type="button" id="mg_modal" name="submit" class="btn btn-success">View</button>
				</form>
			</td>
		</tr>
';
		
}*/

echo $output;

?>