<?php 

include '../../connection.php';
$tab = $_POST['tab'];
if($tab == 0){
	$output = '
		<ul class="nav nav-tabs mt-5" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#to_be_review">To be review</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#history">History</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane container active" id="to_be_review"></div>
			<div class="tab-pane container fade" id="history"></div>
		</div>
	';
} else {
	$output = '
		<ul class="nav nav-tabs mt-5" role="tablist">
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#to_be_review">To be review</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#history">History</a>
			</li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane container fade" id="to_be_review"></div>
			<div class="tab-pane container active" id="history"></div>
		</div>
	';
}


echo $output;
?>

