<?php 

include '../../connection.php';

$output = '';

$output .= '
	<div class="modal fade" role="dialog" id="view_modal">
		<div class="modal-dialog modal-lg" style="border-radius: 1.5rem;overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">

				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">SAMPLE</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>

				<div class="modal-body">
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


