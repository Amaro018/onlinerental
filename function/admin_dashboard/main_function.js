$(document).ready(function(){
	admin_header();
	function admin_header(){
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/main/admin_header.php',
			dataType: 'json',
			success: function(res){
				$('#nav-top').html(res.top);
				$('#nav-mid').html(res.mid);
				dropdown_notification();
			}
		});
	}
	admin_side_nav();
	function admin_side_nav(){
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/main/admin_side_nav.php',
			success: function(res){
				$('#admin_side_nav').html(res);
			}
		});
	}
	function dropdown_notification(){
		$.ajax({
			method: 'post',
			dataType: 'json',
			url: 'function/admin_dashboard/main/dropdown_notification.php',
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

function openNav() {
	if(document.getElementById("admin_side_nav").style.display === "block"){
		document.getElementById("admin_side_nav").style.display = "none";
		document.getElementById("myOverlay").style.display = "none";
	}
	else{
		document.getElementById("admin_side_nav").style.display = "block";
		document.getElementById("myOverlay").style.display = "block";
	}
}

function closeNav() {
	document.getElementById("admin_side_nav").style.display = "none";
	document.getElementById("myOverlay").style.display = "none";
}

function openNav() {
	if(document.getElementById("admin_side_nav").style.display === "block"){
		document.getElementById("admin_side_nav").style.display = "none";
		document.getElementById("NewOverlay").style.display = "none";
	}
	else{
		document.getElementById("admin_side_nav").style.display = "block";
		document.getElementById("NewOverlay").style.display = "block";
	}
}

function closeNav() {
	document.getElementById("admin_side_nav").style.display = "none";
	document.getElementById("NewOverlay").style.display = "none";
}