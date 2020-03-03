<?php 
echo "<h1>HELLO WORLD</h1>";
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
	<title>Home</title>
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
		<div id="main_display"></div>
		<div class="container my-5" style="border-bottom: 1px solid #333;">
			<h4>Most Popular</h4>
		</div>
		<div class="row" id="item_display"></div>
	</div>

	<!--Modal-->
	<div class="container-fluid">
		<div id="modals"></div>
	</div>

	<script src="js/popper.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="function/pages/pages_function/home.js"></script>
	<script src="function/pages/main.js"></script>
	
</body>
</html>

<style>
	ul li a{
		color: rgba(253, 126, 20, 0.8);
	}
	ul li a:hover{
		color: rgba(253, 126, 20, 0.6);
	}
</style>