<?php 

include '../../connection.php';
$output = '';

$u_notif = "SELECT * FROM tbl_user_notifications ";
$u_notif_query = mysqli_query($con, $u_notif);
$u_notif_num = mysqli_num_rows($u_notif_query);

if($u_notif_num != 0){
	$output .= '
		<div class="card my-5">
			<div class="card-header">
				Notifications
			</div>
			<div class="card-body">
				<ul class="nav mb-2">
					<li class="nav-item">
						<a class="nav-link" href="#" id="order" style="color: rgba(220, 53, 69, 0.8);">
							<i class="fa fa-inbox"></i> Order Notifications
							<span class="badge badge-secondary badge-order" style="background-color: rgba(220, 53, 69, 0.8);">4</span>
						</a>
						<div class="underline-order" style="width: 210px;"></div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="date" style="color: rgba(108, 117, 125, 0.8);">
							<i class="fa fa-calendar"></i> Date Notifications
							<span class="badge badge-secondary badge-date">4</span>
						</a>
						<div class="underline-date"></div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="return" style="color: rgba(108, 117, 125, 0.8);">
							<i class="fa fa-tag"></i> Return Notifications
							<span class="badge badge-secondary badge-return">4</span>
						</a>
						<div class="underline-return"></div>
					</li>
				</ul>
				<table class="table" id="notif_table">
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
					<tbody>';
	while($u_notif_row = mysqli_fetch_array($u_notif_query)){
		$output .= '
				<tr style="background-color: rgba(220, 53, 69, 0.1)">
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="'.$u_notif_row['user_notif_no'].'" name="'.$u_notif_row['user_notif_no'].'">
							<label class="custom-control-label" for="'.$u_notif_row['user_notif_no'].'"></label>
						</div>
					</td>
					<td>
						<strong>Facebook</strong>
					</td>
					<td>
						<strong>Darrel Datur</strong>
						has order an item with a item number of 354  
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
}

echo $output;

?>