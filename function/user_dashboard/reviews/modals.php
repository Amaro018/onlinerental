<?php 

include '../../connection.php';
$output = '';
$star = '<i class="fa fa-star fa-2x"></i>';

$output .= '
	<div class="modal fade" role="dialog" id="modalReview">
		<div class="modal-dialog">
			<div class="modal-content">
			<form role="form" method="post" id="rate_form">
				<div class="modal-header">
					<h4 class="modal-title">Add a review</h4>
	       			<button type="button" class="close text-danger" data-dismiss="modal">&times;</button>	
				</div>
				<div class="modal-body" id="modal_data">
					<div class="row">
						<div class="col-md-6">';
						for($a = 0; $a < 5; $a++){
							$output .= '
								<a id="'.$a.'" class="star">'.$star.'</a>
							';
						}	
$output .= '
						</div>
						<div class="col-md-6">
							<label id="lbl_rate"></label>
							<input type="hidden" id="rate" name="rate"> 	
						</div>
					</div>
					<hr>
					<div class="border" style="border-radius: 1rem; overflow: hidden;">
						<textarea class="form-control" id="review" name="review" rows="5" style="resize:none; border: none; outline: 0; appearance: none; box-shadow: none;" placeholder="Write review..." maxlength="500"></textarea>
						<input type="file" name="review_file" id="review_file" multiple hidden>
						<hr>
						<div align="center">
							<button type="button" class="btn btn-outline-success mx-auto d-block" id="review_btn">Add Image</button>
							<small class="text-secondary">optional <i class="text-danger">(max 3 image)</i></small>
						</div>
						<div class="row m-2" id="review_img"></div>
					</div>
				</div>
				<div class="modal-footer">
	       			<button type="submit" class="btn btn-outline-success active" style="border-radius: 20px">Review</button>	
	       			<button type="button" class="btn btn-danger" data-dismiss="modal" style="border-radius: 20px">Cancel</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<input type="hidden" name="tr_no" id="tr_no" value="" form="rate_form">
	<input type="reset" name="reset" id="reset" form="rate_form" hidden>
';

echo $output;

?>

