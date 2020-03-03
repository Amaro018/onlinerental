<?php 

include '../../connection.php';
session_start();

$output = '';
$output2 = '';

$output .= '
	<div id="header-top" class="col-lg-12">
		<nav class="navbar navbar-expand justify-content-end">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="" class="nav-link">Events</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">Contact Us</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">Customer Care</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" id="switch_userType">
							<label class="custom-control-label" for="switch_userType">Shop</label>
						</div>
					</a>
				</li>
			</ul>
		</nav>
	</div>
';

$output2 .= '
	<div id="header-mid" class="col-lg-12" style="background-color: rgba(253, 126, 20, 0.8)">
		<nav class="navbar navbar-expand justify-content-between">
			<ul class="navbar-nav">
				<li class="nav-item">								
					<a class="navbar-brand nav-link" href="index.php">Rental Shop</a>
				</li>
			</ul>
			<ul class="navbar-nav">
		';
if(!empty($_SESSION['accNo'])) {
 	$accNo = $_SESSION['accNo'];
 	$email = $_SESSION['email'];

 	$output2 .= '
 		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" id="shop_icon_msg">
				<span class="fa-stack fa-lg has-badge" data-count="">
				  <i class="fa fa-comment fa-stack-1x"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-header" href="#">Account ID: '.$accNo.'</a>
				<div class="dropdown-divider"></div>
	      		<a class="dropdown-item" href="#">'.$email.'</a>
	      		<a class="dropdown-item" href="manage_acc.php">Manage Account</a>
	      		<a class="dropdown-item" href="function/logout_function.php">Logout</a>
	    	</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" href="#" data-toggle="dropdown" id="shop_icon_notif">
				<span class="fa-stack fa-lg has-badge" data-count="" id="iNotif">
				  <i class="fa fa-bell fa-stack-1x"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" id="dropdown_notif"></div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<span class="fa-stack fa-lg has-badge">
				  <i class="fa fa-user fa-stack-1x"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-header" href="#">Account ID: '.$accNo.'</a>
				<div class="dropdown-divider"></div>
	      		<a class="dropdown-item" href="#">'.$email.'</a>
	      		<a class="dropdown-item" href="manage_acc.php">Manage Account</a>
	      		<a class="dropdown-item" href="user_cart.php">User Cart</a>
	      		<a class="dropdown-item" href="function/logout_function.php">Logout</a>
	    	</div>
		</li>
 	';
} else {
	$output2 .= '
		<li class="nav-item">
			<a class="nav-link" href="login.php">Login</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Sign up</a>
		</li>
	';
}

$output2 .= '
			</ul>
		</nav>
	</div>
';

$data = array(
	'top'		=>	$output,
	'mid'		=>	$output2
);

echo json_encode($data);

// background-image: linear-gradient(to left,rgba(0, 123, 255, 0.8), rgba(0, 123, 255, 0.5)) 


// $output .= '
// 	<div id="header-top" class="col-lg-12" style="border-bottom: 1px solid #ddd;">
// 		<nav class="navbar navbar-expand-sm justify-content-end">
// 			<ul class="navbar-nav">
// 				<li class="nav-item">
// 					<a href="" class="nav-link">Events</a>
// 				</li>
// 				<li class="nav-item">
// 					<a href="" class="nav-link">Contact Us</a>
// 				</li>
// 				<li class="nav-item">
// 					<a href="" class="nav-link">Customer Care</a>
// 				</li>
// 				<li class="nav-item">
// 					<a href="" class="nav-link">
// 						<div class="custom-control custom-switch">
// 							<input type="checkbox" checked class="custom-control-input" id="switch_userType">
// 							<label class="custom-control-label" for="switch_userType">User Mode</label>
// 						</div>
// 					</a>
// 				</li>
// 			</ul>
// 		</nav>
// 	</div>
// ';

// $output2 .= '
// 	<div id="header-mid" class="col-lg-12" style="border-bottom: 1px solid #ddd;">
// 		<nav class="navbar navbar-expand-sm justify-content-between">
// 			<ul class="navbar-nav">
// 				<li class="nav-item">								
// 					<a class="navbar-brand nav-link" href="index.php">Rental Shop</a>
// 				</li>
// 			</ul>
// 			<ul class="navbar-nav">
// 		';
// if(!empty($_SESSION['accNo'])) {
//  	$accNo = $_SESSION['accNo'];
//  	$email = $_SESSION['email'];

//  	$output2 .= '
//  		<li class="nav-item">
// 			<a class="nav-link" href="#"><i class="fal fa-comment" style="font-size: 20px;"></i></a>
// 		</li>
// 		<li class="nav-item">
// 			<a class="nav-link" href="#"><i class="fal fa-bell" style="font-size: 20px;"></i></a>
// 		</li>
// 		<li class="nav-item dropdown">
// 			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
// 				<i class="fal fa-user" style="font-size: 20px;"></i>
// 			</a>
// 			<div class="dropdown-menu dropdown-menu-right">
// 				<a class="dropdown-header" href="#">Account ID: '.$accNo.'</a>
// 				<div class="dropdown-divider"></div>
// 	      		<a class="dropdown-item " href="#">'.$email.'</a>
// 	      		<a class="dropdown-item" href="manage_acc.php">Manage Account</a>
// 	      		<a class="dropdown-item" href="function/logout_function.php">Logout</a>
// 	    	</div>
// 		</li>
//  	';
// } else {
// 	$output2 .= '
// 		<li class="nav-item">
// 			<a class="nav-link" href="login.php">Login</a>
// 		</li>
// 		<li class="nav-item">
// 			<a class="nav-link" href="#">Sign up</a>
// 		</li>
// 	';
// }

// $output2 .= '
// 			</ul>
// 		</nav>
// 	</div>
// ';

// $data = array(
// 	'top'		=>	$output,
// 	'mid'		=>	$output2
// );

// echo json_encode($data);

?>