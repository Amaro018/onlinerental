let count = [];
let arr_qty = [];
let arr_price = [];
let arr_size = [];
let arr_color = [];

let file_collection = [];
let collection_id = [];

let type = '';

$(document).ready(function(){
	let item = ['item-list', 'add-item', 'damage-item'];

	item_management_body();
	function item_management_body(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/item_management/item_management_body.php',
			success: function(res){
				$('#shop_item_management').html(res);
				body_item_list();
			}
		});
	}
	function body_item_list(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/item_management/item_management_body/body_item_list.php',
			success: function(res){
				$('#body_item_list').html(res);
				load_data_notif();
				body_add_item();
			}
		});	
	}	
	function body_add_item(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/item_management/item_management_body/body_add_item.php',
			data: {shop_no : shop_no},
			success: function(res){
				$('#body_add_item').html(res);
			}
		});	
	}
	item_management_modals();
	function item_management_modals(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/item_management/item_management_body/item_management_modals.php',
			success: function(res){
				$('#item_management_modals').html(res);
				// $('#view_modal').modal('show');
			}
		});
	}
	function load_data_notif(){
		let w = $('#body_header ul li a#item-list').innerWidth();
		$('.underline-item-list').animate({width: w});
		$('#item-list').css('color', 'rgba(220, 53, 69, 0.8)');
	}
	$(document).on('click', '#body_header a', function(){
		let id = $(this).prop('id');
		let w = $(this).innerWidth();
		$(this).css('color', 'rgba(220, 53, 69, 0.8)');
		$('.underline-'+id).animate({width: w});

		for(let a = 0; a < item.length; a++){
			if(id != item[a]){
				$('#'+item[a]).css('color', 'gray');
				$('.underline-'+item[a]).animate({width: 0});
			}
		}
	});
	$(document).on('click', '#body_header a', function(){
		let id = $(this).prop('id');
		if(id != 'item-list'){
			$('#body_item_list').hide();
			$('#body_add_item').show();
		} else{
			$('#body_item_list').show();
			$('#body_add_item').hide();
		}
	});
	$(document).on('click', '#add_variant', function(){
		let qty = $('#qty').val();
		let price = $('#price').val();
		let size = $('#size').val();
		let color = $('#color').val();
		let holder = $('#num_holder').val();
		console.log(size);
		console.log(color);

		// let size = sized.toLowerCase();
		// let color = colored.toLowerCase();

		if(qty == null || price == null || qty == 0 || price == 0) {
			alert('fields are required');
		} else {
			if(color != undefined && size != undefined){
				arr_qty.push(qty);
				arr_price.push(price);
				arr_size.push(size);
				arr_color.push(color);
				count.push(holder);
				let output = `
					<tr id="tr_${holder}">
						<td>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="${holder}" name="${holder}">
								<label class="custom-control-label" for="${holder}"></label>
							</div>
						</td>
						<td>
							<input type="number" class="form-control td_qty" id="qty${holder}" value="${qty}" readonly name="qty${holder}" />
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">&#8369;</span>
								</div>
								<input type="number" class="form-control td_price" value="${price}" min="20" id="price${holder}" readonly name="price${holder}" />	
							</div>
						</td>
						<td>
							<select class="custom-select td_size" id="size${holder}" readonly name="size${holder}">
								<option value="Xsmall">Xsmall</option>
								<option value="Small">Small</option>
								<option value="Medium">Medium</option>
								<option value="Large">Large</option>
								<option value="Xlarge">Xlarge</option>
							</select>
						</td>
						<td>
							<select class="custom-select td_color" id="color${holder}" readonly name="color${holder}">
								<option value="Red">Red</option>
								<option value="Orange">Orange</option>
								<option value="Yellow">Yellow</option>
								<option value="Green">Green</option>
								<option value="Blue">Blue</option>
								<option value="Indigo">Indigo</option>
								<option value="Violet">Violet</option>
							</select>
						</td>
						<td>
							<div class="btn-group btn-block">
								<button type="button" class="btn text-info" id="edit" value="${holder}"><i class="fa fa-pen"></i></button>
								<button type="button" class="btn text-danger" id="del" value="${holder}"><i class="fa fa-trash"></i></button>
								<button type="button" class="btn text-secondary img" value="${holder}"><i class="fa fa-file-image"></i></button>
								<button type="button" class="btn text-success" id="view" value="${holder}"><i class="fa fa-eye"></i></button>
							</div>
							<input type="file" id="${holder}file" hidden multiple />
						</td>
					</tr>
				`;
				$('#variant_data').prepend(output);
				let tSize = $('#size'+holder+' option');
				for(let a = 0; a < tSize.length; a++){
					if(tSize[a].value == size) {
						tSize[a].selected = true;
					}
				}
				let tColor = $('#color'+holder+' option');
				for(let a = 0; a < tColor.length; a++){
					if(tColor[a].value == color) {
						tColor[a].selected = true;
					}
				}
				holder++;
				$('#num_holder').val(holder);
			}
			else if(color != undefined && size == undefined){
				arr_qty.push(qty);
				arr_price.push(price);
				arr_color.push(color);
				count.push(holder);
				let output = `
					<tr id="tr_${holder}">
						<td>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="${holder}" name="${holder}">
								<label class="custom-control-label" for="${holder}"></label>
							</div>
						</td>
						<td>
							<input type="number" class="form-control td_qty" id="qty${holder}" value="${qty}" readonly name="qty${holder}" />
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">&#8369;</span>
								</div>
								<input type="number" class="form-control td_price" value="${price}" min="20" id="price${holder}" readonly name="price${holder}" />	
							</div>
						</td>
						<td>
							<select class="custom-select td_color" id="color${holder}" readonly name="color${holder}">
								<option value="Red">Red</option>
								<option value="Orange">Orange</option>
								<option value="Yellow">Yellow</option>
								<option value="Green">Green</option>
								<option value="Blue">Blue</option>
								<option value="Indigo">Indigo</option>
								<option value="Violet">Violet</option>
							</select>
						</td>
						<td>
							<div class="btn-group btn-block">
								<button type="button" class="btn text-info" id="edit" value="${holder}"><i class="fa fa-pen"></i></button>
								<button type="button" class="btn text-danger" id="del" value="${holder}"><i class="fa fa-trash"></i></button>
								<button type="button" class="btn text-secondary img" value="${holder}"><i class="fa fa-file-image"></i></button>
								<button type="button" class="btn text-success" id="view" value="${holder}"><i class="fa fa-eye"></i></button>
							</div>
							<input type="file" id="${holder}file" hidden multiple />
						</td>
					</tr>
				`;
				$('#variant_data').prepend(output);
				let tColor = $('#color'+holder+' option');
				for(let a = 0; a < tColor.length; a++){
					if(tColor[a].value == color) {
						tColor[a].selected = true;
					}
				}
				holder++;
				$('#num_holder').val(holder);
			}
			else if(size != undefined){
				arr_qty.push(qty);
				arr_price.push(price);
				arr_size.push(size);
				count.push(holder);
				let output = `
					<tr id="tr_${holder}">
						<td>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="${holder}" name="${holder}">
								<label class="custom-control-label" for="${holder}"></label>
							</div>
						</td>
						<td>
							<input type="number" class="form-control td_qty" id="qty${holder}" value="${qty}" readonly name="qty${holder}" />
						</td>
						<td>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">&#8369;</span>
								</div>
								<input type="number" class="form-control td_price" value="${price}" min="20" id="price${holder}" readonly name="price${holder}" />	
							</div>
						</td>
						<td>
							<select class="custom-select td_size" id="size${holder}" readonly name="size${holder}">
								<option value="Xsmall">Xsmall</option>
								<option value="Small">Small</option>
								<option value="Medium">Medium</option>
								<option value="Large">Large</option>
								<option value="Xlarge">Xlarge</option>
							</select>
						</td>
						<td>
							<div class="btn-group btn-block">
								<button type="button" class="btn text-info" id="edit" value="${holder}"><i class="fa fa-pen"></i></button>
								<button type="button" class="btn text-danger" id="del" value="${holder}"><i class="fa fa-trash"></i></button>
								<button type="button" class="btn text-secondary img" value="${holder}"><i class="fa fa-file-image"></i></button>
								<button type="button" class="btn text-success" id="view" value="${holder}"><i class="fa fa-eye"></i></button>
							</div>
							<input type="file" id="${holder}file" hidden multiple />
						</td>
					</tr>
				`;
				$('#variant_data').prepend(output);
				let tSize = $('#size'+holder+' option');
				for(let a = 0; a < tSize.length; a++){
					if(tSize[a].value == size) {
						tSize[a].selected = true;
					}
				}
				holder++;
				$('#num_holder').val(holder);
			}
		}
	});
	$(document).on('click', '#del', function(){
		let val = this.value;
		console.log(val);
		$('#tr_'+val).remove();
		for(let a = 0; a < count.length; a++){
			if(val == count[a]){
				count.splice(a, 1);
				arr_qty.splice(a, 1);
				arr_price.splice(a, 1);
				arr_size.splice(a, 1);
				arr_color.splice(a, 1);
			}
		}
	});
	$(document).on('click', '#edit', function(){
		let val = this.value;
		$(this).removeClass('text-info').addClass('text-success').children().removeClass('fa-edit').addClass('fa-save');
		$(this).attr('id', 'save');
		$('#qty'+val).removeAttr('disabled');
		$('#price'+val).removeAttr('disabled');
		$('#size'+val).removeAttr('disabled');
		$('#color'+val).removeAttr('disabled');
		$('#tr_'+val+' input, #tr_'+val+' select:not(option), #tr_'+val+' span').css('background-color', 'rgba(0, 123, 255, 0.3)');
	});
	$(document).on('click', '#save', function(){
		let val = this.value;
		$(this).removeClass('text-success').addClass('text-info').children().removeClass('fa-save').addClass('fa-edit');
		$(this).attr('id', 'edit');
		$('#qty'+val).attr('disabled', 'disabled');
		$('#price'+val).attr('disabled', 'disabled');
		$('#size'+val).attr('disabled', 'disabled');
		$('#color'+val).attr('disabled', 'disabled');
		$('#tr_'+val+' input, #tr_'+val+' select:not(option), #tr_'+val+' span').css('background-color', 'white');
	});
	$(document).on('click', '.img', function(){ 
		let val = this.value;
		$('#'+val+'file').click().val('');
		$('#img_data').children().remove();

		for(let a = 0; a < collection_id.length; a++){
			if(val == collection_id[a]){
				file_collection.splice(a, 1); 
				collection_id.splice(a, 1); 
			}
		}
	});
	$(document).on('click', '#view', function(){
		let val = this.value;
		let qty = $('#qty'+val).val();
		let price = $('#price'+val).val();
		let size = $('#size'+val).val();
		let color = $('#color'+val).val();
		
		$('#img_data').children().remove();
		$('#img_modal').modal();
		
		$('#qtyview').val(qty);
		$('#priceview').val(price);
		$('#sizeview').val(size);
		$('#colorview').val(color);

		let filefile = document.getElementById(val+'file').files;
		$.each(filefile, function(i, file){
			let reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onload = function(e){
				let template = `
					<div class="col-md-4" id="${val}">
						<div class="card">
							<div class="card-header p-0">
								<div class="form-inline float-right">
									<button type="button" class="btn btn-light border border-0">
										<i class="fa fa-ellipsis-h"></i>
									</button>
									<button type="button" class="btn btn-light border border-0">
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
				$('#img_data').append(template);
			}
		})
	});
	$(document).on('change', ':file', function(e){
		let files = e.target.files;
		let file_id = parseInt(this.id);

		if(files.length <= 3){
			file_collection.push(files);
			collection_id.push(file_id);
		}
		else {
			alert('maximum of 3 photos per item');
			$(this).val('');
		}
	})
	$(document).on('click', ':radio', function(){
		$('#type_of_ship').val(this.id);
	})
	$(document).on('submit', '#add_item_form', function(e){
		console.log($(this).serialize());
		e.preventDefault();
		if($('#shop_no').val() != '' && $('#item_name').val() != '' && $('#item_category').val() != '' &&
		 $('#item_desc').val() != '' && $('#min').val() != '' && $('#max').val() != '' &&
		 $('#type_of_ship').val() != ''){
		 	if($('.td_color').val() != undefined || $('.td_size').val() != undefined || type != ''){
		 		if(type != 'variants'){
		 			arr_qty.push($('#qty').val());
					arr_price.push($('#price').val());
					count.push($('#num_holder').val());
		 		} 
		 		let form_data = $(this).serialize();
			 	$.ajax({
					method: 'post',
					url: 'function/shop_dashboard/item_management/item_management_body/save_item_info.php',
					data: form_data,
					success: function(res){
						console.log(res);
						let last_id = res;

						$.ajax({
							method: 'post',
							url: 'function/shop_dashboard/item_management/item_management_body/save_item_variants.php',
							data: {count : count, size : arr_size, color : arr_color, price : arr_price, qty : arr_qty, last_id : last_id},
							dataType: 'json',
							success: function(res){
								console.log(res);
								let last_id_info = res.info;
								let last_id_variants = res.variants;

								let form_data = new FormData();

								for(let a = 0; a < file_collection.length; a++){
									for(let b = 0; b < file_collection[a].length; b++){
										form_data.append(a+'file[]', file_collection[a][b]);
									}
								form_data.append('last_id_variants[]', last_id_variants[a]);
								}
								form_data.append('last_id_info', last_id_info);
								form_data.append('count', count.length);

								$.ajax({
									method: 'post',
									url: 'function/shop_dashboard/item_management/item_management_body/save_item_image.php',
									data: form_data,
									contentType: false,
									processData: false,
									success: function(res){
										console.log(res);
										window.location.assign('shop_item_list.php');
									}
								})
							}
						})
					}			
				})
		 	} else {
		 		console.log('not enough details');
		 	}
		} else {
			console.log('not enough data');
		}
	})
	$(document).on('change', '#item_category', function(){
		count.splice(0, count.length);			
		arr_qty.splice(0, arr_qty.length);			
		arr_price.splice(0, arr_price.length);			
		arr_color.splice(0, arr_color.length);			
		arr_size.splice(0, arr_size.length);			
		let cat = this.value;
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/item_management/item_management_body/category_check.php',
			data: {category : cat},
			dataType: 'json',
			success: function(res){
				console.log(res);
				$('#item_variants').html(res.output);
				if(res.type != 'variants'){
					type = res.type;
				} else {
					type = res.type;
				}
				// $('#'+res.output).removeAttr('hidden');
				// for(let a = 0; a < res.variants.length; a++){
				// 	$('#'+res.variants[a]).attr('hidden', 'hidden').find('input, select').attr('disabled', 'disabled');
				// }
			}
		})
	})
});
