$(document).ready(function(){
	registration_form();
	function registration_form(){
		$.ajax({
			method: 'post',
			url: 'function/pages/registration/registration_form.php',
			success: function(res){
				$('#registration_form').html(res);
				modals();
			}
		})
	}
	function modals(){
		$.ajax({
			method: 'post',
			url: 'function/pages/registration/modals.php',
			success: function(res){
				console.log(res);
				$('#modals').html(res);
			}
		})
	}
	$(document).on({
		mouseenter: function(){
			if(this.id == 'renter'){
				$(this).css({
					'backgroundColor' : 'white',
					'boxShadow' : '0 0 0 0.2rem rgba(9, 15, 126, 0.25)',
					'outline' : 0,
					'borderColor' : '#090f7e'
				}).find('p, h3').css('color','rgba(9, 15, 126, 0.8)');	
			} else {
				$(this).css({
					'backgroundColor' : 'white',
					'boxShadow' : '0 0 0 0.2rem rgba(19, 30, 253, 0.25)',
					'outline' : 0,
					'borderColor' : '#131efd'
				}).find('p, h3').css('color','rgba(19, 30, 253, 0.8)');	
			}
		},
		mouseleave: function(){
			if(this.id == 'renter'){
				$(this).css({
					'backgroundColor' : 'rgba(9, 15, 126, 0.8)',
					'boxShadow' : 'none',
					'outline' : 1,
					'borderColor' : 'none'
				}).find('p, h3').css('color','white');	
			} else {
				$(this).css({
					'backgroundColor' : 'rgba(19, 30, 253, 0.8)',
					'boxShadow' : 'none',
					'outline' : 1,
					'borderColor' : 'none'
				}).find('p, h3').css('color','white');	
			}
		},
		click: function(){
			if(this.id == 'renter'){
				$.ajax({
					method: 'post',
					url: 'function/pages/registration/registration_form/renter_form.php',
					success: function(res){
						$('#registration_form').html(res);
					}
				})
			} else {
				$.ajax({
					method: 'post',
					url: 'function/pages/registration/registration_form/shop_form.php',
					success: function(res){
						$('#registration_form').html(res);
					}
				})
			}
		}
	}, '.user-type')
	$(document).on({
		focus: function(){
			$(this).css({
				'boxShadow' : '0 0 0 0.2rem rgba(253, 126, 20, 0.25)',
				'outline' : 1,
				'borderColor' : 'rgba(253, 126, 20, 0.8)',
			}).find('div').not('.error').animate({top: '0'}, 'fast').css({'color': 'rgba(253, 126, 20, 0.8)', 'font-size':'12px'});
			$(this).find('.error').attr('hidden', 'hidden');
			let id = $(this).attr('id');
			if(id == 'bdate'){
				$(this).find('input').removeAttr('type').attr('type', 'date');				
			}
		},
		blur: function(){
			let input = $(this).find('input, select, textarea').val();
			let idname = $(this).find('input, select, textarea').attr('id');
			console.log(input);
			console.log(idname);
			if(input == '' || input == null){
				let height = ($(this).innerHeight()/2+16);
				console.log(height);
				$(this).css({
					'boxShadow' : 'none',
					'outline' : 0,
					'borderColor' : '#ddd',
				}).find('div').not('.error').animate({top: height}, 'fast').css({'color': 'gray', 'font-size': '16px'});
			} else {
				$(this).css({
					'boxShadow' : 'none',
					'outline' : 0,
					'borderColor' : '#ddd',
				})
				// if(idname == 'contact'){
				// 	if(! /^[0-9]{11}$/.test(input)){
				// 		$(this).css('borderColor', 'red').find('.error').removeAttr('hidden');
				// 	} 
				// }
			}
			let id = $(this).attr('id');
			if(id == 'bdate' && input == ''){
				$(this).find('input').removeAttr('type').attr('type', 'text');				
			}
		}
	}, '.form-input')
	$(document).on('click', '.form-input', function(){
		$(this).find('input').focus();
		$(this).find('select').focus();
	})
	$(document).on('click', '.back-next', function(){
		function checkdata(data, error){
			let id = data.id;
			let val = data.value;
			$('.error-'+id).text(error);
			$('#'+id).parent().css('borderColor', 'red').find('.error').removeAttr('hidden');
		}
		let btn_id = this.id;
		if(btn_id == 'next_personal_info'){
			// if(checkdata($('#fname')[0]) != '' 
			// 	&& checkdata($('#mname')[0]) != ''
			// 	&& checkdata($('#lname')[0]) != ''
			// 	&& checkdata($('#suffix')[0]) != ''
			// 	&& checkdata($('#gender')[0]) != ''
			// 	&& checkdata($('#birthdate')[0]) != ''){
			// 	$('#nav_pinfo').removeClass('active').addClass('disabled');
			// 	$('#nav_cinfo').addClass('active').removeClass('disabled');
			// 	$('#pinfo').removeClass('active').addClass('fade');
			// 	$('#cinfo').addClass('active').removeClass('fade');
			// } else {
			// 	console.log($('#bdate').val());
			// }


			let fname = $('#fname').val();
			let mname = $('#mname').val();
			let lname = $('#lname').val();
			let suffix = $('#suffix').val();
			let gender = $('#gender').val();
			let birthdate = $('#birthdate').val();
			$.ajax({
				method: 'post',
				url: 'function/pages/registration/registration_process/personal_info.php',
				data: {
					fname : fname,
					mname : mname,
					lname : lname,
					suffix : suffix,
					gender : gender,
					birthdate : birthdate
				},
				dataType: 'json',
				success: function(res){
					console.log(res);
					let a = 0;
					for(i in res.error){
						if(res.error[i] != 'ok'){
							checkdata($('#'+res.info[i])[0],res.error[i]);
							a++;
						} else {
							$('.error-'+res.info[i]).text('');
						}
					}
					// for(i in res){
					// 	if(res[i] != 'ok'){
					// 		checkdata($('#'+res[i])[0]);
					// 		a++;
					// 	}
					// }

					if(a == 0){
						$('#nav_pinfo').removeClass('active').addClass('disabled');
						$('#nav_cinfo').addClass('active').removeClass('disabled');
						$('#pinfo').removeClass('active').addClass('fade');
						$('#cinfo').addClass('active').removeClass('fade');
					}
				}
			})

			// if($('#fname').val() != '' 
			// 	&& $('#mname').val() != '' 
			// 	&& $('#lname').val() != '' 
			// 	&& $('#suffix').val() != '' 
			// 	&& $('#gender').val() != '' 
			// 	&& $('#birthdate').val() != ''){

			// 	$('#nav_pinfo').removeClass('active').addClass('disabled');
			// 	$('#nav_cinfo').addClass('active').removeClass('disabled');
			// 	$('#pinfo').removeClass('active').addClass('fade');
			// 	$('#cinfo').addClass('active').removeClass('fade');

			// } else {
			// 	alert('fill-up data correctly');
			// 	console.log($('#bdate').val());
			// }
		} 
		else if(btn_id == 'back_personal_info'){
			$('#nav_cinfo').removeClass('active').addClass('disabled');
			$('#nav_pinfo').addClass('active').removeClass('disabled');
			$('#cinfo').removeClass('active').addClass('fade');
			$('#pinfo').addClass('active').removeClass('fade');
		} 
		else if(btn_id == 'next_contact_info'){
			// if(checkdata($('#contact')[0]) != '' 
			// 	&& checkdata($('#st')[0]) != '' 
			// 	&& checkdata($('#zone')[0]) != '' 
			// 	&& checkdata($('#brgy')[0]) != '' 
			// 	&& checkdata($('#city')[0]) != ''){ 

			// 	$('#nav_cinfo').removeClass('active').addClass('disabled');
			// 	$('#nav_ainfo').addClass('active').removeClass('disabled');
			// 	$('#cinfo').removeClass('active').addClass('fade');
			// 	$('#ainfo').addClass('active').removeClass('fade');
			// } else {
			// 	// alert('fill-up data correctly');
			// }
			let contact = $('#contact').val();
			let st = $('#st').val();
			let zone = $('#zone').val();
			let brgy = $('#brgy').val();
			let city = $('#city').val();
			$.ajax({
				method: 'post',
				url: 'function/pages/registration/registration_process/contact_info.php',
				data: {
					contact : contact,
					st : st,
					zone : zone,
					brgy : brgy,
					city : city
				},
				dataType: 'json',
				success: function(res){
					console.log(res);
					let a = 0;
					for(i in res){
						if(res[i] != 'ok'){
							checkdata($('#'+res[i])[0]);
							a++;
						}
					}
					if(a == 0){
						$('#nav_cinfo').removeClass('active').addClass('disabled');
						$('#nav_ainfo').addClass('active').removeClass('disabled');
						$('#cinfo').removeClass('active').addClass('fade');
						$('#ainfo').addClass('active').removeClass('fade');
					}
				}
			})
		}
		else if(btn_id == 'back_contact_info'){
			$('#nav_ainfo').removeClass('active').addClass('disabled');
			$('#nav_cinfo').addClass('active').removeClass('disabled');
			$('#ainfo').removeClass('active').addClass('fade');
			$('#cinfo').addClass('active').removeClass('fade');
		}
		else if(btn_id == 'next_account_info'){
			let email = $('#email').val();
			let password = $('#password').val();
			let rpassword = $('#rpassword').val();
			$.ajax({
				method: 'post',
				url: 'function/pages/registration/registration_process/account_info.php',
				data: {
					email : email,
					password : password,
					rpassword : rpassword,
				},
				dataType: 'json',
				success: function(res){
					console.log(res);
					let a = 0;
					for(i in res){
						if(res[i] != 'ok'){
							checkdata($('#'+res[i])[0]);
							a++;
						}
					}
					if(a == 0){
						$('#nav_ainfo').removeClass('active').addClass('disabled');
						$('#nav_spinfo').addClass('active').removeClass('disabled');
						$('#ainfo').removeClass('active').addClass('fade');
						$('#spinfo').addClass('active').removeClass('fade');
					}
				}
			})
		}
		else if(btn_id == 'back_account_info'){
			$('#nav_spinfo').removeClass('active').addClass('disabled');
			$('#nav_ainfo').addClass('active').removeClass('disabled');
			$('#spinfo').removeClass('active').addClass('fade');
			$('#ainfo').addClass('active').removeClass('fade');
		}
		else if(btn_id == 'signup_info'){
			if($('#reg_form').val() == 'renter_form'){
				let email = $('#email').val();
				let password = $('#password').val();
				let rpassword = $('#rpassword').val();
				$.ajax({
					method: 'post',
					url: 'function/pages/registration/registration_process/account_info.php',
					data: {
						email : email,
						password : password,
						rpassword : rpassword,
					},
					dataType: 'json',
					success: function(res){
						console.log(res);
						let a = 0;
						for(i in res){
							if(res[i] != 'ok'){
								checkdata($('#'+res[i])[0]);
								a++;
							}
						}
						if(a == 0){
							signup();
						}
					}
				})
			} else {
				let shopname = $('#shopname').val();
				let shopemail = $('#shopemail').val();
				let shopcontact = $('#shopcontact').val();
				let shopdescription = $('#shopdescription').val();
				let shopst = $('#shopst').val();
				let shopzone = $('#shopzone').val();
				let shopbrgy = $('#shopbrgy').val();
				let shopcity = $('#shopcity').val();

				$.ajax({
					method: 'post',
					url: 'function/pages/registration/registration_process/shop_info.php',
					data: {
						shopname : shopname,
						shopemail : shopemail,
						shopcontact : shopcontact,
						shopdescription : shopdescription,
						shopst : shopst,
						shopzone : shopzone,
						shopbrgy : shopbrgy,
						shopcity : shopcity,
					},
					dataType: 'json',
					success: function(res){
						console.log(res);
						let a = 0;
						for(i in res){
							if(res[i] != 'ok'){
								checkdata($('#'+res[i])[0]);
								a++;
							}
						}
						if(a == 0){
							signup();
						}
					}
				})
			}
			
			// if($('#email').val() != ''
			// 	&& $('#password').val() != ''
			// 	&& $('#rpassword').val() != ''){
			// 	let forms = $('#reg-form').serialize();
			// 	$.ajax({
			// 		method: 'post',
			// 		url: 'function/pages/registration/registration_process/renter_reg_process.php',
			// 		data: forms,
			// 		dataType: 'json',
			// 		success: function(res){
			// 			console.log(res);
			// 			if(res.email != 'email is good'){
			// 				$('#email').siblings('.error').removeAttr('hidden', 'hidden');
			// 				$('#email').parent().css('borderColor', 'red');
			// 			}
			// 			if(res.pass != 'password match'){
			// 				if(res.pass == 'password must be 8 characters or above'){
			// 					$('#password').siblings('.error').removeAttr('hidden', 'hidden');
			// 					$('#password').parent().css('borderColor', 'red');	
			// 				}
			// 				$('#rpassword').siblings('.error').removeAttr('hidden', 'hidden');
			// 				$('#rpassword').parent().css('borderColor', 'red');
			// 			}
			// 		}
			// 	})
			// } else {
			// 	alert('fill-up data correctly');
			// }
		}
	})
	function signup(){
		let forms = $('#reg-form').serialize();
		console.log(forms);
		$.ajax({
			method: 'post',
			url: 'function/pages/registration/registration_process/registration_process.php',
			data: forms,
			success: function(res){
				console.log(res);
				$('#modalRegistration').modal();
			}
		})
	}
	$(document).on('mouseenter', '.error', function(){
		
	})
})