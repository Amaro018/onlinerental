<?php 

include '../../connection.php';
$output = '';
$shop_no = $_POST['shop_no'];

$shop = "SELECT * FROM tbl_shop WHERE shop_no = '$shop_no' ";
$shop_query = mysqli_query($con, $shop);
$shop_row = mysqli_fetch_array($shop_query);

$output .= '
	<nav class="navbar navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link nav-brand">
					<div style="width: auto;" align="center">
						<div style="width: 5rem; height: 5rem; border: 1px solid #ddd; align-items: center; display: flex; border-radius: 50%; overflow: hidden;">
							<img src="up/'.$shop_row['shop_img'].'" class="w-100" style="vertical-align:middle;">
						</div>
					</div>
				</a>
			</li>
			<li class="nav-item">
				<a href="shop_dashboard.php" class="nav-link"><i class="fa fa-home"></i> Dashboard</a>
			</li>
			<li class="nav-item">
				<a href="shop_billing.php" class="nav-link"><i class="fa fa-list"></i> Billing</a>
			</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> Item Management</a>
				<div class="dropdown-menu border border-0 p-0 m-0" style="background-color: rgba(0, 123, 255, 0.1) ">
		      		<a class="dropdown-item" href="shop_item_list.php"><i class="fa fa-list"></i> Item List</a>
		      		<a class="dropdown-item" href="shop_item_list.php"><i class="fa fa-plus"></i> Add Item</a>
		      		<a class="dropdown-item" href="shop_item_list.php"><i class="fa fa-pen"></i> Update Item</a>
		    	</div>
			</li>
			<li class="nav-item">
				<a href="shop_management.php" class="nav-link"><i class="fa fa-suitcase"></i> Shop Management</a>
			</li>
			<li class="nav-item">
				<a href="shop_reviews.php" class="nav-link"><i class="fa fa-users"></i> My Reviews</a>
			</li>
			<li class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Notifications</a>
				<div class="dropdown-menu border border-0 p-0 m-0" style="background-color: rgba(0, 123, 255, 0.1) ">
		      		<a class="dropdown-item" href="shop_notifications.php"><i class="fa fa-inbox"></i> Inbox</a>
		      		<a class="dropdown-item" href="shop_notifications.php"><i class="fa fa-plus"></i> Unread</a>
		      		<a class="dropdown-item" href="shop_notifications.php"><i class="fa fa-pen"></i> Spam</a>
		    	</div>
			</li>
			<li class="nav-item">
				<a href="shop_messages.php" class="nav-link"><i class="fa fa-envelope"></i> My Messages</a>
			</li>
			<li class="nav-item">
				<a href="shop_profile.php" class="nav-link"><i class="fa fa-user"></i> My Profile</a>
			</li>
			<li class="nav-item">
				<a href="shop_account.php" class="nav-link"><i class="fa fa-cogs"></i> My Account</a>
			</li>
		</ul>
	</nav>
';

echo $output;

?>

