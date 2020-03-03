<?php

include 'function/connection.php';

session_start();

if(empty($_SESSION['userType']))
{
	?>
	<script>
	alert("Your are not login and you are not authorized to enter this page!");
	window.location.assign('index2.php');
	</script>
	<?php
}
else if($_SESSION['userType'] == 'userShop' || $_SESSION['userType'] == 'user')
{
	?>
	<script>
	alert("Your not authorized to enter this page!");
	window.location.assign('index2.php');
	</script>
	<?php
}
else {
	?>
	<script>
		let accNo = <?php echo $_SESSION['accNo'] ?>;
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
	<title>Admin Category</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/admin.css">
	<link rel="stylesheet" href="js/croppie.css">
	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome5/fontawesome-free-5.12.0-web/css/all.min.css">

	<!-- charts -->
	<script src="chart/samples/utils.js"></script>
	<script src="chart/Chart.min.js"></script>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/croppie.js"></script>
</head>
<body>
	<div id="chatbox_data"></div>

	<div class="container-fluid m-0 p-0 sticky-top">
		<div id="nav-top" class="row"></div>
		<div id="nav-mid" class="row"></div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div id="admin_side_nav"></div>
			<div id="admin_category"></div>
			<!-- 9, 15, 126, 0.8 -->
		</div>
	</div>
	
	<script src="function/admin_dashboard/admin_function/category.js"></script>
	<script src="function/admin_dashboard/main_function.js"></script>

</body>
</html>

