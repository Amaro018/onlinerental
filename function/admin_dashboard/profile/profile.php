<?php 

include '../../connection.php';
$output = '';

 $q1 = $con->query("SELECT tbl_account.email,tbl_indreg.contact, tbl_indreg.fname, tbl_indreg.mname, tbl_indreg.lname, tbl_indreg.suffix, tbl_indreg.gender, tbl_indreg.bday, tbl_indreg.user_img FROM tbl_indreg INNER JOIN tbl_account ON tbl_indreg.accNo = tbl_account.accNo WHERE userType = 'admin';");

$r1 = mysqli_fetch_array($q1);


$output .= '
	<div class="row my-5 mx-3">
		<div class="col-md-3 mt-4">
			<div class="card" id="admin_img" style="border-radius: 50%;">
				<div id="img_wrapper" style="width:auto; height:250px; padding: 0;overflow: hidden;align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%;>
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span>
					<img src="up/avatar1.png" style="vertical-align: middle;" class="w-100" id="hayop">
				</div>
				<div class="card-img-overlay" align="center" hidden>
					<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
					<a href="#" id="btn_file" class="btn btn-primary" style="vertical-align: middle">Change Profile</a>
					<input type="file" id="file" hidden>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<h4>Personal Info:</h4>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="fname">First Name:</label>
						<div class="input-group">
							<input id="fname" type="text" disabled class="bg-white form-control" value="'.$r1['fname'].'">
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="mname">Middle Name:</label>
						<div class="input-group">
							<input id="mname" type="text" disabled class="bg-white form-control" value="'.$r1['mname'].'">
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="lname">Last Name:</label>
						<div class="input-group">
							<input id="lname" type="text" disabled class="bg-white form-control" value="'.$r1['lname'].'">
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="suffix">Suffix:</label>
						<div class="input-group">
							<input id="suffix" type="text" disabled class="bg-white form-control" value="'.$r1['suffix'].'">
						</div>
					</div>
				</div>
			</div>

			<h4>Contact Info:</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="contact">Contact Number:</label>
						<div class="input-group">
							<input id="contact" type="text" disabled class="bg-white form-control" value="'.$r1['contact'].'">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Email Address:</label>
						<div class="input-group">
							<input id="email" type="text" disabled class="bg-white form-control" value="'.$r1['email'].'">
						</div>
					</div>
				</div>
			</div>

			<div class="container col-md-6 mt-4">
				<div class="btn-group btn-block">
				<button type="button" class="btn btn-info mr-1" id="edit"><i class="fa fa-pen"></i> Edit</button>
				<button type="button" class="btn btn-success mr-1"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
			<div class="container col-md-6 mt-4">
			<button type="button" class="btn btn-success btn-block" id="changePass"><i class="fa fa-key"></i> Change Password</button>
			</div>
		</div>
	</div>
';

echo $output;

?>

