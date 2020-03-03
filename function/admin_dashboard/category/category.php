<?php 

echo $output = '
	<div class="container my-4">
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Category Management</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
							<div class="card-body">
								<div class="form-group">
									<label for="category" class="text-secondary">Add Category:</label>
									<input type="text" class="form-control" id="category" placeholder="input category...">
								</div>
								<label class="text-secondary">Add Variants:</label>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="size" name="size">
												<label class="custom-control-label text-secondary" for="size">Size</label>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="color" name="color">
											<label class="custom-control-label text-secondary" for="color">Color</label>
										</div>
									</div>
								</div>
								<button type="button" class="btn btn-outline-success col-md-4" id="add_category">Add</button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
							<div class="card-body">
								<label class="text-secondary lead">Category List</label>
								<ul class="nav flex-column">
								</ul>
								<table class="table table-bordered text-center text-secondary">
									<thead>
										<tr>
											<th>Category Name</th>
											<th>Category Size</th>
											<th>Category Color</th>
										</tr>
									</thead>
									<tbody id="load_category">
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
';

?>

