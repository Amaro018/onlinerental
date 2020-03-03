$(document).ready(function(){
	load_body_nav();
	function load_body_nav(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/main/body_nav_function.php',
			dataType: 'json',
			success: function(res){
				$('#nav-top').html(res.top);
				$('#nav-mid').html(res.mid);
				dropdown_notification();
			}
		});
	}
	load_side_nav();
	function load_side_nav(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/main/side_nav_function.php',
			success: function(res){
				$('#side_nav').html(res);
			}
		});
	}
	function dropdown_notification(){
		$.ajax({
			method: 'post',
			dataType: 'json',
			url: 'function/user_dashboard/main/dropdown_notification.php',
			success: function(res){
				$('#dropdown_notif').html(res.output);
				$('#iNotif').attr('data-count', res.count);
				// show();
			}
		});	
	}
	// function show(){
	// 	document.getElementById('iNotif').className += ' notif_show';
	// }
	// setInterval(function(){
	// 	dropdown_notification();
	// },10000);
});