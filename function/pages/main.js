let shop_no = 0;
let msg_num = 0;
let shoplist_no = [];

// $(document).ready(function(){
// 	Data();
// 	function Data(){
// 		fetch('function/pages/main/shop_header.php')
// 		.then((res) => res.json())
// 		.then((data) => {
// 			document.getElementById('nav-top').innerHTML = data.top;
// 			document.getElementById('nav-mid').innerHTML = data.mid;
// 		})
// 	}
// 	//sample fetch pass data
// 	// fetch('function/pages/main/shop_header.php', {
// 	// 	method: 'POST',
// 	// 	headers: {
// 	// 		'Accept': 'application/json, text/plain, */*',
// 	// 		'Content-type': 'application/json'
// 	// 	},
// 	// 	body: JSON.stringify({title: title, body: body})
// 	// })
// 	// .then((res) => res.json())
// 	// .then((data) => {
// 	// 	document.getElementById('nav-top').innerHTML = data.top;
// 	// 	document.getElementById('nav-mid').innerHTML = data.mid;
// 	// })
// });

$(document).ready(function(){
	page_header();
	function page_header(){
		$.ajax({
			method: 'post',
			url: 'function/pages/main/page_header.php',
			dataType: 'json',
			success: function(res){
				$('#nav-top').append(res.top);
				$('#nav-mid').append(res.mid);
				$('#nav-bot').append(res.bot);
				chatbox();
			}
		})
	}
	function chatbox(){
		if(accNo != 0){
			$.ajax({
				method: 'post',
				url: 'function/pages/main/chatbox.php',
				success: function(res){
					$('#chatbox_data').html(res);
					load();
				}
			})	
		}
	}
	$(document).on('click', '#floating_chatbox', function(){
		$(this).attr('hidden', 'hidden');
		$('#chatbox').removeAttr('hidden');
	})
	$(document).on('click', '#chat_minimize', function(){
		$('#chatbox').attr('hidden', 'hidden');
		$('#floating_chatbox').removeAttr('hidden');	
	})
	$(document).on({
		focus: function(){
			$(this).parent().parent().css({'boxShadow':'0 0 0 0.2rem rgba(0, 123, 255, 0.25)','borderColor':'#80bdff','outline':'0'});
		},
		blur: function(){
			$(this).parent().parent().css({'boxShadow':'none','borderColor':'#ccc'});
		}
	}, '#chat_input')
	$(document).on('submit', '#chat_form', function(e){
		e.preventDefault();
		let input = $(this).find('input[type="text"]');
		let val = $(this).find('input[type="text"]').val();
		$.ajax({
			method: 'post',
			url: 'function/pages/main/save_chat_messages.php',
			data: {message : val, accNo : accNo, shop_no : shop_no},
			success: function(res){
				$('#chat_input_log').append(res);
				$("#chat_input_log").stop().animate({ scrollTop: $("#chat_input_log")[0].scrollHeight}, 100);
				input.val('');
			}
		})
	})
	function load(){
		if(accNo != 0){
			$.ajax({
				method: 'post',
				url: 'function/pages/main/load.php',
				data: {accNo : accNo},
				dataType: 'json',
				success: function(res){
					console.log(res);
					for(let a = 0; a < res.shoplist_no.length; a++){
						shoplist_no.push(res.shoplist_no[a]);
					}
					$('#side_chat_list').append(res.output);
				}
			})	
		} else {
			console.log('not login');
		}
	}
	$(document).on('click', '#side_chat_list li', function(){
		if(shop_no != this.id){
			$(this).css('backgroundColor', 'rgba(9, 15, 126, 0.8)').find('label, #last_msg, #side_name').css('color','white');
			$('#side_chat_list li#'+shop_no).css('backgroundColor', 'rgba(255, 255, 255, 0.8)').find('label, #last_msg, #side_name').css('color','grey');
			shop_no = this.id;
		}
		$.ajax({
			method: 'post',
			url: 'function/pages/main/load_convo.php',
			data: {accNo : accNo, shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				console.log(res);
				msg_num = res.msg_num;
				$('#chat_input_log').html(res.output);
				$('#chat_form').find('input').removeAttr('disabled').focus();
				$("#chat_input_log").stop().animate({ scrollTop: $("#chat_input_log")[0].scrollHeight}, 100);
			}
		})
	})
	function load_convo(){
		$.ajax({
			method: 'post',
			url: 'function/pages/main/load_convo.php',
			data: {accNo : accNo, shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				$('#chat_input_log').html(res.output);
				if(msg_num != res.msg_num){
					$("#chat_input_log").stop().animate({ scrollTop: $("#chat_input_log")[0].scrollHeight}, 100);
					msg_num = res.msg_num;
				}
			}
		})
	}
	if(accNo != 0){
		setInterval(function(){
			load_convo();
		},10000)
	}
});

