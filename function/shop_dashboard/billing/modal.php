<?php 

$output = '
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
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger partial" style="border-radius: 20px; opacity: .8">Partial Payment</button>
					<button type="button" class="btn btn-outline-danger full" style="border-radius: 20px; opacity: .8">Full Payment</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" role="dialog" id="modalPayment" style="overflow:scroll;">
		<div class="modal-dialog modal-sm" style="border-radius: 1.5rem; overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Partial</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="payment_data">
						<label class="text-secondary">Input partial payment</label>
						<div class="input-group">
							<input type="number" class="form-control" id="partial_value">
							<div class="input-group-append">
								<span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger" id="partial_btn" style="border-radius: 20px; opacity: .8">Ok</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" role="dialog" id="potang_modal" style="overflow:scroll;">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" style="border-radius: 1.5rem; overflow: hidden;">
			<div class="modal-content" style="border: none; border-radius: 1.5rem;">
				<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
					<h4 class="modal-title text-white">Billing</h4>
	       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
				</div>
				<div class="modal-body">
					<div id="potang_billing_data"></div>
				</div>
				<div class="modal-footer" style="border: none;">
					<button type="button" class="btn btn-outline-danger full" style="border-radius: 20px; opacity: .8">Full Payment</button>
				</div>
			</div>
		</div>
	</div>
';

echo $output;

?>

