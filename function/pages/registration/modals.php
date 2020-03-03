<?php 

$output = '
	<div class="modal fade" role="dialog" id="modalRegistration">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-success">Success</h4>
	       			<button type="button" class="close text-danger" data-dismiss="modal">&times;</button>	
				</div>
				<div class="modal-body">
					<div class="lead text-center">
						Account has been Successfully Registered.
					</div>
				</div>
				<div class="modal-footer">
	       			<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px">Close</button>
				</div>
			</div>
		</div>
	</div>
';

echo $output;

?>