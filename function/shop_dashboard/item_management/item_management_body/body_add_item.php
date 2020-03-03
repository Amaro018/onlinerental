<?php 

include '../../../connection.php';

$shop_no = $_POST['shop_no'];
$output = '';

$output .= '
	<form role="dialog" id="add_item_form">
		<input type="hidden" id="shop_no" name="shop_no" value="'.$shop_no.'">
		<div class="card my-2" id="basic_info">
			<div class="card-header">
				<h6>Basic Info <strong class="text-danger">*</strong></h6>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<div id="cat" style="border-bottom: 1px solid #ced4da">
								<label for="item_category"><small class="text-secondary">Item Category </small><b class="text-danger">*</b></label>
								<select class="form-control p-0" name="item_category" id="item_category">
									<option value="null" disabled selected></option>';
									$cat = $con->query("SELECT * FROM tbl_category");
									$num = mysqli_num_rows($cat);
									if($num != 0) {
										while($row = mysqli_fetch_array($cat)){
											$output .= '
												<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>
											';	
										}
									}
					$output .= '</select>
								<div id="category_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div id="iName" style="border-bottom: 1px solid #ced4da">
								<label for="item_name"><small class="text-secondary">Item Name</small> <b class="text-danger">*</b></label>
								<input type="text" name="item_name" id="item_name" class="form-control p-0 ml-1">
								<div id="iName_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>	
							</div>
							<span id="error_name" class="text-danger"></span>
						</div>
					</div>
					<span id="error_category" class="text-danger"></span>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<label for="minmax"><small class="text-secondary">Minimum & Maximum</small> <b class="text-danger">*</b></label>
							<div class="row">
								<div class="col-md-6">
									<div id="minDiv" style="border-bottom: 1px solid #ced4da">
										<div class="input-group">
											<div class="input-group-prepend">
												<div id="minID" class="input-group-text text-secondary bg-white pl-0" style="border: none;">Min</div>
											</div>
											<input type="number" name="min" id="min" min="1" max="5" class="form-control">
										</div>
										<div id="min_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div id="maxDiv" style="border-bottom: 1px solid #ced4da">
										<div class="input-group">
											<div class="input-group-prepend">
												<div id="maxID" class="input-group-text text-secondary bg-white pl-0" style="border: none;">Max</div>
											</div>
											<input type="number" name="max" id="max" min="1" max="10" class="form-control">
										</div>
										<div id="max_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>
									</div>
								</div>
							</div>
							<span id="error_min" class="text-danger"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="card my-2">
					<div class="card-header">
						<h6>Item Description <strong class="text-danger">*</strong></h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<textarea id="item_desc" name="item_desc" class="form-control" rows="5" style="resize:none; overflow: auto"></textarea>
							<span id="error_desc" class="text-danger"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card my-2">
					<div class="card-header">
						<h6>Delivery Options <strong class="text-danger">*</strong></h6>
					</div>
					<div class="card-body">
						<input type="hidden" name="type_of_ship" id="type_of_ship">
						<div class="form-group mr-3">
							<div class="custom-control custom-radio">
							    <input type="radio" class="custom-control-input" id="pickup" name="radio">
							    <label class="custom-control-label" for="pickup">Pickup</label>
							</div>
						</div>
						<div class="form-group mr-3">
							<div class="custom-control custom-radio">
							    <input type="radio" class="custom-control-input" id="ship" name="radio">
							    <label class="custom-control-label" for="ship">Ship</label>
							</div>
						</div>
						<div class="form-group mr-3">
							<div class="custom-control custom-radio">
							    <input type="radio" class="custom-control-input" id="pickupship" name="radio">
							    <label class="custom-control-label" for="pickupship">Pickup and Ship</label>
							</div>
						</div>
						<span id="error_type" class="text-danger"></span>
					</div>
				</div>
			</div>
		</div>
		<div id="item_variants" class="mt-2">
		</div>
		<button type="submit" class="btn btn-success mt-5 d-block mx-auto col-md-3">Add/Save item</button>
	</form>
';

echo $output;

