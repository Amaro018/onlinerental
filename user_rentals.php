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

	<link rel="stylesheet" href="newBootstrap/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="css-style/naz_custom.css"> -->
	<link rel="stylesheet" href="fontawesome/css/all.min.css">

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
			<div class="col-md-10" id="rentals_data"></div>		
		</div>
	</div>
	<!--Footer-->
	<div class="container-fluid">
		<div id="footer"></div>
	</div>
	<!--Modal-->
	<div class="container-fluid">
		<div id="rent_out_modal"></div>
	</div>

<script src="function/user_dashboard/user_function/rentals_all_function.js"></script>
<script src="function/user_dashboard/main_function.js"></script>

</body>
</html>

<style>
	#cart thead th{
		border: none;
	}
	#cart tbody td, #cart thead th{
		vertical-align: middle;
		color: #6c757d;
	}
	button{
		cursor: not-allowed;
	}
	#side_nav{
		padding: 0;
		border-right: 1px solid #ddd;
	}
	#side_nav nav{
		display: block;
		padding: 0;
	}
	#side_nav a{
		padding: 1rem 2rem;
		border-bottom: 1px solid #ddd;
	}
	#side_nav nav ul li a:hover{
		background-color: #ddd;
	}
	#header-mid .dropdown .dropdown-menu{
		margin-top: 0.5rem;
		border: none;
		box-shadow: 0 0 3px #ddd;
	}
	#header-mid .dropdown .dropdown-menu::after{
		content: " ";
		position: absolute;
		bottom: 100%;
		right: 1.3rem;
		margin-left: 0;
		border-width: 10px;
		border-style: solid;
		border-color: transparent transparent white transparent;
	}
	#header-mid nav ul li > :first-child{
		color: white;
	}
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