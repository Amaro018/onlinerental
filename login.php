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
	<title>Login</title>
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
	</div>

	<div class="container mt-4 py-5">
		<div id="login_form" class="my-5"></div>
	</div>

	<!--Modal-->
	<div class="container-fluid">
		<div id="modals"></div>
	</div>

	<script src="js/popper.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="function/pages/pages_function/login.js"></script>
	<script src="function/pages/main.js"></script>

</body>
</html>