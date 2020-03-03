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

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css-style/naz_custom.css">
	<link rel="stylesheet" href="fontawesome/css/all.min.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!--PLUGINS for Calendar-->
	<link rel="stylesheet" href="fullcalendar/calendar/packages/core/main.css">
	<link rel="stylesheet" href="fullcalendar/calendar/packages/daygrid/main.css">
	<link rel="stylesheet" href="fullcalendar/calendar/packages/timegrid/main.css">
	<link rel="stylesheet" href="fullcalendar/calendar/packages/bootstrap/main.css">

	<script src="fullcalendar/calendar/packages/core/main.js"></script>
	<script src="fullcalendar/calendar/packages/daygrid/main.js"></script>
	<script src="fullcalendar/calendar/packages/timegrid/main.js"></script>
	<script src="fullcalendar/calendar/packages/bootstrap/main.js"></script>
	<script src="fullcalendar/calendar/packages/interaction/main.js"></script>

</head>
<body>
	<!--Nav-->
	<div class="container-fluid">
		<div id="nav">
			<!--header nav-->
			<!--body nav-->	
		</div>	
	</div>
	<!--Body-->
	<div class="container-fluid">
		<div class="row">
			<!--Side Nav-->
			<div class="col-md-2" id="side_nav" style="border-right: 1px solid #ddd"></div>
			<!--Body data-->
			<div class="col-md-10 table-responsive" id="cart_data"></div>		
		</div>	
	</div>
	
	<!--Footer-->
	<div id="footer"></div>
	<!--Modal-->
	<div id="rent_out_modal"></div>
	<div id="calendar_modal"></div>

<script src="function/user_dashboard/cart_all_function.js"></script>
<script src="function/user_dashboard/main_function.js"></script>
</body>
</html>

<!-- <style>
	.dropdown .dropdown-menu{
		margin-top: 20px;
		border: none;
		box-shadow: 0 0 30px #ddd, 0 -7px 30px #eee;
	}
	.dropdown .dropdown-menu::after{
		content: " ";
		position: absolute;
		bottom: 100%;
		left: 75%;
		margin-left: -2px;
		border-width: 10px;
		border-style: solid;
		border-color: transparent transparent white transparent;
	}
	.cart_display tbody tr td i{
		cursor: pointer;
	}
</style> -->

