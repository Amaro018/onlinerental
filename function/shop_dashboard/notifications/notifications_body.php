<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<div class="container mt-4 p-2 bg-light text-secondary">
		<nav class="navbar navbar-expand-sm justify-content-between">
			<a class="navbar-brand">
				Notifications
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link text-danger"><i class="fa fa-calendar-alt" style="font-size: 24px"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-primary"><i class="fa fa-ellipsis-v" style="font-size: 24px"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container mt-4">
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(220, 53, 69, 0.8)">Activity</div>
			<div class="card-body">
				<div id="body_notification" class="table-responsive"></div>
			</div>
		</div>		
	</div>
	';

echo $output;

?>