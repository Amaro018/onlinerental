<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<nav class="navbar navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link nav-brand">
					<div style="width: auto;" align="center">
						<div style="width: 5rem; height: 5rem; border: 1px solid #ddd; align-items: center; display: flex; border-radius: 50%; overflow: hidden;">
							<img src="up/avatar1.png" class="w-100" style="vertical-align:middle;">
						</div>
					</div>
				</a>
			</li>
			<li class="nav-item">
				<a href="admin_dashboard.php" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
			</li>

			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-stream"></i> Manage Account</a>
				<div class="dropdown-menu border border-0 p-0 m-0" style="background-color: rgba(0, 123, 255, 0.1) ">
		      		<a class="dropdown-item" href="#" id="mg_shop"> Manage Shops <i class="fas fa-store"></i></a>
		      		<a class="dropdown-item" href="#" id="mg_renter"> Manage Renters <i class="fas fa-user"></i></a>
		    	</div>
			</li>
			

			<li class="nav-item">
				<a href="admin_category.php" class="nav-link"><i class="fa fa-suitcase"></i> Category Management</a>
			</li>
			


			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Notifications</a>
				<div class="dropdown-menu border border-0 p-0 m-0" style="background-color: rgba(0, 123, 255, 0.1) ">
		      		<a class="dropdown-item" href="shop_notifications.php"><i class="fal fa-inbox"></i> Inbox</a>
		      		<a class="dropdown-item" href="#"><i class="fal fa-plus"></i> Unread</a>
		      		<a class="dropdown-item" href="#"><i class="fal fa-pen"></i> Spam</a>
		    	</div>
			</li>
			<li class="nav-item">
				<a href="shop_messages.php" class="nav-link"><i class="fa fa-envelope"></i> My Messages</a>
			</li>

			<li class="nav-item">
				<a href="#" class="nav-link" onclick="billing();"><i class="fa fa-file-invoice""></i> Billing</a>
			</li>

			<li class="nav-item">
				<a href="#" class="nav-link"><i class="fa fa-user"></i> My Account</a>
			</li>

		</ul>
	</nav>
';

echo $output;

?>

