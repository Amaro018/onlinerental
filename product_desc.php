<?php

include 'function/connection.php';

session_start();

unset($_SESSION['item_no']);
unset($_SESSION['item_name']);
unset($_SESSION['qty']);
unset($_SESSION['tutal']);
unset($_SESSION['presyo']);
unset($_SESSION['category']);


if(empty($_GET['item_no']))
{	
	?>
	<script>
		window.location.assign("all_products.php");
	</script>
	<?php
} else {
	if(!empty($_SESSION)){
		?>
		<script>
			let accNo = <?php echo $_SESSION['accNo']?>
		</script>
		<?php
	}
	else{
		?>
		<script>
			let accNo = 0;
		</script>
		<?php	
	}
	?>
	<script>
		let item_no = <?php echo $_GET['item_no']?>;
	</script>
	<?php 
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css-style/pages.css">
	<link rel="stylesheet" href="fontawesome5/fontawesome-free-5.12.0-web/css/all.min.css">

</head>
<body>

	<div id="chatbox_data"></div>

	<div class="container-fluid">
		<div id="nav-top" class="row"></div>
		<div id="nav-mid" class="row"></div>
		<div id="nav-bot"></div>
	</div>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-4" id="img"></div>
			<div class="col-md-8" id="desc"></div>
		</div>
	</div>

	<div class="container-fluid mt-4">
		<div class="row">
			<div class="col-md-8" id="reviews"></div>
			<div class="col-md-4" id="shop_data"></div>
		</div>
	</div>

	<!-- <div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-lg-2" id="side_nav"></div>
			<div class="col-md-8 col-lg-10 table-responsive" id="cart_data"></div>
		</div>
	</div> -->

	<!--Footer-->
	<!-- <div class="container-fluid">
		<div id="footer"></div>
	</div> -->
	<!--Modal-->
	<div class="container-fluid">
		<div id="modals"></div>
	</div>
	
	<script src="js/popper.min.js"></script>
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

	<script src="function/pages/pages_function/product_view.js"></script>
	<script src="function/pages/main.js"></script>

</body>
</html>

<style>
	/*nav bot color*/
	ul li a{
		color: rgba(253, 126, 20, 0.8);
	}
	ul li a:hover{
		color: rgba(253, 126, 20, 0.6);
	}
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
		font-size: 36px;
	}
	.stars-inner::before{
		content : "\f005 \f005 \f005 \f005 \f005";
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		color: #f8ce0b;
		font-size: 36px;
	}
	.outer{
		position:relative;
		display: inline-block;
	}
	.inner{
		position: absolute;
		top: 0;
		left: 0;
		white-space: nowrap;
		overflow: hidden;
		width: 0;
	}
	.outer::before{
		content : "\f005 \f005 \f005 \f005 \f005";
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		color: #ccc;
	}
	.inner::before{
		content : "\f005 \f005 \f005 \f005 \f005";
		font-family: 'Font Awesome 5 Free';
		font-weight: 900;
		color: #f8ce0b;
	}
</style>

