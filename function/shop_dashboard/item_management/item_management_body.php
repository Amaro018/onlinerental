<?php 

include '../../connection.php';
session_start();

$output = '';

$output .= '
	<div class="container mt-4 p-2 bg-light text-secondary">
		<nav class="navbar navbar-expand-sm justify-content-between">
			<a class="navbar-brand">
				Item Management
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
			<div class="card-header text-white" style="background-color: rgba(220, 53, 69, 0.8)">Item List</div>
			<div class="card-body">
				<div id="body_header" class="mb-3">
					<ul class="nav mb-2">
						<li class="nav-item">
							<a class="nav-link" href="#" id="item-list">
								<i class="fa fa-inbox"></i> Item List
							</a>
							<div class="underline-item-list"></div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" id="add-item">
								<i class="fa fa-calendar"></i> Add Item
							</a>
							<div class="underline-add-item"></div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" id="damage-item">
								<i class="fa fa-tag"></i> Damage Item
							</a>
							<div class="underline-damage-item"></div>
						</li>
					</ul>
				</div>
				<div id="body_item_list" class="table-responsive" style="display: block;"></div>
				<div id="body_add_item" style="display: none;"></div>
			</div>
		</div>		
	</div>
	';
echo $output;

?>

<style>
	#body_header ul li div{
		border-bottom: 3px solid rgba(220, 53, 69, 0.8);
		width: 0%;
	}
	#body_header a{
		padding-bottom: .3rem;
		color: gray;
	}
</style>