?>
<!-- <form role="dialog" id="add_item_form">
	<input type="hidden" id="shop_no" name="shop_no" value="'.$shop_no.'">
	<div class="card my-2" id="basic_info">
		<div class="card-header">
			<h6>Basic Info <strong class="text-danger">*</strong></h6>
		</div>
		<div class="card-body">
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<div id="cat" style="border-bottom: 1px solid #ced4da">
							<label for="item_category"><small class="text-secondary">Item Category </small><b class="text-danger">*</b></label>
							<select class="form-control p-0" name="item_category" id="item_category">
								<option value="null" disabled selected></option>
								<option value="Gowns and Barong">Gowns and Barong</option>
								<option value="Party Shop">Party Shop</option>
								<option value="Electronics">Electronics</option>
								<option value="Home Appliance">Home Appliance</option>
								<option value="Vehicle">Vehicle</option>
								<option value="others">Other Category</option>
							</select>
							<div id="category_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>
						</div>
					</div>
					<div class="col-md-6">
						<div id="others" style="border-bottom: 1px solid #ced4da">
							<label for="misc"><small class="text-secondary">Others</small> <small class="text-danger">(Specify Category)</small></label>
							<input disabled type="text" name="misc" id="misc" placeholder="Disabled" class="form-control bg-white p-0 ml-1">
							<div id="others_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>	
						</div>
					</div>
				</div>
				<span id="error_category" class="text-danger"></span>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<div id="iName" style="border-bottom: 1px solid #ced4da">
							<label for="item_name"><small class="text-secondary">Item Name</small> <b class="text-danger">*</b></label>
							<input type="text" name="item_name" id="item_name" class="form-control p-0 ml-1">
							<div id="iName_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>	
						</div>
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="col-md-6">
						<label for="minmax"><small class="text-secondary">Minimum & Maximum</small> <b class="text-danger">*</b></label>
						<div class="row">
							<div class="col-md-6">
								<div id="minDiv" style="border-bottom: 1px solid #ced4da">
									<div class="input-group">
										<div class="input-group-prepend">
											<div id="minID" class="input-group-text text-secondary bg-white pl-0" style="border: none;">Min</div>
										</div>
										<input type="number" name="min" id="min" min="1" max="5" class="form-control">
									</div>
									<div id="min_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>
								</div>
							</div>
							<div class="col-md-6">
								<div id="maxDiv" style="border-bottom: 1px solid #ced4da">
									<div class="input-group">
										<div class="input-group-prepend">
											<div id="maxID" class="input-group-text text-secondary bg-white pl-0" style="border: none;">Max</div>
										</div>
										<input type="number" name="max" id="max" min="1" max="10" class="form-control">
									</div>
									<div id="max_line" style="border-bottom: 3px solid #276aa7; width: 0px; animation: mymove 5s infinite"></div>
								</div>
							</div>
						</div>
						<span id="error_min" class="text-danger"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="card my-2">
				<div class="card-header">
					<h6>Item Description <strong class="text-danger">*</strong></h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<textarea id="item_desc" name="item_desc" class="form-control" rows="5" style="resize:none; overflow: auto"></textarea>
						<span id="error_desc" class="text-danger"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card my-2">
				<div class="card-header">
					<h6>Delivery Options <strong class="text-danger">*</strong></h6>
				</div>
				<div class="card-body">
					<input type="hidden" name="type_of_ship" id="type_of_ship">
					<div class="form-group mr-3">
						<div class="custom-control custom-radio">
						    <input type="radio" class="custom-control-input" id="pickup" name="radio">
						    <label class="custom-control-label" for="pickup">Pickup</label>
						</div>
					</div>
					<div class="form-group mr-3">
						<div class="custom-control custom-radio">
						    <input type="radio" class="custom-control-input" id="ship" name="radio">
						    <label class="custom-control-label" for="ship">Ship</label>
						</div>
					</div>
					<div class="form-group mr-3">
						<div class="custom-control custom-radio">
						    <input type="radio" class="custom-control-input" id="pickupship" name="radio">
						    <label class="custom-control-label" for="pickupship">Pickup and Ship</label>
						</div>
					</div>
					<span id="error_type" class="text-danger"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="card" id="item_variants">
		<div class="card-header">
			<h6>Item Variants <strong class="text-danger">*</strong></h6>
		</div>
		<div class="card-body">
			<table class="table table-bordered" id="tbl_add_item">
				<thead>
					<tr>
						<th width="5%">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="allVar" name="allVar">
								<label class="custom-control-label" for="allVar"></label>
							</div>
						</th>
						<th width="15%"><small>Qty</small></th>
						<th width="20%"><small>Price</small></th>
						<th width="20%"><small>Size</small></th>
						<th width="20%"><small>Color</small></th>
						<th width="20%"><small>Action</small></th>
					</tr>
				</thead>
				<tbody id="variant_data">
					<tr>
						<td></td>
						<td>
							<input type="number" class="form-control dont" value="1" min="1" id="qty" />
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text dont">&#8369;</span>
								</div>
								<input type="number" class="form-control dont" value="100" min="20" id="price" />	
							</div>
						</td>
						<td>
							<select class="custom-select dont" id="size">
								<option selected value="Xsmall">Xsmall</option>
								<option value="Small">Small</option>
								<option value="Medium">Medium</option>
								<option value="Large">Large</option>
								<option value="Xlarge">Xlarge</option>
							</select>
						</td>
						<td>
							<select class="custom-select dont" id="color">
								<option selected value="Red">Red</option>
								<option value="Orange">Orange</option>
								<option value="Yellow">Yellow</option>
								<option value="Green">Green</option>
								<option value="Blue">Blue</option>
								<option value="Indigo">Indigo</option>
								<option value="Violet">Violet</option>
							</select>
						</td>
						<td>
							<button type="button" class="btn btn-success btn-block" id="add_variant">Add</button>
							<input type="hidden" id="num_holder" value="0" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<button type="submit" class="btn btn-success mt-5 d-block mx-auto col-md-3">Add/Save item</button>
	</div> -->

<style>
	#body_add_item #basic_info select, #body_add_item #basic_info input{
		appearance: none;
		box-shadow: none;
		outline: 0;
		border: none;
	}
	#body_add_item .card-header{
		border-bottom: none; 
		color: #17a2b8; 
		background-color: white;
	}
	#body_add_item .card{
		box-shadow: 0 0 10px #ddd;
	}
	#body_add_item #item_variants th, #body_add_item #item_variants td{
		color: gray;
		vertical-align: middle;
	}
	#variant_data input:not(.dont), #variant_data select:not(.dont), #variant_data span:not(.dont){
		border: none;
		box-shadow: none;
		outline: 0;
		appearance: none;
		background-color: white;
	}
	#save, #edit, #img, #view{
		box-shadow: none;
		outline: 0;
		appearance: none;
	}
</style>

