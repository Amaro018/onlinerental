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
			let tab = <?php echo $_GET['tab']?>;
			let accNo = <?php echo $_SESSION['accNo']?>;
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

	<link rel="stylesheet" href="css-style/user.css">

	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome5/fontawesome-free-5.12.0-web/css/all.min.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
	<!--Nav-->
	<div class="container-fluid">
		<div id="nav-top" class="row"></div>
		<div id="nav-mid" class="row"></div>	
	</div>
		
	<!--Body-->
	<div class="container-fluid">
		<div class="row">
			<!--Side Nav-->
			<div class="col-md-2" id="side_nav" style="border-right: 1px solid #ddd"></div>
			<!--Body data-->
			<div class="col-md-10" id="reviews_data"></div>		
		</div>
	</div>
	<!--Footer-->
	<div class="container-fluid">
		<div id="footer"></div>
	</div>
	<!--Modal-->
	<div class="container-fluid">
		<div id="modals"></div>
	</div>

<script src="function/user_dashboard/user_function/reviews_all_function.js"></script>
<script src="function/user_dashboard/main_function.js"></script>

</body>
</html>

<style>
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
	td, th{
		color: gray;
	}
</style> 