<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!--<script src="popper/popper.js-1.14.7/dist/umd/popper.js"></script>-->
	<!--<script src="bs4-js-files/bootstrap.min.js"></script>-->
	<!--<script src="bs4-js-files/jquery.min.js"></script>-->
	<!--<link rel="stylesheet" href="bs4-js-files/bootstrap.min.css">-->

	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="css-style/index.css">
	<link rel="stylesheet" href="css-style/busReg.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.8.1-web/css/all.min.css">

	<!--<link rel="stylesheet" href="css-style/index.css">-->
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
				<!--
				<li class="nav-item">
					<a  onclick="document.getElementById('id01').style.display='block'" style="width: auto;" class="nav-link" href="#">Login</a>
				</li>-->
			</ul>
		</div>
	</div>

	<div id="sRow" class="container-fluid sticky-top">
		<div class="container p-2">
			<div class="row no-gutters">
				<div class="col-md-4">
					<ul class="nav">
						<li class="nav-item">
							<a class="navbar-brand text-light nav-link" href="index.php">Rental Shop</a>
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
									
								}
								else
								{
									?><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i></a>
										<div class="dropdown-menu form-control mt-2">
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

	<div id="regUser" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="rUser">
						<h2 class="text-center">Business Registration Form</h2>
						<form class="form-group text-center" method="POST" role="form" action="function/busReg_function.php">
							<input type="hidden" name="userType" value="userShop">
							<div class="row">
								<div class="col-md-8 offset-md-2">
									<hr>
									<h5>-Personal Information-</h5>
									<hr>
									<div class="row mb-2">
										<div class="col-md-6">
											<label>First Name:</label>
											<input type="text" name="fname" class="form-control text-capitalize" placeholder="Enter First Name" value="<?php
												if(empty($_SESSION['fname']))
												{
													echo'';
												}
												else
												{
													echo $_SESSION['fname'];
												}
											?>" required autofocus>
										</div>
										<div class="col-md-6">
											<label>Middle Name:</label>
											<input type="text" name="mname" class="form-control text-capitalize" placeholder="Enter Middle Name" required>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-6">
											<label>Last Name:</label>
											<input type="text" name="lname" class="form-control text-capitalize" placeholder="Enter Last Name" required>
										</div>
										<div class="col-md-3">
											<label>Suffix:</label>
											<input type="text" name="suffix" class="form-control text-capitalize" placeholder="Suffix Name" >
										</div>
										<div class="col-md-3">
											<label>Gender:</label>
											<select class="form-control" name="gender" required>
												<option>Choose Gender..</option>
												<option>Male</option>
												<option>Female</option>
												<option>Others</option>
											</select>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-6">
											<label>Contact No.:</label>
											<input type="number" name="contact" class="form-control" placeholder="Contact No" >
										</div>
										<div class="col-md-6">
											<label>Birthday:</label>
											<input type="date" name="bday" class="form-control" placeholder="ex: Magallanes St." value="" required>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-3">
											<label>Street:</label>
											<input type="text" name="a_st" class="form-control text-capitalize" placeholder="ex: Magallanes St." value="" required>
										</div>
										<div class="col-md-3">
											<label>Zone:</label>
											<input type="text" name="a_zone" class="form-control text-capitalize" placeholder="ex: Zone 1" required>
										</div>
										<div class="col-md-3">
											<label>Barangay:</label>
											<input type="text" name="a_brgy" class="form-control text-capitalize" placeholder="ex: St. Domingo" required>
										</div>
										<div class="col-md-3">
											<label>City:</label>
											<input type="text" name="a_city" class="form-control text-capitalize" placeholder="ex: Legazpi" >
										</div>
									</div>
									<br>
									<hr>
									<h5>-Account Information-</h5>
									<hr>
									<div class="row mb-4">
										<div class="col-md-12">
											<label>Email Address:</label>
											<input type="email" name="email" class="form-control" placeholder="Email Address" value="" required>
										</div>
										<div class="col-md-6">
											<label>Password:</label>
											<input type="password" name="pword" class="form-control" placeholder="Password" required>
										</div>
										<div class="col-md-6">
											<label>Re-type Password:</label>
											<input type="password" name="rpword" class="form-control" placeholder="Re-type Password" required>
										</div>
									</div>
									<br>
									<hr>
									<h5>-Shop Information-</h5>
									<hr>
									<div class="row mb-4">
										<div class="col-md-6">
											<label>Shop Name:</label>
											<input type="text" name="shop_name" class="form-control text-capitalize" placeholder="Shop Name" value="" required>
											<label>Shop Email:</label>
											<input type="email" name="shop_email" class="form-control" placeholder="Shop Email" required>
											<label>Shop Contact No.:</label>
											<input type="text" name="shop_contact" class="form-control" placeholder="Password" required>
										</div>
										<div class="col-md-6">
											<label>Description:</label>
											<textarea rows="7" name="shop_desc" class="form-control text-capitalize"></textarea>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-md-3">
											<label>Street:</label>
											<input type="text" name="shop_a_st" class="form-control text-capitalize" placeholder="ex: Magallanes St." value="" required>
										</div>
										<div class="col-md-3">
											<label>Zone:</label>
											<input type="text" name="shop_a_zone" class="form-control text-capitalize" placeholder="ex: Zone 1" required>
										</div>
										<div class="col-md-3">
											<label>Barangay:</label>
											<input type="text" name="shop_a_brgy" class="form-control text-capitalize" placeholder="ex: St. Domingo" required>
										</div>
										<div class="col-md-3 mb-4">
											<label>City:</label>
											<input type="text" name="shop_a_city" class="form-control text-capitalize" placeholder="ex: Legazpi" >
										</div>
									</div>

									<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block btn-lg">
								</div>
							</div>
						</form>
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