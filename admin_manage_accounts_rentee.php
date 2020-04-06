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
else if($_SESSION['userType'] == 'userShop')
{
	?>
	<script>
	alert("Your not authorized to enter this page!");
	window.location.assign('shop_dashboard.php');
	</script>
	<?php
}
else if($_SESSION['userType'] != 'admin')
{
	?>
	<script>
	alert("Your not authorized to enter this page!");
	window.location.assign('index.php');
	</script>
	<?php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!--<script src="popper/popper.js-1.14.7/dist/umd/popper.js"></script>-->
	<!--<script src="bs4-js-files/bootstrap.min.js"></script>-->
	<!--<script src="bs4-js-files/jquery.min.js"></script>-->
	<!--<link rel="stylesheet" href="bs4-js-files/bootstrap.min.css">-->

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/admin.css">
	<link rel="stylesheet" href="js/croppie.css">
	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome5/fontawesome-free-5.12.0-web/css/all.min.css">
	<link rel="stylesheet" href="resources/toast/toastr.min.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/croppie.js"></script>
	<script src="function/admin_dashboard/admin_function/account_management.js"></script>
	<script src="function/admin_dashboard/main_function.js"></script>

</head>
<body>

	
	<div class="container-fluid m-0 p-0 sticky-top">
		<div id="nav-top" class="row"></div>
		<div id="nav-mid" class="row"></div>
	</div>

	<div class="container-fluid">
		<div class="row" >
			<div id="admin_side_nav"></div>
			<div id="admin_rentee_account_management"></div>
		</div>
	</div>

	<div id="modal"></div>
	<div id="modal_billing"></div>

</body>
<script src="./resources/toast/sweetalert2.min.js"></script>
<script src="./resources/toast/toastr.min.js"></script>
</html>
