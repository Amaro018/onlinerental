$(document).ready(function(){
	// ecmascript 6
	messages_body();
	function messages_body(){
		fetch('function/shop_dashboard/messages/messages_body.php')
		.then((res) => res.text())
		.then((data) => {
			document.getElementById('shop_messages').innerHTML = data;
			body_chat_messages();
		})
	}
	function body_chat_messages(){
		fetch('function/shop_dashboard/messages/messages_body/body_chat_messages.php')
		.then((res) => res.text())
		.then((data) => {
			document.getElementById('body_chat_messages').innerHTML = data;
		})
	}
	$(document).on({
		focus: function(){
			document.getElementById('chat').style.cssText = 'box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); border:1px solid #ddd;';
		},
		blur: function(){
			document.getElementById('chat').style.cssText = 'box-shadow: none; border:1px solid #ddd;';
		} 
	}, '#body_chat_messages #chat_text');
	$(document).on({
		focus: function(){
			document.getElementById('search').style.cssText = 'box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); border:1px solid #ddd;';
		},
		blur: function(){
			document.getElementById('search').style.cssText = 'box-shadow: none; border:1px solid #ddd;';
		} 
	}, '#body_chat_messages #search_text');
	$(document).on('click', '#resize', function(){
		$('#shop_side_nav').attr('hidden', 'hidden');
		$('#shop_messages').removeClass('col-md-8 col-lg-10').addClass('col-md-8 col-lg-12');
	});
	$(document).on('click', '#send', function(){
		var input = $(this).parent().siblings();
		var val = $(this).parent().siblings().val();
		var chat_log = `
			<div class="col-md-8 offset-md-4 my-4">
				<h6 class="text-right">
					<span class="text-white bg-primary p-2" style="border-radius: 1.5rem;">
						Shop: ${val}
					</span>
				</h6>
			</div>
		`;
		var chat_log2 = `
			<div class="col-md-8 my-4">
				<h6>
					<span class="text-white py-2 px-3" style="border-radius: 1.5rem; background-color: rgba(108, 117, 125, 0.8)">
						User: ${val}
					</span>
				</h6>
			</div>
		`;
		$('#chat_log').append(chat_log);
		$('#chat_log').append(chat_log2);
		$("#chat_log").stop().animate({ scrollTop: $("#chat_log")[0].scrollHeight}, 1000);
		input.val('');
	});
	$(document).on('submit', '#chat_box_form', function(e){
		// <div class="container bg-danger" align="right" style="max-width: 100%;">
		// 		<span style="display: inline-block;">
		// 			${val}
		// 		</span>
		// 	</div>
		e.preventDefault();
		var input = $(this).find('input[type="text"]');
		var val = $(this).find('input[type="text"]').val();
		var chat_log = `
			<div class="container" align="right" style="width: 70%; margin-right: 0;margin-top: .5rem; margin-bottom: .5rem; max-width: 70%; overflow: hidden">
				<div class="text-justify" style="display: inline-block; background-color: rgba(220, 53, 69, 0.8); color: white; padding: .5rem .7rem .5rem .7rem; border-radius: 2rem;">
					<div style="display:inline-block;">
						${val}
					</div>
				</div>
			</div>
		`;
		var chat_log2 = `
			<div class="container" style="width: 70%; margin-left: 0; margin-top: 1rem; margin-bottom: 1rem; max-width: 70%; overflow: hidden;">
				<div class="text-justify" style="display: inline-block; background-color: rgba(108, 117, 125, 0.8); color: white; padding: .5rem .7rem .5rem .7rem; border-radius: 2rem;">
					mas ${val} more! 
				</div>
			</div>
		`;
		$('#chat_log').append(chat_log);
		$('#chat_log').append(chat_log2);
		$("#chat_log").stop().animate({ scrollTop: $("#chat_log")[0].scrollHeight}, 100);
		input.val('');
	});
});


