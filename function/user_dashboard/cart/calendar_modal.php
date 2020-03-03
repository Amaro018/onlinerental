<?php 

include '../../connection.php';
$output = '';

$count = json_decode($_POST['count'], true);

if($count != 0){
	for($a = 0; $a < $count; $a++){
		$output .= '
			<div class="modal fade calendar" role="dialog" id="modalCalendar'.$a.'" style="overflow:scroll;">
				<div class="modal-dialog modal-lg" style="border-radius: 1.5rem;overflow: hidden;">
					<div class="modal-content" style="border: none; border-radius: 1.5rem;">
						<div class="modal-header" style="border:none; background-color: rgba(220, 53, 69, .8)">
							<h4 class="modal-title text-white">Calendar</h4>
			       			<button type="button" class="close text-white" data-dismiss="modal" style="box-shadow: none; outline: 0; appearance: none">&times;</button>	
						</div>
						<div class="modal-body">
							<div id="calendar'.$a.'"></div>
						</div>
						<div class="modal-footer" style="border: none;">
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="border-radius: 20px; opacity: .8">Ok</button>
						</div>
					</div>
				</div>
			</div>
		';
	}
}

echo $output;

?>