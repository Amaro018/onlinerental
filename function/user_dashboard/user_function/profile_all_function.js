
$(document).ready(function(){
	profile();
	function profile(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/profile/profile.php',
			data: {accNo : accNo},
			success: function(res){
				$('#profile_data').html(res);
			}
		})
	}
	$(document).on({
		mouseenter: function(){
			$(this).css('opacity', '0.7');
		},
		mouseleave: function(){
			$(this).css('opacity', '1');
		}
	}, 'img')
	$(document).on('click', '#choose_file', function(){
		$('#file').click();
	})
	$(document).on('click', '#upload_file', function(){
		let property = document.getElementById('file').files[0];
		// dont use this becozof error
		// let prop = $('#file')[0].files; 
		let form_data = new FormData();
		form_data.append("file", property);
		form_data.append("accNo", accNo);
		$.ajax({
			url: 'function/user_dashboard/profile/upload_profile_img.php',
			method: 'POST',
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			success: function(res){
				console.log(res);
				$('#main_img').attr('src', 'up/'+res);
			}
		})
	})
	$(document).on('click', 'span', function(){
		let txt = $(this).text();
		console.log(txt);
		if(txt == 'Edit'){
			$(this).parent().siblings().removeAttr('disabled').focus();
			$(this).text('Save');
		} else {
			$(this).parent().siblings().attr('disabled', 'disabled');
			$(this).text('Edit');
		}
	})
})

// <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 15px; border: none">
// 				<div class="card-header" style="background-color:rgba(253, 126, 20, 0.7);border-bottom: 5px solid rgba(0, 0, 0, 0.125); border-top-right-radius: 15px; border-top-left-radius: 15px;">
// 					<h6 class="text-white"><i class="fa fa-info-circle"></i> Basic Info</h6>
// 				</div>
// 				<div class="card-body">
// 					<label><small class="text-info">Item Name:</small></label>
// 					<div class="form-group input-group border px-2" style="border-radius: 20px;">
// 						<input type="text" class="form-control" value="red and blue" style="box-shadow: none; outline: 0px; appearance: none; border:none; background-color: rgba(0,0,0,0.0);">
// 						<div class="input-group-append">
// 							<span class="input-group-text" style="border:none;background-color: rgb(0,0,0,0.0);"><i class="fa fa-pen text-orange"></i></span>
// 						</div>
// 					</div>
// 					<label><small class="text-info">Item Category:</small></label>
// 					<div class="form-group input-group border px-2" style="border-radius: 20px;">
// 						<input type="text" class="form-control" value="Gowns and Barong" style="box-shadow: none; outline: 0px; appearance: none; border:none; background-color: rgba(0,0,0,0.0);">
// 						<div class="input-group-append">
// 							<span class="input-group-text" style="border:none;background-color: rgb(0,0,0,0.0);"><i class="fa fa-pen text-orange"></i></span>
// 						</div>
// 					</div>
// 					<label><small class="text-info">Item Desc:</small></label>
// 					<div class="form-group input-group border px-2" style="border-radius: 20px;">
// 						<input type="text" class="form-control" value="red and blue item" style="box-shadow: none; outline: 0px; appearance: none; border:none; background-color: rgba(0,0,0,0.0);">
// 						<div class="input-group-append">
// 							<span class="input-group-text" style="border:none;background-color: rgb(0,0,0,0.0);"><i class="fa fa-pen text-orange"></i></span>
// 						</div>
// 					</div>
// 				</div>
// 			</div>