<?php 

$output = '
	<form role="form" id="reg-form">
	<input type="hidden" id="reg_form" name="reg_form" value="shop_form">
	<div class="card w-50 mx-auto d-block">
		<div class="card-header">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="pill" id="nav_pinfo" href="#pinfo">
						Personal info
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" data-toggle="pill" id="nav_cinfo" href="#cinfo">
						Contact info
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link disabled" data-toggle="pill" id="nav_ainfo" href="#ainfo">
						Account info
					</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link disabled" data-toggle="pill" id="nav_spinfo" href="#ainfo">
						Shop info
					</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content">
				<div class="tab-pane container active" id="pinfo">
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">First Name</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="fname" name="fname" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Middle Name</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="mname" name="mname" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Last Name</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="lname" name="lname" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div style="position: relative; padding-top: 2rem">
								<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
									<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Suffix(<small>optional</small>)</div>
									<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
									<input type="text" id="suffix" maxlength="10" name="suffix" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div style="position: relative; padding-top: 2rem">
								<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
									<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Gender</div>
									<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 2rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
									<select class="custom-select" id="gender" name="gender" style="outline: 0; box-shadow: none; border: none; appearance: none;">
										<option selected disabled></option>
										<option>Male</option>
										<option>Female</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" id="bdate" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray;">Birthdate</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="birthdate" name="birthdate" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<button type="button" id="next_personal_info" class="back-next btn btn-outline-primary mt-5 mx-auto d-block col-md-5" style="border-radius: 2rem;">Next <i class="fa fa-arrow-right"></i></button>
				</div>
				<div class="tab-pane container fade" id="cinfo">
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Contact No.</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="number" id="contact" name="contact" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Street</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="st" name="st" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Zone</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="zone" name="zone" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Barangay</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="brgy" name="brgy" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">City</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="city" name="city" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="button" id="back_personal_info" class="back-next btn btn-outline-secondary mt-5 mx-auto d-block col-md-10" style="border-radius: 2rem;"><i class="fa fa-arrow-left"></i> Back</button>
						</div>
						<div class="col-md-6">
							<button type="button" id="next_contact_info" class="back-next btn btn-outline-primary mt-5 mx-auto d-block col-md-10" style="border-radius: 2rem;">Next <i class="fa fa-arrow-right"></i></button>
						</div>
					</div>
				</div>
				<div class="tab-pane container fade" id="ainfo">
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Email Address</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="email" id="email" name="email" autocomplete="off" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Password</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="password" id="password" maxlength="15" name="password" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Re-type Password</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="password" id="rpassword" maxlength="15" name="rpassword" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="button" id="back_contact_info" class="back-next btn btn-outline-secondary mt-5 mx-auto d-block col-md-10" style="border-radius: 2rem;"><i class="fa fa-arrow-left"></i> Back</button>
						</div>
						<div class="col-md-6">
							<button type="button" id="next_account_info" class="back-next btn btn-outline-primary mt-5 mx-auto d-block col-md-10" style="border-radius: 2rem;">Next<i class="fa fa-arrow-right"></i></button>
						</div>
					</div>
				</div>
				<div class="tab-pane container fade" id="spinfo">
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Name</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="shopname" name="shopname" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Email</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="text" id="shopemail" name="shopemail" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Contact</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<input type="number" id="shopcontact" name="shopcontact" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
						</div>
					</div>
					<div style="position: relative; padding-top: 2rem">
						<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
							<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Description</div>
							<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
							<textarea id="shopdescription" name="shopdescription" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none; resize: none;"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div style="position: relative; padding-top: 2rem">
								<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
									<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Street</div>
									<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
									<input type="text" id="shopst" name="shopst" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div style="position: relative; padding-top: 2rem">
								<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
									<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Zone</div>
									<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
									<input type="text" id="shopzone" name="shopzone" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div style="position: relative; padding-top: 2rem">
								<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
									<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop Barangay</div>
									<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
									<input type="text" id="shopbrgy" name="shopbrgy" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div style="position: relative; padding-top: 2rem">
								<div class="form-input" style="padding: .5rem;border: 2px solid #ddd; border-radius: 2rem; overflow: hidden; align-items: center; display: flex; cursor: text;">
									<div style="position: absolute; padding: 0.375rem 0.75rem; color: gray">Shop City</div>
									<div class="error text-danger" hidden style="position: absolute; padding: 0.375rem 0.75rem; color: gray; right: 1rem; cursor: pointer"><i class="fa fa-exclamation-circle"></i></div>
									<input type="text" id="shopcity" name="shopcity" class="form-control" style="outline: 0; box-shadow: none; border: none; appearance: none;">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<button type="button" id="back_account_info" class="back-next btn btn-outline-secondary mt-5 mx-auto d-block col-md-10" style="border-radius: 2rem;"><i class="fa fa-arrow-left"></i> Back</button>
						</div>
						<div class="col-md-6">
							<button type="button" id="signup_info" class="back-next btn btn-outline-primary mt-5 mx-auto d-block col-md-10" style="border-radius: 2rem;">Sign up <i class="fa fa-arrow-right"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>	
';


echo $output;

?>


