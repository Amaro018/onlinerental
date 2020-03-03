<?php 

include '../../../connection.php';

$output = '';

$output .= '
	<div class="modal fade" role="dialog" id="view_modal">
		<div class="modal-dialog modal-lg" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Warning!</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<ul class="nav mb-2">
						<li class="nav-item">
							<a class="nav-link" href="#" id="info">
								<i class="fal fa-database"></i> Item Info
							</a>
							<div class="underline-info"></div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" id="variant">
								<i class="fal fa-table"></i> Item Variants
							</a>
							<div class="underline-variant"></div>
						</li>
					</ul>
				</div>
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" role="dialog" id="img_modal">
		<div class="modal-dialog" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Item Data</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="item_data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label><small>Quantity:</small></label>
									<input type="number" class="form-control" id="qtyview" />
								</div>
							</div>
							<div class="col-md-6">
								<label><small>Price:</small></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">&#8369;</span>
									</div>
									<input type="number" class="form-control" id="priceview" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label><small>Size:</small></label>
								<select class="custom-select" id="sizeview">
									<option value="xsmall">Xsmall</option>
									<option value="small">Small</option>
									<option value="medium">Medium</option>
									<option value="large">Large</option>
									<option value="xlarge">Xlarge</option>
								</select>
							</div>
							<div class="col-md-6">
								<label><small>Color:</small></label>
								<select class="custom-select" id="colorview">
									<option value="red">Red</option>
									<option value="orange">Orange</option>
									<option value="yellow">Yellow</option>
									<option value="green">Green</option>
									<option value="blue">Blue</option>
									<option value="indigo">Indigo</option>
									<option value="violet">Violet</option>
								</select>
							</div>
						</div>
						<div class="container-fluid my-4">
							<button type="button" class="btn btn-outline-success">Add image</button>
							<i class="text-danger"><small>Maximum of 3 image per item</small></i>
						</div>
						<div class="container-fluid row" id="img_data">
						</div>
					</div>
				</div>
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Close</button>
				</div>
			</div>
		</div>
	</div>
';

echo $output;

?>

<style>
	/*#body_notification ul li div{
		border-bottom: 3px solid rgba(220, 53, 69, 0.8);
		width: 0%;
	}
	#body_notification a{
		padding-bottom: .3rem;
		color: gray;
	}*/
</style>


