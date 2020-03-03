<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<nav class="navbar navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link nav-brand">
					<img src="images/avatar1.png" alt="default" class="w-50 mx-auto d-block" style="border-radius:50%;">
				</a>
			</li>
			<li class="nav-item">
				<a href="user_account.php" class="nav-link"><i class="fa fa-home"></i> My Account</a>
			</li>
			<li class="nav-item">
				<a href="user_profile.php" class="nav-link"><i class="fa fa-th-list"></i> Profile</a>
			</li>
			<li class="nav-item">
				<a href="user_rentals.php" class="nav-link"><i class="fa fa-th-list"></i> Rentals</a>
			</li>
			<li class="nav-item">
				<a href="user_notifications.php" class="nav-link"><i class="fa fa-bell"></i> Notifications</a>
			</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> My Reviews</a>
				<div class="dropdown-menu border border-0 p-0 m-0" style="background-color: rgba(0, 123, 255, 0.1) ">
		      		<a class="dropdown-item" href="user_reviews.php?tab=0"><i class="fa fa-pen"></i> To be review</a>
		      		<a class="dropdown-item" href="user_reviews.php?tab=1"><i class="fa fa-history"></i> History</a>
		    	</div>
			</li>
			<li class="nav-item">
				<a href="user_messages.php" class="nav-link"><i class="fa fa-comments"></i> My Messages</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="user_cart.php"><i class="fa fa-shopping-cart"></i> Cart</a>
			</li>
		</ul>
	</nav>
';

echo $output;

?>

