<?php

include 'function/connection.php';

session_start();

if(empty($_SESSION['userType']))
{
	?>
	<script>
	alert("Your are not login and you are not authorized to enter this page!");
	window.location.assign('index.php');
	</script>
	<?php
}
else if($_SESSION['userType'] != 'userShop')
{
	?>
	<script>
	alert("Your not authorized to enter this page!");
	window.location.assign('index.php');
	</script>
	<?php
}
else if($_SESSION['userType'] == 'admin')
{
	?>
	<script>
	alert("Your not authorized to enter this page!");
	window.location.assign('admin_dashboard.php');
	</script>
	<?php
} else {
	?>
	<script>
		let shop_no = <?php echo $_SESSION['shop_no']?>;
	</script>
	<?php
}

if(!empty($_GET['user'])) {
	$user = $_GET['user'];
	if($user != 'shop') {
		?>
			<script>
				window.location.assign('user_cart.php');
			</script>
		<?php 
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shop Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/shop.css">
	<link rel="stylesheet" href="js/croppie.css">
	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome5/fontawesome-free-5.12.0-web/css/all.min.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/croppie.js"></script>
</head>
<body>
	
	<div id="chatbox_data"></div>
	
	<div class="container-fluid">
		<div id="nav-top" class="row"></div>
		<div id="nav-mid" class="row"></div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-lg-2" id="shop_side_nav"></div>
			<div class="col-md-8 col-lg-10" id="shop_profile" style="background-color: rgba(0, 123, 255, 0.1)"></div>
		</div>
	</div>

<script src="function/shop_dashboard/shop_function/profile_all_function.js"></script>
<script src="function/shop_dashboard/main_function.js"></script>

</body>
</html>


<style>
	.stars-outer{
		position:relative;
		display: inline-block;
	}
	.stars-inner{
		position: absolute;
		top: 0;
		left: 0;
		white-space: nowrap;
		overflow: hidden;
		width: 0;
	}
	.stars-outer::before{
		content : "\f005 \f005 \f005 \f005 \f005";
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		color: #ccc;
	}
	.stars-inner::before{
		content : "\f005 \f005 \f005 \f005 \f005";
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		color: #f8ce0b;
	}
</style>
