<?php 

$output = '
	<div class="row">
		<div class="col-md-7"></div>
		<div class="col-md-5">
			<h3 class="text-center">Welcome to Online Rental Shop!</h3>
			<form method="POST" role="form" action="function/login_account_function.php">
				<label for="uname">Email-Address :</label>
				<div class="input-group mb-2">
					<input type="text" class="form-control" name="email" placeholder="Enter Email-Address" required="" autofocus="">
					<div class="input-group-append">
						<span class="input-group-text" data-toggle="tooltip" title="" data-original-title="example@gmail.com"><i class="fa fa-question"></i></span>
					</div>
				</div>
				<label for="pword">Password :</label>
				<div class="input-group mb-2">
					<input id="viewPwdLogin" type="password" class="form-control" name="pword" placeholder="Enter Password" required="">
					<div class="input-group-append">
						<button id="HVicon" data-toggle="tooltip" type="button" class="input-group-text" title="" data-original-title="Hide/View"><small><i class="fa fa-eye-slash"></i></small></button>
					</div>
				</div>
				<input type="submit" name="login" value="Login" class="btn btn-block mt-4 mb-2 text-white" style="background-color: rgba(253, 126, 20, 0.8)">
				<input type="checkbox" checked="checked" name="remember"> Remember me
				<div class="psw" align="right">
					<a href="registration.php">Signup</a>
				</div>
				<div class="psw" align="right">
					Forgot <a href="#">password?</a>
				</div>
				<input type="hidden" value="1" id="item_no" name="item_no">
			</form>
		</div>
	</div>
';

echo $output;

?>

