<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<div class="container mt-4 p-2 bg-light text-secondary">
		<nav class="navbar navbar-expand-sm justify-content-between">
			<a class="navbar-brand">
				Dashboard
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
	<div class="container mt-4">
		<div class="row">
			<div class="col-md-3">
				<div class="card mini-card-box">
					<div class="card-body">
				 		<div class="row">
				 			<div class="col-md-3" style="align-self: center;">
				 				<i class="fa fa-handshake text-danger" style="font-size: 2rem"></i>
				 			</div>
				 			<div class="col-md-9">
				 				<div class="container-fluid">
				 					<p class="mb-0 text-right">To be pickup</p>
									<h4 class="text-right mb-0 mini-card" id="pickup" style="cursor: pointer;">
										<div class="spinner-border spinner-border-sm text-danger"></div>
									</h4>
				 				</div>
				 			</div>
				 		</div>
				 		<p class="text-muted mt-3 mb-0">
		                	<i class="fa fa-info-circle mr-1" aria-hidden="true"></i> 65% pickup items
		                </p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mini-card-box">
					<div class="card-body">
				 		<div class="row">
				 			<div class="col-md-3" style="align-self: center;">
				 				<i class="fa fa-truck text-warning" style="font-size: 2rem"></i>
				 			</div>
				 			<div class="col-md-9">
				 				<div class="container-fluid">
				 					<p class="mb-0 text-right">To be deliver</p>
									<h4 class="text-right mb-0 mini-card" id="deliver" style="cursor: pointer;">
										<div class="spinner-border spinner-border-sm text-warning"></div>
									</h4>
				 				</div>
				 			</div>
				 		</div>
				 		<p class="text-muted mt-3 mb-0">
		                	<i class="fa fa-info-circle mr-1" aria-hidden="true"></i> 12% deliver items
		                </p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mini-card-box">
					<div class="card-body">
				 		<div class="row">
				 			<div class="col-md-3" style="align-self: center;">
				 				<i class="fa fa-list-alt text-success" style="font-size: 2rem"></i>
				 			</div>
				 			<div class="col-md-9">
				 				<div class="container-fluid">
				 					<p class="mb-0 text-right">Unreturn</p>
									<h4 class="text-right mb-0 mini-card" id="unreturn" style="cursor: pointer;">
										None
									</h4>
				 				</div>
				 			</div>
				 		</div>
				 		<p class="text-muted mt-3 mb-0">
		                	<i class="fa fa-info-circle mr-1" aria-hidden="true"></i> 6% unreturn items
		                </p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card mini-card-box">
					<div class="card-body">
				 		<div class="row">
				 			<div class="col-md-3" style="align-self: center;">
				 				<i class="fa fa-users text-info" style="font-size: 2rem"></i>
				 			</div>
				 			<div class="col-md-9">
				 				<div class="container-fluid">
				 					<p class="mb-0 text-right">Shop Followers</p>
									<h4 class="text-right mb-0 mini-card" id="shop_followers" style="cursor: pointer;">
										<div class="spinner-border spinner-border-sm text-info"></div>
									</h4>
				 				</div>
				 			</div>
				 		</div>
				 		<p class="text-muted mt-3 mb-0">
		                	<i class="fa fa-info-circle mr-1" aria-hidden="true"></i> 100% others
		                </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container my-5">
		<div class="row">
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<div id="chart"></div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-body">
						<div id="popular"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container my-4" hidden>
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8); border-bottom: none; ">
				Transaction Items
			</div>
			<div class="card-body">
				<div id="body_transaction" class="table-responsive"></div>
			</div>
		</div>	
	</div>
';

echo $output; 

?>


