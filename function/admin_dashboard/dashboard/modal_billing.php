<?php
$output = "";

$output .= '
<div class="modal fade" role="dialog" id="modalBilling" style="overflow:scroll;">
		<div class="modal-dialog modal-lg" style="border-radius: 1.5rem; overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white"></h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="billing_data"></div>
				</div>
			</div>
		</div>
	</div>
';

echo $output;