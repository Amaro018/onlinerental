<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<div class="container mt-4 p-2 bg-light text-secondary">
		<nav class="navbar navbar-expand-sm justify-content-between">
			<a class="navbar-brand">
				Messages
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
	<div class="container my-4">
		<div class="card" style="border-radius: 1rem; overflow: hidden;">
			<div class="card-header text-white" style="background-color: rgba(220, 53, 69, 0.8)">
				<nav class="navbar navbar-expand-sm justify-content-between p-0">
					<a class="navbar-brand">
						Chat List
					</a>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="#" class="nav-link" id="resize"><i class="fa fa-window-minimize text-white"></i></a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"><i class="fa fa-window-maximize text-white"></i></a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="card-body">
				<div id="body_chat_messages"></div>
			</div>
		</div>		
	</div>
	';
echo $output;

?>


