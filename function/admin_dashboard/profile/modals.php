<?php 

include '../../connection.php';

$output = '';

$output .= '
	<div class="modal fade" role="dialog" id="changePassModal">
		<div class="modal-dialog modal-lg" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">

				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">SAMPLE</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>

				<div class="modal-body">

				<div class="container col-md-6 mt-4">
				<div class="">
				<label for="email">Old Password:</label>
				<input type="text" class="form-control">	
				</div>

				<div class="mt-1">
				<label for="email">New Password:</label>
				<input type="text" class="form-control">	
				</div>

				<div class="mt-1">
				<label for="email">Confirm Password:</label>
				<input type="text" class="form-control">	
				</div>

				<div class="btn-group btn-block">	
				<button type="button" class="btn btn-success mt-2"><i class="fa fa-save"></i> Confirm</button>
				</div>

				</div>


				</div>

				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Close</button>
				</div>
			</div>
		</div>
	</div>

		<div class="modal fade" role="dialog" id="ibangmodal">
		<div class="modal-dialog modal-lg" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">

				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">SAMPLE</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>

				<div class="modal-body">

				<div class="container col-md-6 mt-4">
				<div class="btn-group btn-block">
				<input 
				<button type="button" class="btn btn-success mr-1"><i class="fa fa-save"></i> Save</button>
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

