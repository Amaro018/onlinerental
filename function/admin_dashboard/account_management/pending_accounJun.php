<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<div onclick="closeNav()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
	<div class="container mt-2 p-2 text-secondary">
		<ul class="breadcrumb">
			<li>Account Management</li>
			<li id="tab-account">Manage My Account</li>
			<li id="tab-pending" style="display: none;">Pending Account</li>
			<li id="tab-blocked" style="display: none;">Blocked Account</li>
		</ul>
	</div>
	<div class="container">
		<div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
			<div id="body_header" class="mb-3">
				<ul class="nav mb-2">
					<li class="nav-item">
						<a class="nav-link" href="#" id="All">
							<i class="fa fa-user"></i> Manage My Account
						</a>
						<div class="underline-my-account"></div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="Renter">
							<i class="fa fa-list"></i> Pending Account
						</a>
						<div class="underline-pending-acc"></div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" id="Shop">
							<i class="fa fa-ban"></i> Blocked Account
						</a>
						<div class="underline-blocked-acc"></div>
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