<?php

include '../../connection.php';
$item_no = $_POST['item_no'];

$output = '
	<div class="modal fade" role="dialog" id="modalRent">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
			<form role="form" method="post" id="rent_form">
				<div class="modal-header">
					<h4 class="modal-title">Rent Details</h4>
	       			<button id="closeRent" type="button" class="close text-danger" data-dismiss="modal">&times;</button>	
				</div>
				<div class="modal-body" id="modal_data">
				</div>
				<div class="modal-footer">
	       			<button type="submit" class="btn btn-outline-success active" style="border-radius: 20px">Rent</button>	
	       			<button id="closeRent1" type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px">Cancel</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="modalDate">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border-top-left-radius: 1.5rem;border-top-right-radius: 1.5rem; border:none;">
					<h4 class="modal-title">Item Details</h4>
	       			<button type="button" class="close text-danger" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>								
				</div>
				<div class="modal-body">
					<form id="rent_details" method="post" role="form">
						<div class="row form-inline">
							<div class="col-md-10">
								<div class="form-group">
									<label>Item Availability:</label>
									<i class="fa fa-calendar-alt text-danger m-2" id="modal_calendar" style="font-size: 24px; cursor: pointer;" data-toggle="tooltip" title="Calendar"></i>
								</div>	
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<i id="modal_cart" class="fa fa-shopping-cart text-info mx-1" style="font-size: 24px; cursor: pointer;" data-toggle="tooltip" title="Cart"></i><sup class="badge bg-danger text-light rounded rounded-circle" style="top: -10px; right: 13px"></sup>
									<i class="fa fa-question text-info mx-1" style="font-size: 24px; cursor: pointer;" data-toggle="tooltip" title="Info"></i>	
								</div>
							</div>
						</div>
						<hr>
						<div class="form-inline">
							<div class="form-group">
								<label for="startDate">From: </label>
								<input type="date" id="sDate" name="sDate" class="form-control bg-white mx-sm-2" readonly>
								<label for="endDate">Due Date:</label>
								<input type="date" id="rDate" name="rDate" class="form-control bg-white mx-sm-2" readonly>
								<input type="date" id="cDate" name="cDate" class="form-control bg-white mx-sm-2" hidden>
							</div>
						</div>
						<hr>
						<div class="row no-gutters" id="loadMainImg">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="exit" class="btn btn-danger col-md-2" style="border-radius: 20px;" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="modalCalendar">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<div id="calendar"></div>
				</div>
				<div class="modal-footer">
	       			<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>								
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="modalLogin">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" align="center" style="border-top-left-radius: 1.5rem;border-top-right-radius: 1.5rem; border:none;">
					<button id="closeLogin" type="button" class="close text-danger" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>
				</div>
				<div class="modal-body">
					<form role="form" method="post" action="function/login_account_function.php">
						<div align="center" class="mb-5">
							<h1 style="font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;">Login</h1>
							<small class="text-primary">Doesnt have an account? | <a href="#"><b>Sign up</b></a></small>
						</div>
						<div class="row">
							<div class="col-md-5 offset-md-1" style="border-right: 1px solid #ddd">
								<div class="form-group">
									<label for="email">Email: </label>
									<div class="input-group">
										<input type="email" name="email" id="email" class="form-control" style="border-right: none;">
										<div class="input-group-append">
											<span class="input-group-text bg-white"><i class="fa fa-question text-orange" style="width: 25px;"></i></span>	
										</div>
									</div>
									<label for="pword">Password: </label>
									<div class="input-group">
										<input type="password" name="pword" id="pword" class="form-control" style="border-right: none;">
										<div class="input-group-append">
											<span class="input-group-text bg-white" onclick="view()"><i id="view" class="fa fa-eye-slash text-orange" style="width: 25px"></i></span>	
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-block" style="background-color: rgba(253, 126, 20, 0.8); color: white;">Login</button>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="remember_me" name="remember_me">
										<label class="custom-control-label" for="remember_me">Remember me</label>
									</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group mt-5">
									<button type="button" class="btn text-white btn-block" style="background-color: #3B5998; box-shadow: 0 0 0 0.2rem rgba(59, 89, 152, 0.25); "><i class="fab fa-facebook"></i> Login with facebook</button>
									<button type="button" class="btn btn-block text-white" style="background-color: #EA4335; box-shadow: 0 0 0 0.2rem rgba(234, 67, 53, 0.25);"><i class="fab fa-google"></i> Login with gmail</button>
									<button type="button" class="btn btn-block text-white" style="background-color: #55ACEE; box-shadow: 0 0 0 0.2rem rgba(85, 172, 238, 0.25);"><i class="fab fa-twitter"></i> Login with twitter</button>
								</div>
							</div>
						</div>
						<input type="hidden" name="item_no" value="'.$item_no.'">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" role="dialog" id="modalItem" style="overflow: scroll;">
		<div class="modal-dialog modal-lg" style="max-width: 90%;border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none;background-color: rgba(253, 126, 20, .8)">
					<h4 class="modal-title text-white">Item Details</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="items_data">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="rent_item" class="btn btn-outline-success">Rent Now</button>
				</div>
			</div>
		</div> 
	</div>

';

echo $output;

?>  