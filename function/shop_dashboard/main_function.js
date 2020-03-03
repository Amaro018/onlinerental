let accNo = 0;
let msg_num = 0;


$(document).ready(function(){
	shop_header();
	function shop_header(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/main/shop_header.php',
			dataType: 'json',
			success: function(res){
				$('#nav-top').html(res.top);
				$('#nav-mid').html(res.mid);
				dropdown_notification();
				chatbox();
			}
		});
	}
	shop_side_nav();
	function shop_side_nav(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/main/shop_side_nav.php',
			data: {shop_no: shop_no},
			success: function(res){
				$('#shop_side_nav').html(res);
			}
		});
	}
	function chatbox(){
		if(shop_no != 0){
			$.ajax({
				method: 'post',
				url: 'function/shop_dashboard/main/chatbox.php',
				success: function(res){
					$('#chatbox_data').html(res);
					load_chatlist();
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
	function load_chatlist(){
		if(shop_no != 0){
			$.ajax({
				method: 'post',
				url: 'function/shop_dashboard/main/load_chatlist.php',
				data: {shop_no : shop_no},
				dataType: 'json',
				success: function(res){
					$('#side_chat_list').append(res.output);
				}
			})	
		} else {
			console.log('not login');
		}
	}
	$(document).on('submit', '#chat_form', function(e){
		e.preventDefault();
		let input = $(this).find('input[type="text"]');
		let val = $(this).find('input[type="text"]').val();

		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/main/save_chat_messages.php',
			data: {message : val, accNo : accNo, shop_no : shop_no},
			success: function(res){
				$('#chat_input_log').append(res);
				$("#chat_input_log").stop().animate({ scrollTop: $("#chat_input_log")[0].scrollHeight}, 100);
				input.val('');
			}
		})
	})
	$(document).on('click', '#side_chat_list li', function(){
		if(accNo != this.id){
			$(this).css('backgroundColor', 'rgba(9, 15, 126, 0.8)').find('label').css('color','white');
			$('#side_chat_list li#'+accNo).css('backgroundColor', 'rgba(255, 255, 255, 0.8)').find('label').css('color','grey');
			accNo = this.id;
		}
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/main/load_convo.php',
			data: {accNo : accNo, shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				msg_num = res.msg_num;
				$("#user_name").html(res.email);
				$('#chat_input_log').html(res.output);
				$('#chat_form').find('input').removeAttr('disabled').focus();
				$("#chat_input_log").stop().animate({ scrollTop: $("#chat_input_log")[0].scrollHeight}, 100);
			}
		})
	})
	function load_convo(){
		if(accNo != 0){
			$.ajax({
				method: 'post',
				url: 'function/shop_dashboard/main/load_convo.php',
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
	}
	if(shop_no != 0){
		setInterval(function(){
			load_convo();
		},10000)
	}
	// user switch
	$(document).on('click', '#switch_userType', function(){
		var con = confirm('Press ok to switch to user.');
		console.log(con);
		if(con == true){
			window.location.assign('user_cart.php?user=user');
		} else if(con == false){
			$(this).removeAttr('checked');
		}	
	});
	function dropdown_notification(){
		$.ajax({
			method: 'post',
			dataType: 'json',
			url: 'function/shop_dashboard/main/dropdown_notification.php',
			success: function(res){
				$('#dropdown_notif').html(res.output);
				$('#iNotif').attr('data-count', res.count);
				show();
			}
		});
	}
	function show(){
		document.getElementById('iNotif').className += ' notif_show';
	}
	// setInterval(function(){
	// 	document.getElementById('iNotif').className += ' notif_show';
	// },3000);
});