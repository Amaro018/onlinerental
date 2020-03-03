$(document).ready(function(){
	let notif = ['order', 'date', 'return'];

	notif_body();
	function notif_body(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/notifications/notifications_body.php',
			success: function(res){
				$('#shop_notifications').html(res);
				body_notification();
			}
		});
	}
	function body_notification(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/notifications/notifications_body/body_notification.php',
			success: function(res){
				$('#body_notification').html(res);
				load_data_notif();
			}
		});	
	}
	function load_data_notif(){
		let w = $('#body_notification ul li a').innerWidth();
		$('.underline-order').animate({width: w});
		$('.badge-order').css('background-color', 'rgba(220, 53, 69, 0.8)');
		$('#order').css('color', 'rgba(220, 53, 69, 0.8)');
	}
	$(document).on('click', '#body_notification a', function(){
		let id = $(this).prop('id');
		let w = $(this).innerWidth();
		$(this).css('color', 'rgba(220, 53, 69, 0.8)');
		$('.underline-'+id).animate({width: w});
		$('.badge-'+id).css('background-color', 'rgba(220, 53, 69, 0.8)');

		for(let a = 0; a < notif.length; a++){
			if(id != notif[a]){
				$('#'+notif[a]).css('color', 'gray');
				$('.badge-'+notif[a]).css('background-color', 'gray');
				$('.underline-'+notif[a]).animate({width: 0});
			}
		}
	});
	// for main folder
	$(document).on('click', '#shop_icon_notif', function(){
		document.getElementById('iNotif').className += ' notif_hide';
	});
});

