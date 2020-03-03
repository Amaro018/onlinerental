<?php

include '../../connection.php';
session_start();

$output = '';

//jj
/*query for total pending shops*/
$q = $con->query("SELECT * FROM tbl_account WHERE status = 'pending' AND userType = 'userShop';");
$pending_shops_total = mysqli_num_rows($q);

/*query for total pending renter*/
$q1 = $con->query("SELECT * FROM tbl_account WHERE status = 'pending' AND userType = 'user';");
$pending_renter_total = mysqli_num_rows($q1);

//query for top 10
// $q2 = $con->query("SELECT tbl_shop.shop_no, tbl_shop.shop_name,tbl_shop.status, tbl_shop_followers.shop_no FROM tbl_shop INNER JOIN tbl_shop_followers ON tbl_shop.shop_no = tbl_shop_followers.shop_no AND status = '1';");
// $r = mysqli_num_rows($q2);

$output .= '
	<div onclick="closeNav()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
	<div class="container mt-4" style="cursor:pointer">
		<div class="row">




			<div class="col-md-3 my-2 m-xl-0" id="mg_pendingShop" onclick="show_pending_shops();">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3";">
			        	<div style="float: left;"><i class="fa fa-store fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>'.$pending_shops_total.'</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Pending Shops</h4>
				    </div>
				</div>
			</div>
			<div class="col-md-3  my-2 m-xl-0" id="mg_pendingRenter"  onclick="show_pending_renter();">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" ;">
				        <div style="float: left;"><i class="fa fa-users fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>'.$pending_renter_total.'</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Pending Renter</h4>
				    </div>
				</div>
			</div>
			<div class="col-md-3  my-2 m-xl-0"  id="mg_renter_issue">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" ;">
				        <div style="float: left;"><i class="fa fa-file-invoice fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>23</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Renter Issues</h4>
				    </div>
				</div>		
			</div>
			<div class="col-md-3  my-2 m-xl-0" id="mg_suspend_shop">
				<a><div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" ;" >
				        <div style="float: left;"><i class="fa fa-tasks fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>50</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Shop Suspension</h4>
				    </div>
				</div>		
			</div>
		</div></a>
	</div>
	<div class="container mt-4">
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)"; border-bottom: none; ">
				Top 10 Famous shops
			</div>
			<div class="card">
				<div id="body_transaction" class="table-responsive"></div>
			</div>
		</div>	
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-4">
				<div class="card" style="border-radius: 1rem; overflow: hidden;">
					<div class="card-header text-white" style="background-color: rgba(0, 123, 255, 0.8)">Header...</div>
					<div class="card-body">Body...</div>
				</div>		
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Header...
					</div>
					<div class="card-body">
						Body...
					</div>					
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-4">
				<div class="card" style="border-radius: 1rem; overflow: hidden;">
					<div class="card-header text-white" style="background-color: rgba(220, 53, 69, 0.8)">Header...</div>
					<div class="card-body">Body...</div>
				</div>	
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Header...
					</div>
					<div class="card-body">
						Body...
					</div>					
				</div>
			</div>
		</div>
	</div>
';

echo $output; 

?>

