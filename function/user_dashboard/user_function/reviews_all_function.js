let star_status = '';
let star_id = '';
let img_count = [];
let img_files = [];

$(document).ready(function(){
	review_list();
	function review_list(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/reviews/review_list.php',
			data: {tab : tab},
			success: function(res){
				$('#reviews_data').html(res);
				to_review();
				history();
			}
		})
	}
	function to_review(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/reviews/to_review.php',
			data: {accNo : accNo},
			success: function(res){
				$('#to_be_review').html(res);
			}
		});	
	}
	function history(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/reviews/history.php',
			data: {accNo : accNo},
			success: function(res){
				$('#history').html(res);
			}
		})
	}
	modals();
	function modals(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/reviews/modals.php',
			success: function(res){
				$('#modals').html(res);
			}	
		})
	}
	$(document).on('hidden.bs.modal', '#modalReview', function(){
		let star = $('.star');
		for(let a = 0; a < star.length; a++){
			$(star[a]).css('color', 'black');
		}
		for(let a = 0; a < img_count.length; a++){
			$('#'+img_count[a]+'review_img').remove();
		}
		img_count.splice(0, img_count.length);
		img_files.splice(0, img_files.length);
		$('#reset').click();		
		$('#lbl_rate').html('');
		$('#modalReview').modal('hide');
	})
	$(document).on('click', '.btn-review', function(){
		$('#tr_no').val(this.id);
		$('#modalReview').modal();
	})
	$(document).on('submit', '#rate_form', function(event){
		event.preventDefault();
		if($('#rate').val() != '' && $('#review').val() != '' && $('#tr_no').val() != ''){
			let rate_form = $(this).serialize();
			console.log(rate_form);
			$.ajax({
				method: 'post',
				url: 'function/user_dashboard/reviews/add_review_function.php',
				data: rate_form,
				success: function(res){
					let last_id = res;
					let img_form = new FormData();

					for(let a = 0; a < img_files.length; a++){
						img_form.append('file[]', img_files[a]);
					}
					img_form.append('last_id', last_id);

					$.ajax({
						method: 'post',
						url: 'function/user_dashboard/reviews/add_review_img.php',
						data: img_form,
						contentType: false,
						processData: false,
						success: function(res){
							$('#modalReview').modal('hide');
							review_list();
						} 
					})

				}
			})
		}
	})
	$(document).on({
		mouseenter: function(){
			if(star_status == ''){
				let star = $('.star');
				let id = this.id;
				for(let a = id; a >= 0; a--){ 
					$(star[a]).css('color', 'yellow');
				}	
			}
		},
		mouseleave: function(){
			if(star_status == ''){
				let star = $('.star');
				for(let a = 0; a < star.length; a++){
					$(star[a]).css('color', 'black');
				}	
			}
		},
		click: function(){
			let star = $('.star');
			let id = parseInt(this.id);
			if(star_status == '' || star_id != id){
				star_status = 'click';
				star_id = id;
				for(let a = 0; a < star.length; a++){
					$(star[a]).css('color', 'black');
				}
				for(let a = id; a >= 0; a--){ 
					$(star[a]).css('color', 'yellow');
				}
				$('#lbl_rate').html(id+1+' star');
				$('#rate').val(id+1);
			}
			else{
				star_status = '';
				star_id = '';
				for(let a = 0; a < star.length; a++){
					$(star[a]).css('color', 'black');
				}
				$('#lbl_rate').html('');		
			}
		}
	}, '.star')
	$(document).on({
		focus: function(){
			$(this).parent().css({'boxShadow':'0 0 0 0.2rem rgba(0, 123, 255, 0.25)','borderColor':'#80bdff','outline':'0'});
		},
		blur: function(){
			$(this).parent().css({'boxShadow':'none','borderColor':'#ccc'});
		}
	}, '#review')
	$(document).on('click', '#review_btn', function(){
		$('#review_file').click().val('');
		for(let a = 0; a < img_count.length; a++){
			$('#'+img_count[a]+'review_img').remove();
		}
		img_count.splice(0, img_count.length);
		img_files.splice(0, img_files.length);
	})
	$(document).on('click', '.remove_img_btn', function(){
		let img_id = this.id;
		$('#'+img_id+'review_img').remove();
		for(let a = 0; a < img_count.length; a++){
			if(img_count[a] == img_id){
				img_count.splice(a, 1);
				img_files.splice(a, 1);
			}
		}
	})
	$(document).on('change', '#review_file', function(e){
		e.preventDefault();
		let files = e.target.files;

		if(files.length <= 3){
			$.each(files, function(i, file){
				img_count.push(i);
				img_files.push(file);
				let reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function(e){
					let template = `
						<div class="col-md-4" id="${i}review_img">
							<div class="card">
								<div class="card-header p-0">
									<div class="form-inline float-right">
										<button type="button" class="btn btn-light border border-0 remove_img_btn" id="${i}">
											×
										</button>
									</div>
								</div>
								<div class="card-body p-0">
									<div style="width: auto; height: 7rem; align-items: center; display: flex; overflow: hidden;">
										<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
										<img src="${e.target.result}" class="w-100" style="vertical-align:middle;">
									</div>
								</div>
							</div>
						</div>
					`;
					$('#review_img').append(template);
				}
			})
		} else {
			alert('maximum of 3 image');
			$(this).val('');
		}
	})
});