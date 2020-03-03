$(document).ready(function(){
	login_form();
	function login_form(){
		$.ajax({
			method: 'post',
			url: 'function/pages/login/login_form.php',
			success: function(res){
				$('#login_form').html(res);
			}
		})
	}
	$(document).on('click', '#HVicon', function(){
		let attr = $(this).find('i').attr('class');
		if(attr == 'fa fa-eye-slash'){
			$('#viewPwdLogin').removeAttr('type').attr('type', 'text');
			$(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
		}
		else {
			$('#viewPwdLogin').removeAttr('type').attr('type', 'password');
			$(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
		}
	})
})