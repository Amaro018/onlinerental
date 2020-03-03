<?php 

include '../../connection.php';
$shop_no = $_POST['shop_no'];
$output = '';

$shop = "SELECT * FROM tbl_shop WHERE shop_no = '$shop_no' ";
$shop_query = mysqli_query($con, $shop);
$shop_row = mysqli_fetch_array($shop_query);

if($shop_row['shop_img'] != ''){
	$profile_img = $shop_row['shop_img'];
} else {
	$profile_img = 'avatar1.png';
}

$output .= '
	<div class="row my-5">
		<div class="col-md-3">
			<div class="card" id="shop_profile_img" style="border-radius: 50%;">
				<div id="img_wrapper" style="width:auto; height:250px; padding: 0;overflow: hidden;align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%;>
					<span class="bg-success" style="display: inline-block;height: 100%; vertical-align: middle"></span>
					<img src="up/'.$profile_img.'" style="vertical-align: middle;" class="w-100" id="hayop">
				</div>
				<div class="card-img-overlay" align="center" hidden>
					<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
					<a href="#" id="btn_file" class="btn btn-primary" style="vertical-align: middle">Change Profile</a>
					<input type="file" id="file" hidden>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h4>Shop Info: </h4>
			<div class="form-group">
				<label for="name">Shop Name:</label>
				<div class="input-group">
					<input id="name" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_name'].'">
					<div class="input-group-append">
						<span class="input-group-text">Edit</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="desc">Shop Desc:</label>
				<div class="input-group">
					<textarea class="form-control bg-white" disabled rows="9" style="resize: none;" value="">'.$shop_row['shop_desc'].'</textarea>
					<div class="input-group-append">
						<span class="input-group-text">Edit</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<h4>Location Info:</h4>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="zone">Zone:</label>
						<div class="input-group">
							<input id="zone" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_a_zone'].'">
							<div class="input-group-append">
								<span class="input-group-text">Edit</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="st">Street:</label>
						<div class="input-group">
							<input id="st" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_a_st'].'">
							<div class="input-group-append">
								<span class="input-group-text">Edit</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="brgy">Barangay:</label>
						<div class="input-group">
							<input id="brgy" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_a_brgy'].'">
							<div class="input-group-append">
								<span class="input-group-text">Edit</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="city">City:</label>
						<div class="input-group">
							<input id="city" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_a_city'].'">
							<div class="input-group-append">
								<span class="input-group-text">Edit</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<h4>Contact Info: </h4>
			<div class="form-group">
				<label for="contact">Contact #:</label>
				<div class="input-group">
					<input id="contact" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_contact'].'">
					<div class="input-group-append">
						<span class="input-group-text">Edit</span>
					</div>
				</div>
				<label for="email">Email-address:</label>
				<div class="input-group">
					<input id="email" type="text" disabled class="bg-white form-control" value="'.$shop_row['shop_email'].'">
					<div class="input-group-append">
						<span class="input-group-text">Edit</span>
					</div>
				</div>
			</div>
			<div class="form-group">
			</div>
		</div>
	</div>	
';

echo $output;

?>

