$(document).ready(function(){
	main_display();
	function main_display(){
		$.ajax({
			method: 'post',
			url: 'function/pages/home/main_display.php',
			success: function(res){
				$('#main_display').html(res);
			}
		})	
	}
	item_display();
	function item_display(){
		$.ajax({
			method: 'post',
			url: 'function/pages/home/item_display.php',
			success: function(res){
				$('#item_display').html(res);
			}
		})
	}
	// $(document).on('click', '#chat_header', function(){
	// 	let chat = document.getElementById('chat_body');
	// 	if(chat.hidden == true) {
	// 		$('#chat_body').removeAttr('hidden');
	// 	} else {
	// 		$('#chat_body').attr('hidden', 'hidden');
	// 	}
	// })
	// $(document).on('click', '#floating_chatbox', function(){
	// 	$(this).attr('hidden', 'hidden');
	// 	$('#chatbox').removeAttr('hidden');
	// })
	// $(document).on('click', '#chat_minimize', function(){
	// 	$('#chatbox').attr('hidden', 'hidden');
	// 	$('#floating_chatbox').removeAttr('hidden');	
	// })


	// var prevScrollpos = window.pageYOffset;
	// console.log(prevScrollpos);
	// window.onscroll = function() {
	// var currentScrollPos = window.pageYOffset;
	// console.log(currentScrollPos);
	// if (prevScrollpos > currentScrollPos) {
	// 	document.getElementById("hey").style.top = "0";
	// } else {
	// 	document.getElementById("hey").style.top = "-50px";
	// }
	// 	prevScrollpos = currentScrollPos;
	// }	
})