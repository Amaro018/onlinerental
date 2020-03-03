<?php 

include '../../connection.php';
$output = '';
$accNo = $_POST['accNo']; 

$profile = $con->query("SELECT * FROM tbl_indreg WHERE accNo = '$accNo' ");
$profile_row = mysqli_fetch_array($profile);

$address = $con->query("SELECT * FROM tbl_address WHERE accNo = '$accNo' AND address_type = 'default' ");
$address_row = $address->fetch_array();

$acc = $con->query("SELECT * FROM tbl_account WHERE accNo = '$accNo' ");
$acc_row = mysqli_fetch_array($acc);

$output .= '
	<div class="card my-5">
		<div class="card-header">
			<h4>Profile</h4>
		</div>
		<div class="card-body">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<div class="card">
								<div style="width:auto; height:250px; padding: 0;overflow: hidden;">
									<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span><img src="images/avatar1.png" style="vertical-align: middle;" class="w-100" id="main_img">
								</div>
							</div>
						</div>
						<div class="col-md-9">
							<input type="file" id="file" hidden name="file">
							<button type="button" class="btn btn-outline-primary col-md-2" style="opacity: 0.8" id="choose_file">Choose File</button>
							<button type="button" class="btn btn-outline-success col-md-2" style="opacity: 0.8" id="upload_file">Upload</button>
						</div>
					</div>
				</div>
			</div>
			<div class="card my-5">
				<div class="card-header">
					<h6>Basic Info</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="fname">First Name:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$profile_row['fname'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="mname">Middle Name:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$profile_row['mname'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="lname">Last Name:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$profile_row['lname'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="suffix">Suffix Name:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$profile_row['suffix'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="lbl" for="gender">Gender:</label>
								<div class="input-group">
									<select class="custom-select bg-white" value="'.$profile_row['gender'].'" disabled>
										<option>Male</option>
										<option>Female</option>
									</select>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="lbl" for="bday">Birthday:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$profile_row['bday'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h6>Contact Info</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="lbl" for="contact">Contact no.:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$profile_row['contact'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="lbl" for="email">Email Address:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$acc_row['email'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="street">Street:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$address_row['st'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="zone">Zone:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$address_row['zone'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="brgy">Barangay:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$address_row['brgy'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="lbl" for="city">City:</label>
								<div class="input-group">
									<input type="text" class="form-control bg-white" value="'.$address_row['city'].'" disabled>
									<div class="input-group-append">
										<span class="input-group-text">Edit</span>
									</div>
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
'; 

echo $output;

?>