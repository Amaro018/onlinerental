<?php 

include 'function/connection.php';
session_start();
if(!empty($_SESSION)){
	?>
	<script>
		let accNo = <?php echo $_SESSION['accNo']; ?>;
	</script>
	<?php
} else {
	?>
	<script>
		let accNo = 0;
		console.log('not login');
	</script>
	<?php
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
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

	<div class="container mt-4">
		<div align="right" class="mb-2">
			<select class="custom-select col-md-2" id="order_by">
			    <option value="customer rating">Customer Rating</option>
			    <option value="most popular">Most Popular</option>
			    <option value="low to high">Low to High</option>
				<option value="high to low">High to Low</option>
			</select>
			<!-- <select class="custom-select col-md-1" id="number_per_page">
			    <option selected value="4">4</option>
			    <option value="3">3</option>
			    <option value="2">2</option>
				<option value="1">1</option>
			</select> -->
		</div>
		<div class="row">
			<div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-lg-5 mb-md-5 mb-sm-5">
				<div class="row" id="variants">
					
				</div>
			</div>
			<div class="col-xl-9 col-lg-12">
				<div class="row">
					<div class="col-md-12 mb-4">
						<div class="row no-gutters" id="images"></div>
					</div>
					<div class="col-md-12">
						<div align="center" id="pages"></div>	
					</div>
				</div>	
			</div>
		</div>
	</div>

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
	
	<script src="function/pages/pages_function/product_list.js"></script>
	<script src="function/pages/main.js"></script>

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
	ul li a{
		color: rgba(253, 126, 20, 0.8);
	}
	ul li a:hover{
		color: rgba(253, 126, 20, 0.6);
	}
</style>
