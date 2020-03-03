<?php 

include '../../connection.php';
session_start();

$output = '';
$output .= '
	<div id="header-mid" class="col-lg-12" style="background-color: rgba(9, 15, 126, 0.8)">
		<nav class="navbar navbar-expand justify-content-between">
			<ul class="navbar-nav">
				<li class="nav-item">								
					<a class="navbar-brand nav-link" href="index.php">SUBLI ADMIN</a>
				</li>
			</ul>
			<ul class="navbar-nav">
		';



if(!empty($_SESSION['accNo'])) {
 	$accNo = $_SESSION['accNo'];
 	$email = $_SESSION['email'];

 	$output .= '
 		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#" id="admin_icon_msg">
				<span class="fa-stack has-badge" data-count="">
				  <i class="fa fa-lg fa-comment fa-stack-1x"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" id="messages"></div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" href="#" data-toggle="dropdown" id="admin_icon_notif">
				<span class="fa-stack has-badge" data-count="" id="iNotif">
				  <i class="fa fa-lg fa-bell fa-stack-1x"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right" id="dropdown_notif"></div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<span class="fa-stack has-badge">
				  <i class="fa fa-lg fa-user fa-stack-1x"></i>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<span class="dropdown-header" href="#">Account ID: '.$accNo.'</span>
				<div class="dropdown-divider"></div>
	      		<a class="dropdown-item" href="manage_acc.php">Manage Account</a>
	      		<a class="dropdown-item" href="function/logout_function.php">Logout</a>
	    	</div>
		</li>
 	';
} else {
	$output .= '
		<li class="nav-item">
			<a class="nav-link" href="login.php">Login</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Sign up</a>
		</li>
	';
}

$output .= '
			</ul>
		</nav>
	</div>
';

$data = array(
	'top'		=>	$output
);

echo json_encode($data);

?>

