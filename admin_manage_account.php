<?php

include 'function/connection.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/index.css">
	<link rel="stylesheet" href="css-style/admin_dashboard.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.8.1-web/css/all.min.css">

	<link rel="stylesheet" href="css-style/index.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body style="background-image: url('images/BckGrnd.jpg');">

	<!--NAVIGATION-->

	<div id="fRow" class="container-fluid">
		<div class="container">
			
			<ul class="nav justify-content-end">
				<li class="nav-item">
					<a class="nav-link" href="#">Events</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Customer Care</a>
				</li>
			</ul>
		</div>
	</div>

	<div id="sRow" class="container-fluid sticky-top">
		<div class="container p-2">
			<div class="row no-gutters">
				<div class="col-md-4">
					<ul class="nav">
						<li class="nav-item">
							<a class="navbar-brand text-light nav-link" href="#">Rental Shop</a>
						</li>
						<li class="nav-item">
							<?php
								if(empty($_SESSION['email']))
								{
									?> <a class="nav-link" href="registration.php">Signup</a><?php
								}
							?>
						</li>
						<li class="nav-item">
							<?php
								if(empty($_SESSION['email']))
								{
									?> <a class="nav-link" href="login.php">Login</a><?php ;
								}
							?>
						</li>
						<li class="nav-item dropdown">
							<?php
								if(empty($_SESSION['email']))
								{
									//comment//
								}
								else
								{
									?><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i></a>
										<div class="dropdown-menu mt-2">
											<a class="dropdown-item" href="#">Account ID: <?php echo $_SESSION['accNo'];?></a>
											<div class="dropdown-divider"></div>
								      		<a class="dropdown-item " href="#">
								      			<?php
													if(empty($_SESSION['email']))
													{
														echo'';
													}
													else
													{
														echo $_SESSION['email'];
													}
												?>	
								      		</a>
								      		<a class="dropdown-item" href="#">Settings</a>
								      		<a class="dropdown-item" href="function/logout_function.php">Logout</a>
								    	</div>
									<?php
								}
							?>
						</li>
					</ul>
				</div>
				<div class="col-md-8">
					<form>
						<div class="input-group">
							<input type="search" class="form-control" placeholder="Search...">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-search" style="color:#ad855c;"></i></span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="tRow" class="container-fluid">
		<div class="container">
			<ul class="nav nav-justified">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href=#>Category</a>
					<div class="dropdown-menu form-control">
			      		<a class="dropdown-item" href="#">Party Shop</a>
			      		<a class="dropdown-item" href="#">Gown & Barong</a>
			      		<a class="dropdown-item" href="#">Vehicle</a>
			    	</div>
				</li>
				<li class="nav-item">
					<a class="nav-link js-target-scroll" href="#whatsnew">What's New</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-target-scroll" href="#mostpopular">Most Popular</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Support</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">FAQ's</a>
				</li>
			</ul>
		</div>
	</div>

	<!--BODY-->

	<div id="sample" class="container-fluid">
		<div class="sample container">
			<!--bodyheader-->
			<div class="row no-gutters">
				<div class="col-md-12">
					<div class="adminDB">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-brand nav-link text-light" href="#"><h3><i class="fa fa-user"></i> Admin Dashboard</h3></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--side nav & details -->
			<div class="row">
				<!--side nav-->
				<div class="col-md-3">
					<div class="sNav">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="admin_dashboard.php"><i class="fa fa-tasks"></i> Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fa fa-th-list"></i> Manage User List</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Manage Shop List</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="user_pending_request.php"><i class="fa fa-users"></i> User Pending Request</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fa fa-users"></i> Shop Pending Request</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fa fa-wrench"></i> Tools</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
							</li>
						</ul>
					</div>
				</div>
				<!--details-->
				<div class="col-md-9 mt-4">
					<div class="card">
						<div class="card-header text-center">Profile Image</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-7">
									<?php
									$email = $_SESSION['email'];
									$accNo = $_SESSION['accNo'];
									$sql = "SELECT accNo from tbl_account where accNo = '$accNo' ";
									$result = mysqli_query($con, $sql);

									$sqlImg = "SELECT verified FROM tbl_status WHERE email = '$email' ";
									$resultImg = mysqli_query($con, $sqlImg);

									while($row = mysqli_fetch_assoc($resultImg)){
											echo "<div>";
												if($row['verified'] == false){
													echo "<img src='upload/profile".$accNo.".jpg' ".mt_rand()." class='img-thumbnail' width='450px' height='310px'>";
												}else{
													echo "<img src='upload/default_profile.png' width='310px' height='310px'>";
												}
											echo "</div>";
										}
									?>
								</div>

								<div class="col-md-5">
									<form action="function/upload_function.php" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-12 mb-4">
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="file" id="custom-file">
													<label class="custom-file-label" for="customFile">Choose file</label>
												</div>
											</div>
											<div class="col-md-12">
												<button class="btn btn-primary btn-block" type="submit" name="submit">Upload</button>
											</div>
										</div>
									</form>
								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-md-12">
									<?php 
										$accNo = $_SESSION['accNo'];
										$tbl_indreg = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$accNo' ");

										while($row=$tbl_indreg->fetch_array()){
									?>
									<h5 class="text-center">-Personal Information-</h5>
									<div class="row mb-2">
										<div class="col-md-6">
											<label>First Name:</label>
											<input type="text" name="fname" class="form-control" placeholder="<?php echo $row['fname']; ?>" disabled>
										</div>
										<div class="col-md-6">
											<label>Middle Name:</label>
											<input type="text" name="mname" class="form-control" placeholder="<?php echo $row['mname']; ?>" disabled>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-6">
											<label>Last Name:</label>
											<input type="text" name="lname" class="form-control" placeholder="<?php echo $row['lname']; ?>" disabled>
										</div>
										<div class="col-md-3">
											<label>Suffix:</label>
											<input type="text" name="suffix" class="form-control" placeholder="<?php echo $row['suffix']; ?>" disabled>
										</div>
										<div class="col-md-3">
											<label>Gender:</label>
											<input type="text" name="gender" class="form-control" placeholder="<?php echo $row['gender']; ?>" disabled>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-6">
											<label>Contact No.:</label>
											<input type="number" name="contact" class="form-control" placeholder="<?php echo $row['contact']; ?>" disabled>
										</div>
										<div class="col-md-6">
											<label>Birthday:</label>
											<input type="text" name="bday" class="form-control" placeholder="<?php echo $row['bday']; ?>" disabled>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-3">
											<label>Street:</label>
											<input type="text" name="a_st" class="form-control" placeholder="<?php echo $row['a_st']; ?>" disabled>
										</div>
										<div class="col-md-3">
											<label>Zone:</label>
											<input type="text" name="a_zone" class="form-control" placeholder="<?php echo $row['a_zone']; ?>" disabled>
										</div>
										<div class="col-md-3">
											<label>Barangay:</label>
											<input type="text" name="a_brgy" class="form-control" placeholder="<?php echo $row['a_brgy']; ?>" disabled>
										</div>
										<div class="col-md-3">
											<label>City:</label>
											<input type="text" name="a_city" class="form-control" placeholder="<?php echo $row['a_city']; ?>" disabled>
										</div>
									</div>
									<?php }

										$email = $_SESSION['email'];
										$tbl_account = $con->query("SELECT * FROM tbl_account WHERE email = '$email' ");

										while($row2=$tbl_account->fetch_array()){ 
									?>
									<hr>
									<h5 class="text-center">-Account Information-</h5>
									<hr>
									<div class="row mb-4">
										<div class="col-md-12">
											<label>Email Address:</label>
											<div class="input-group">
												<input type="email" name="email" class="form-control" value="<?php echo $row2['email']; ?>" required>
												<div class="input-group-append">
													<button onclick="changePwdView()" data-toggle="tooltip" type="button" class="input-group-text bg-primary" title="Edit"><small class="text-white">Edit</small></button>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<label>Password:</label>
											<input type="password" name="pword" class="form-control" placeholder="<?php echo $row2['pword']; ?>" required>
										</div>
										<div class="col-md-6">
											<label>Re-type Password:</label>
											<input type="password" name="rpword" class="form-control" placeholder="<?php echo $row2['rpword']; ?>" required>
										</div>
									</div>
									<?php } ?>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--FOOTER-->

	<div id="ftr" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link">Events</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">Customer Care</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link">What' New</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">Most Popular</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">Support</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">FAQ's</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</body>
</html>