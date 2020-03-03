<?php

include 'function/connection.php';

// session_start();

// unset($_SESSION['item_no']);
// unset($_SESSION['item_name']);
// unset($_SESSION['qty']);
// unset($_SESSION['tutal']);
// unset($_SESSION['presyo']);
// unset($_SESSION['category']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/index.css">
	<link rel="stylesheet" href="fontawesome/css/all.min.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<!--new bootstrap-->
	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css-style/naz_custom.css">

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
	<div class="container-fluid">
		<div id="nav-top" class="row"></div>
		<div id="nav-mid" class="row"></div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-lg-2" id="side_nav"></div>
			<div class="col-md-8 col-lg-10 table-responsive" id="cart_data"></div>
		</div>
	</div>

	<!--Footer-->
	<div class="container-fluid">
		<div id="footer"></div>
	</div>
	<!--Modal-->
	<div class="container-fluid">
		<div id="rent_out_modal"></div>
		<div id="calendar_modal"></div>
	</div>

	<script src="function/pages/pages_function/product_view.js"></script>
	<script src="function/pages/main.js"></script>

</body>
</html>

