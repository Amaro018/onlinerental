$(document).ready(function(){
	notif();
	function notif(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/notifications/notif.php',
			success: function(res){
				$('#rentals_data').html(res);
			}
		})
	}
})