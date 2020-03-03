<?php 

include '../../../connection.php';
session_start();

$output = '
	<div class="row">
		<div class="col-md-3">
			<div class="card">
				<nav class="navbar navbar-expand-sm justify-content-between">
					<a class="navbar-brand" href="#">Logo</a>
					<ul class="navbar-nav ">
						<li class="nav-item">
							<a class="nav-link" href="#">Link 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link 2</a>
						</li>
					</ul>
				</nav>
				<div id="search" class="mx-2">
				<form id="search_chat_list_form">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-search text-primary"></i></span>
						</div>
						<input id="search_text" type="search" class="form-control" placeholder="Search" style="border:none; outline: 0; box-shadow: none; appearance: none;">
					</div>
				</form>
				</div>
				<hr>
				<div id="chat_list">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a href="" class="nav-link">Image</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Text</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Image</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Text</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Image</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Text</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Image</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Text</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Image</a>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link">Text</a>
						</li>
					</ul>	
				</div>
			</div>
		</div>
		<div class="col-md-9" id="chat_box">
			<div class="card">
				<div class="card-header">
					User Id
				</div>
				<div class="card-body">
					<div class="container-fluid">
						<div id="chat_log"></div>
					</div>
				</div>
				<div class="card-footer">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-4">
								<div id="icon">
									<i class="fa fa-camera fa-2x"></i>
									<i class="fa fa-image fa-2x"></i>
									<i class="fa fa-microphone fa-2x"></i>
								</div>
							</div>
							<div class="col-md-8">
								<div id="chat">
								<form id="chat_box_form">
									<div class="input-group">
										<input id="chat_text" type="text" class="form-control" autocomplete="off" placeholder="Type a message..." style="border:none; outline: 0; box-shadow: none; appearance: none;">
										<div class="input-group-append">
											<span id="send" class="input-group-text"><strong class="text-primary">Send</strong></span>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
';

echo $output;

?>

<style>
	#body_chat_messages input{
		outline: 0;
	 	box-shadow: none;
		appearance: none;
	}
	#body_chat_messages input, #body_chat_messages span{
		border:none;
		background-color: white;
		vertical-align: middle; 
	}
	#body_chat_messages #chat, #body_chat_messages #search{
		padding: .5rem;
		overflow: hidden;
		border-radius: 2rem;
		border: 1px solid #ccc;
		background-color: white;
	}
	#body_chat_messages #icon i{
		color: #007bff;
		padding: .5rem;
	}
	#body_chat_messages textarea{
		resize: none;
		box-shadow: none;
	}
	#body_chat_messages #chat_list{
		max-height: 15rem;
		overflow-y: auto;
	}
	#body_chat_messages span{
		cursor: pointer;
	}
	#body_chat_messages #chat_log{
		height: 15rem;
		max-height: 15rem;
		overflow-y: auto;
		overflow-x: hidden;
	}
</style>


<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Navbar w/ text</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarText">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Features</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Pricing</a>
			</li>
		</ul>
		<span class="navbar-text">
		Navbar text with an inline element
		</span>
	</div>
</nav> -->


					<!-- <textarea rows="8" class="form-control" style="border:none;"></textarea> -->
