<?php 

include '../../connection.php';

$output = '
	<div id="chatbox" hidden class="col-md-6" style="position: fixed; bottom: 0; right: 0; z-index: 1020;">
		<div class="row no-gutters">
			<div class="col-md-5">
				<div class="card" style="height: 25rem; max-height: 25rem;">
					<div class="card-header">
						<div class="lead">Chat List</div>
					</div>
					<div class="card-body p-0">
						<div style="overflow-y: auto; overflow-x: hidden;">
							<ul class="nav flex-column" id="side_chat_list"></ul>	
						</div>
					</div>	
				</div>
			</div>
			<div class="col-md-7">
				<div class="card" style="height: 25rem; max-height: 25rem;">
					<div class="card-header">
						<div class="clearfix">
							<div class="float-left pt-2 mr-2" hidden>
								<i class="fa fa-arrow-left" id="back_btn" style="cursor: pointer"></i>
							</div>
							<div class="float-left lead"> Chat Name</div>
							<div class="float-right lead">
								<i class="fa fa-window-minimize" id="chat_minimize" style="cursor: pointer"></i>
							</div>
						</div>
					</div>
					<div class="card-body p-0" style="overflow-y: auto; overflow-x: hidden;" id="chat_input_log">
					</div>
					<div class="card-footer">
						<form class="m-0" id="chat_form">
							<div class="p-1" style="border-radius: 2rem; overflow: hidden; border: 1px solid #ddd;">
								<div class="input-group">
									<input disabled type="text" id="chat_input" class="form-control bg-white" autocomplete="off" style=" box-shadow: none; outline: 0; appearance: none; border: none;">
									<div class="input-group-append">
										<span class="input-group-text bg-white border border-0">Send</span>
									</div>
								</div>
							</div>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<div style="background-color: rgba(9, 15, 126, 0.8); position: fixed; bottom: 0; right: 0; z-index: 1020;" class="card" id="floating_chatbox">
		<span class="fa-stack fa-lg has-badge">
			<i class="fa fa-comments fa-stack-1x text-white"></i>
		</span>
	</div>
';

echo $output;

?>

<!-- <div id="chatbox" hidden class="row no-gutters" style="position: fixed; bottom: 0; right: 0; width: auto; height: 23.5rem; max-height: 23.5rem; z-index: 1020;">
		<div class="col-md-5">
			<div class="card" style="border: none; border-top-left-radius: 1rem; border-top-right-radius: 0; overflow: hidden;">
				<div class="card-header" style="height: 4rem; max-height: 4rem; background-color: rgba(9, 15, 126, 0.8)">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white" style="border: none;"><i class="fa fa-search"></i></span>
						</div>
						<input type="text" class="form-control" style="border: none; outline: 0; box-shadow: none; appearance: none;">
					</div>
				</div>
				<div class="card-body p-0 bg-light" style="border-right: 1px solid #ccc">
					<div style="height: 19.5rem; overflow-y: auto; overflow-x: hidden;">
						<ul class="nav flex-column" id="side_chat_list"></ul>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="card" style="border: none; border-top-left-radius: 0; border-top-right-radius: 1rem; overflow: hidden;">
				<div class="card-header" style="height: 4rem; max-height: 4rem; background-color: rgba(9, 15, 126, 0.8)">
					<ul class="nav justify-content-between">
						<li class="nav-item">
							<a class="nav-link text-white" id="user_name">Chat</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" id="chat_minimize" style="cursor: pointer"><i class="fa fa-window-minimize"></i></a>
						</li>
					</ul>
				</div>
				<div class="card-body p-0">
					<div style="height: 15rem; max-height: 15rem; overflow-y: auto; overflow-x: hidden;" id="chat_input_log">
					</div>
				</div>
				<div class="card-footer">
					<form id="chat_form">
						<div style="overflow: hidden; border-radius: 2rem; border: 1px solid #ccc; background-color: white; margin: 0; padding: 0.25rem">
							<div class="input-group">
								<input disabled type="text" id="chat_input" autocomplete="off" class="form-control bg-white" 
								style="border: none; outline: 0; box-shadow: none; appearance: none;>
								<div class="input-group-append">
									<span class="input-group-text" style="background-color: white; border: none;">Send</span>
								</div>
							</div>	
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div style="background-color: rgba(9, 15, 126, 0.8); position: fixed; bottom: 0; right: 0; z-index: 1020;" class="card" id="floating_chatbox">
		<span class="fa-stack fa-lg has-badge">
			<i class="fa fa-comments fa-stack-1x text-white"></i>
		</span>
	</div> -->