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
				<a href="shop_dashboard_2.php" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
			</li>
			<li class="nav-item">
				<a href="user_profile.php" class="nav-link"><i class="fa fa-list"></i> Transaction</a>
			</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> Item Management</a>
				<div class="dropdown-menu border border-0 p-0 m-0" style="background-color: rgba(0, 123, 255, 0.1) ">
		      		<a class="dropdown-item" href="shop_item_list_2.php"><i class="fal fa-list"></i> Item List</a>
		      		<a class="dropdown-item" href="#"><i class="fal fa-plus"></i> Add Item</a>
		      		<a class="dropdown-item" href="#"><i class="fal fa-pen"></i> Update Item</a>
		    	</div>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link"><i class="fa fa-suitcase"></i> Shop Management</a>
			</li>
			<li class="nav-item">
				<a href="user_reviews.php" class="nav-link"><i class="fa fa-users"></i> My Reviews</a>
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
		</ul>
	</nav>
';

echo $output;

?>

