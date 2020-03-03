<?php 

include '../../../connection.php';
$category = $_POST['category'];
$output = '';
$type = 'variants';

$cat = $con->query("SELECT * FROM tbl_category WHERE category_name = '$category' ");
$cat_row = mysqli_fetch_array($cat);

$color = $cat_row['category_color'] ;
$size = $cat_row['category_size'] ;

if($color != 0 && $size != 0){
	$output .= '
		<input type="hidden" value="'.$cat_row['category_no'].'" id="category_no" name="category_no">
		<div class="card">
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
	';

}
else if($color != 0){
	$output .= '
		<input type="hidden" value="'.$cat_row['category_no'].'" id="category_no" name="category_no">
		<div class="card">
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
							<th width="25%"><small>Qty</small></th>
							<th width="25%"><small>Price</small></th>
							<th width="25%"><small>Color</small></th>
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
	';
}
else if($size != 0){
	$output .= '
		<input type="hidden" value="'.$cat_row['category_no'].'" id="category_no" name="category_no">
		<div class="card">
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
							<th width="2s5%"><small>Qty</small></th>
							<th width="25%"><small>Price</small></th>
							<th width="25%"><small>Size</small></th>
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
								<button type="button" class="btn btn-success btn-block" id="add_variant">Add</button>
								<input type="hidden" id="num_holder" value="0" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	';
}
else{
	$type = 'no variants';
	$output .= '
		<input type="hidden" value="'.$cat_row['category_no'].'" id="category_no" name="category_no">
		<div class="card">
			<div class="card-header">
				<h6>Item Variants <strong class="text-danger">*</strong></h6>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="tbl_add_item">
					<thead>
						<tr>
							<th width="45%"><small>Qty</small></th>
							<th width="45%"><small>Price</small></th>
							<th width="10%"><small>Action</small></th>
						</tr>
					</thead>
					<tbody id="variant_data">
						<tr>
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
								<div class="btn-group btn-block">
									<button type="button" class="btn text-secondary img" value="0"><i class="fa fa-file-image"></i></button>
									<button type="button" class="btn text-success" id="view" value="0"><i class="fa fa-eye"></i></button>
								</div>
								<input type="file" id="0file" hidden multiple />
								<input type="hidden" id="num_holder" value="0" />
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	';
}


$data = array(
	'output'	=>	$output,
	'type'		=>	$type,
);
echo json_encode($data);

?>