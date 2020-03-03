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
} else {
	?>
		<script>
			let accNo = <?php echo $_SESSION['accNo'] ?>;
		</script>
	<?php
}

if(!empty($_GET['user'])) {
	$user = $_GET['user'];
	if($user != 'user') {
		?>
			<script>
				window.location.assign('shop_dashboard_2.php');
			</script>
		<?php 
	} 
} 

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/user.css">
	
	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome5/fontawesome-free-5.12.0-web/css/all.min.css">

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

	<script src="function/user_dashboard/user_function/cart_all_function.js"></script>
	<script src="function/user_dashboard/main_function.js"></script>
</body>
</html>

<style>
	/*cart-table*/
	#cart thead th{
		border: none;
	}
	#cart tbody td, #cart thead th{
		vertical-align: middle;
		color: #6c757d;
	}
	/*notif load*/
	.notif_show::after{
	  position:absolute;
	  right:0%;
	  top:0%;
	  content: attr(data-count);
	  font-size:50%;
	  padding:.6em;
	  border-radius:999px;
	  line-height:.75em;
	  color: white;
	  background:rgba(255, 0, 0, .85);
	  text-align:center;
	  min-width:2em;
	  font-weight:bold;
	}
	.dropdown-item:hover, .dropdown-item:focus {
	  color: #16181b;
	  text-decoration: none;
	  background-color: #f8f9fa;
	}
	.notif_hide::after{
	  background:rgba(255, 0, 0, 0.0);
	  content: '';
	}
</style> 


<!-- <div class="input-group">
						<input type="number" readonly value="'.$cart_row['item_quantity'].'" id="cart_qty'.$cart_row['cart_no'].'" class="form-control bg-white" />
						<input type="hidden" value="" id="available'.$cart_row['cart_no'].'" />
						<div class="input-group-append">
							<button type="button" class="btn btn-outline-default input-group-text" id="subBtn" value="'.$cart_row['cart_no'].'"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-outline-default input-group-text" id="addBtn" value="'.$cart_row['cart_no'].'"><i class="fa fa-plus"></i></button>
						</div>
					</div> -->