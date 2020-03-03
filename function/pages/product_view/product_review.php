<?php 

include '../../connection.php';

$output = '
	<div class="card">
		<div class="card-header">
			Item Rating and Reviews
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6" align="center">
					<span style="display: inline-block;height: 10%;vertical-align:middle"></span>
					<div style="vertical-align; middle">
						<label id="lbl_rating" style="font-size: 36px"></label>
					</div>
					<div class="stars-outer" style="vertical-align:middle">
						<div class="stars-inner">
						</div>
					</div>
				</div>
				<div class="col-md-6">';
				for($a = 5; $a > 0; $a--){
					$output .= '
						'.$a.' star
					';
					for($b = 5; $b > 5-$a; $b--){
						$output .= '
							<i class="fa fa-star text-warning"></i>
						';
					}
					for($c = 5; $c > $a; $c--){
						$output .= '
							<i class="fa fa-star text-secondary"></i>
						';	
					}
					$output .= '
						<label id="'.$a.'lbl_progress"></label>
						<div class="progress">
							<div class="progress-bar bg-warning" id="'.$a.'progress">
							</div>
						</div>
					';
					$output .= '<br>';
				}

			$output .= '
				</div>
			</div>
			<div id="review_data">
			</div>
		</div>
	</div>';

echo $output;

?>