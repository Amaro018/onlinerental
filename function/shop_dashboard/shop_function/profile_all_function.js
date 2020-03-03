$(document).ready(function(){
	profile();
	function profile(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/profile/profile.php',
			data: {shop_no : shop_no},
			success: function(res){
				$('#shop_profile').html(res);
			}
		})
	}
	$(document).on({
		mouseenter: function(){
			$('#img_wrapper').css('opacity', '0.5');
			$('.card-img-overlay').removeAttr('hidden');
		},
		mouseleave: function(){
			$('#img_wrapper').css('opacity', '1');
			$('.card-img-overlay').attr('hidden', 'hidden');
		}
	}, '#shop_profile_img')
	$(document).on('click', '#btn_file', function(){
		$('#file').click();
	})
	$(document).on('change', '#file', function(){
		let file = this.files[0];
		let form = new FormData();
		form.append('file', file);
		form.append('shop_no', shop_no);
		form.append('accNo', accNo);
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/profile/update_img.php',
			data: form,
			contentType: false,
			cache: false,
			processData: false,
			success: function(res){
				profile();
			}
		})
	})
})