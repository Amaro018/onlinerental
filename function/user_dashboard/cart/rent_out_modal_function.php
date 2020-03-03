<?php 

include '../../connection.php';
$output = '';

$output .= '
	<div class="modal fade" role="dialog" id="modalCart" style="overflow: scroll;">
		<div class="modal-dialog modal-lg" style="max-width: 90%;border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none;background-color: rgba(253, 126, 20, .8)">
					<h4 class="modal-title text-white">Item Details</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="rent_data">
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" style="border-radius: 20px;">Place rent</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" role="dialog" id="modalAlert">
		<div class="modal-dialog modal-sm" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Warning!</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<h6 class="text-secondary text-center">Must check an item to rent.</h6>
				</div>
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Ok</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" role="dialog" id="modalRemove">
		<div class="modal-dialog modal-sm" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Delete!</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<h6 class="text-secondary text-center">Delete this item in your cart.</h6>
				</div>
				<div class="modal-footer" style="border: none;">
					<button id="remove" type="button" class="btn btn-outline-danger" style="border-radius: 20px; opacity: .8">Remove</button>
					<button type="button" class="btn btn-outline-primary" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Cancel</button>
				</div>
			</div>
		</div>
	</div>
';

echo $output;

?>


<!-- <div class="modal fade" role="dialog" id="modalCalendar" style="overflow:scroll;">
		<div class="modal-dialog modal-lg" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Calendar</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="calendar"></div>
				</div>
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Ok</button>
				</div>
			</div>
		</div>
	</div> -->