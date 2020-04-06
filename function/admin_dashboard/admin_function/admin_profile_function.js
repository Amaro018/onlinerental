	show_admin_profile();
	function show_admin_profile() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/profile/profile.php',
			success: function (res) {
				$('#admin_profile').html(res);
			}
		});
	}
	profile_modal();
	function profile_modal(){
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/profile/modals.php',
			success: function (res) {
				console.log(res);
				$('#modal').html(res);
			}
		});
	}
		$(document).on('click', '#changePass', function () {
		$('#changePassModal').modal();

	})

		$(document).on('click', '#edit', function (){
		$('#email').removeAttr('disable');
		})