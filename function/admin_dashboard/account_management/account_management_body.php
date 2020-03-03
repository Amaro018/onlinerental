<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '

<div onclick="closeNav()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
	
	<div class="container mt-4">
	
		<div class="row">
			<div class="col-md-3 my-2 m-xl-0">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" style="background-image: linear-gradient(to top, #ffb31a, #ffcc66);">
			        	<div style="float: left;"><i class="fa fa-store fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>10</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Manage Shops</h4>
				    </div>
				</div>	

			</div>

			<div class="col-md-3  my-2 m-xl-0">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" style="background-image: linear-gradient(to top, #ffb31a, #ffcc66);">
				        <div style="float: left;"><i class="fa fa-users fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>99</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Manage Renters</h4>
				    </div>
				</div>		
			</div>
			<div class="col-md-3  my-2 m-xl-0">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" style="background-image: linear-gradient(to top, #ffb31a, #ffcc66);">
				        <div style="float: left;"><i class="fa fa-file-invoice fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>23</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Billing</h4>
				    </div>
				</div>		
			</div>
			<div class="col-md-3  my-2 m-xl-0" href="#" class="nav-link">
			<a href="#">
				<div class="card" style="overflow: hidden;">
					<div class="container pt-3 pb-3" style="background-image: linear-gradient(to top, #ffb31a, #ffcc66);" >
				        <div style="float: left;"><i class="fa fa-tasks fa-lg"></i></div>
				        <div style="float: right;">
				        <h3>50</h3>
				        </div>
				        <div class="clear"></div>
				        <h4>Pending Request</h4>
				    </div>
				</div>		
			</div>
		</div></a>	
	</div>
	

	<div onclick="closeNav()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
	<div class="container mt-2 p-2 text-secondary">
		<ul class="breadcrumb">
			<li>Pending Accounts</li>
			<li id="tab-account">All Pending Acounts</li>
			<li id="tab-pending" style="display: none;">Pending Shop Accounts</li>
			<li id="tab-blocked" style="display: none;">Pending Renter Accounts</li>
		</ul>
	</div>
	<div class="container">
		<div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
			<div id="body_header" class="mb-3">
				<ul class="nav mb-2">
					<li class="nav-item">
						<a class="nav-link" href="#" id="ALL">
							<i class="fa fa-list"></i> All
						</a>
						<div class="underline-ALL"></div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="SHOP">
							<i class="fa fa-store"></i> Shops
						</a>
						<div class="underline-SHOP"></div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="RENTER">
							<i class="fa fa-user"></i> Renters
						</a>
						<div class="underline-RENTER"></div>
					</li>
				</ul>
			</div>
			<div id="my_account_content"></div>
			<div id="pending_account_content" style="display: none;"></div>
			<div id="blocked_account_content" style="display: none;"></div>
	</div>

	';
echo $output;

?>

<style>
	#body_header ul li div{
		border-bottom: 3px solid rgba(220, 53, 69, 0.8);
		width: 0%;
	}
	#body_header a{
		padding-bottom: .3rem;
		color: gray;
	}
</style>