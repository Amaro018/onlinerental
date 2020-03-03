let events = [];

let color_arr = '';
let size_arr = '';
// let color = '';
// let size = '';
let c = [];
let s = [];
let c_holder = '';
let s_holder = '';

let all_size = ['Xsmall','Small','Medium','Large','Xlarge'];
let all_color = ['Red','Blue','Yellow','Violet','Green','Indigo','Orange','Black'];

let form_data = '';

let condition = 0;

$(document).ready(function(){ 
	product_img();
	function product_img(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/product_img.php',
			data: {item_no : item_no},
			success: function(res){
				$('#img').html(res);
			}
		});
	}
	product_desc();
	function product_desc(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/product_desc.php',
			data: {item_no : item_no},
			success: function(res){
				$('#desc').html(res);
			}
		});
	}
	product_review();
	function product_review(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/product_review.php',
			success: function(res){
				$('#reviews').html(res);
				product_review_data();
			}
		});	
	}
	product_shop();
	function product_shop(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/product_shop.php',
			data: {item_no : item_no, accNo : accNo},
			success: function(res){
				$('#shop_data').html(res);
			}
		})
	}
	function product_review_data(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/product_review_data.php',
			data: {item_no: item_no},
			dataType: 'json',
			success: function(res){
				$('#review_data').html(res.output);
				rating(res.rate_count, res.rate_num, res.rate_sum);
			}
		})
	}
	function rating(rate_count, rate_num, rate_sum){
		let b = 0;
		let rating = '';
		for(let a = rate_count.length; a > 0; a--){
			// rating = (rate_count[b] * a) / rate_sum * 100 + '%';
			rating = (rate_count[b] / rate_num) * 100 + '%';
			$('#'+a+'lbl_progress').html('<small class="text-danger">'+rate_count[b]+' rating</small>');
			$('#'+a+'progress').css('width', rating);
			b++;
		}
		let rate_total = (rate_sum / rate_num).toFixed(1);
		let percentage_total = (rate_sum / 5) * 100 / rate_num + '%';
		if(rate_num != 0){
			$('#lbl_rating').text(rate_total+'/5');
			$('.prog').html(rate_total + ' | <small>'+rate_num+' ratings</small>');
			$('.stars-inner').css('width', percentage_total);
			$('.inner').css('width', percentage_total);
		} else {
			$('#lbl_rating').text('0/5');
			$('.prog').html('0 | <small>0 ratings</small>');
		}
	}
	modals();
	function modals(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/modals.php',
			data: {item_no : item_no},
			success: function(res){
				$('#modals').html(res);
				load_data();
				load_calendar();
				count_cart_item();
			}
		});
	}
	function load_data() {
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/modal_datas/loadData.php',
			// url: 'function/pages/product_view/modal_datas/loadMainImg.php',
			dataType: 'json',
			data: {item_no : item_no, accNo : accNo},
			success: function(res) {
				console.log(res);
				$('#loadMainImg').html(res.output);
				if(res.color.length != 0 || res.size.length != 0){
					for(let a = 0; a < res.color.length; a++){
						c.push(res.color[a]);
					}
					for(let a = 0; a < res.size.length; a++){
						s.push(res.size[a]);
					}	
				} else {
					no_var();
					// $('#addBtn').removeAttr('disabled');
				}
			}
		});
	}
	function no_var(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/modal_datas/loadNoVar.php',
			data: {item_no : item_no},
			dataType: 'json',
			success: function(res){
				console.log(res);
				if(res.qtyA > 1){
					$('#addBtn').removeAttr('disabled');
				}
				$('#stocked').html('Stock: '+res.qty);
				$('#available').html('Available: '+res.qtyA);
				$('#max_qty').val(res.qtyA);
			}
		})
	}
	function count_cart_item(){
		if(accNo != ''){
			$.ajax({
				method: 'post',
				url: 'function/pages/product_view/count_cart_item.php',
				data: {accNo : accNo},
				success: function(res){
					$('sup').html(res);
				}
			})
		}
	}
	function load_calendar(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/modal_datas/loadCalendar.php',
			data: {item_no : item_no},
			dataType: 'json',
			success: function(res){
				for(let a = 0; a < res.start.length; a++) {
					events.push({
						title: 'reserved',
						start: res.start[a],
						end: res.end[a]
					});
				}
				var calendarEl = document.getElementById('calendar');
				var calendar = new FullCalendar.Calendar(calendarEl, {
					plugins: [ 'dayGrid', 'bootstrap', 'interaction', 'timeGrid' ],
					themeSystem: 'bootstrap',
					height: 500,
					selectable: true,
					eventLimit: true,
					defaultDate: new Date(),
					select: function(info) {
						let date = new Date();
						let current = date.toISOString().substring(0,10);
						let from = info.startStr;
						let dueDate = info.endStr;
						// alert(date.getDate());
						// alert(info.start.getDate());
						if(from <= current){
							alert('choose a valid date');
						} else {
							document.getElementById('sDate').value = from;
							document.getElementById('rDate').value = dueDate;
							document.getElementById('cDate').value = current;
							$('#modalCalendar').modal('hide');	
						}
						// alert(
						// 	'From: '+ from +' \n'+
						// 	'Due Date: '+ dueDate + 
						// 	info.start
						// );
					},
					eventClick: function(info) {
				        var eventObj = info.event;
				        alert(eventObj.title + ' items.');
			     	},
			     	events:events
				});
				calendar.render();
				events.splice(0, res.start.length);
			}
		});
	}
	$(document).on('click', '#modal', function(){
		$('#modalDate').modal();
	});
	$(document).on('click', '#modal_calendar', function(){
		$('#modalCalendar').modal();
	});
	$(document).on('click', '.imgs', function(){
		let expandImg = document.getElementById("expandedImg");
	    expandImg.src = this.src;
	    // expandImg.parentElement.style.display = "block";
	});
	// $(document).on('click', '.color', function(){
	// 	$('#color').val(this.innerHTML);
	// 	color = $('#color').val();
	// 	size = $('#size').val();
	// 	$('#color_label').text(color);
	// 	if(color_arr == ''){
	// 		color_arr = $('#color'+color).addClass('active');
	// 		load_color_and_size(color, size);
	// 	}
	// 	else if(color_arr[0].id == 'color'+color){
	// 		$('#color'+color).removeClass('active');
	// 		$('#color').val('');
	// 		color_arr = '';
	// 		load_color_and_size(color_arr, size);
	// 	} 
	// 	else {
	// 		$('#'+color_arr[0].id).removeClass('active');
	// 		color_arr = $('#color'+color).addClass('active');
	// 		load_color_and_size(color, size);
	// 	}
	// });
	// $(document).on('click', '.size', function(){
	// 	$('#size').val(this.innerHTML);
	// 	color = $('#color').val();
	// 	size = $('#size').val();
	// 	$('#size_label').text(size);
	// 	if(size_arr == '') {
	// 		size_arr = $('#size'+size).addClass('active');
	// 		load_color_and_size(color, size);
	// 	}
	// 	else if($(size_arr).attr('id') == 'size'+size){
	// 		$('#size'+size).removeClass('active');
	// 		$('#size').val('');
	// 		size_arr = '';
	// 		load_color_and_size(color, size_arr);
	// 	} else {
	// 		$('#'+size_arr[0].id).removeClass('active');
	// 		size_arr = $('#size'+size).addClass('active');
	// 		load_color_and_size(color, size);
	// 	}
	// });
	$(document).on('click', '#subBtn, #addBtn', function(){
		let id = $(this).attr('id');
		let qty = $('#qty').val();
		let max = $('#max_qty').val();
		if(id == 'addBtn'){
			if(qty < max){
				qty++;
				$('#qty').val(qty);
				$('#subBtn').removeAttr('disabled');
			}
		} 
		else{
			qty--;
			$('#qty').val(qty);
			qty = $('#qty').val();
			if(qty == 1){
				$('#subBtn').attr('disabled', 'disabled');	
			}
		}
	});
	// function load_color_and_size(dataColor, dataSize){
	// 	$.ajax({
	// 		method: "post",
	// 		url: "function/pages/product_view/modal_datas/loadColor.php",
	// 		data: {dataColor : JSON.stringify(dataColor), dataSize : JSON.stringify(dataSize), item_no : item_no},
	// 		dataType: "json",
	// 		success: function(res) {
	// 			if(res.output == 'color n size'){
	// 				// disabled
	// 				for(let a = 0; a < res.color_arr.length; a++){
	// 					$('#color'+res.color_arr[a]).attr('disabled', 'disabled').css('border', '1px dashed');
	// 				}
	// 				for(let a = 0; a < res.size_arr.length; a++){
	// 					$('#size'+res.size_arr[a]).attr('disabled', 'disabled').css('border', '1px dashed');
	// 				}
	// 				// enabled
	// 				for(let a = 0; a < res.color.length; a++){
	// 					$('#color'+res.color[a]).removeAttr('disabled').css('border', '1px solid');
	// 				}
	// 				for(let a = 0; a < res.size.length; a++){
	// 					$('#size'+res.size[a]).removeAttr('disabled').css('border', '1px solid');
	// 				}
	// 				$('#addBtn').removeAttr('disabled');
	// 			} 
	// 			else if(res.output == 'color'){
	// 				for(let a = 0; a < res.size_arr.length; a++){
	// 					$('#size'+res.size_arr[a]).attr('disabled', 'disabled').css('border', '1px dashed');
	// 				}
	// 				for(let a = 0; a < res.size.length; a++){
	// 					$('#size'+res.size[a]).removeAttr('disabled').css('border', '1px solid');
	// 				}
	// 				for(let a = 0; a < res.color_arr.length; a++){
	// 					$('#color'+res.color_arr[a]).removeAttr('disabled').css('border', '1px solid');
	// 				}
	// 				$('#size_label').text(res.size[0]);
	// 			}
	// 			else if(res.output == 'size'){
	// 				for(let a = 0; a < res.color_arr.length; a++){
	// 					$('#color'+res.color_arr[a]).attr('disabled', 'disabled').css('border', '1px dashed');
	// 				}
	// 				for(let a = 0; a < res.color.length; a++){
	// 					$('#color'+res.color[a]).removeAttr('disabled').css('border', '1px solid');
	// 				}
	// 				for(let a = 0; a < res.size_arr.length; a++){
	// 					$('#size'+res.size_arr[a]).removeAttr('disabled').css('border', '1px solid');
	// 				}
	// 				$('#color_label').text(res.color[0]);
	// 			}
	// 			else {
	// 				$('.color').removeAttr('disabled').css('border', '1px solid');
	// 				$('.size').removeAttr('disabled').css('border', '1px solid');
	// 				$('#color_label').text($('.color')[0].innerHTML);
	// 				$('#size_label').text($('.size')[0].innerHTML);
	// 			}
	// 			change_data(
	// 				res.output,
	// 				res.img,
	// 				res.imgAll,
	// 				res.price,
	// 				res.qty
	// 			);
	// 		}
	// 	});		
	// }
	function img_data(color, size){
		console.log(color);
		console.log(size);
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/modal_datas/loadImgData.php',
			data: {item_no : item_no, color : color, size : size},
			dataType: 'json',
			success: function(res){
				console.log(res);
				data_change(
					res.img,
					res.price,
					res.qty,
					res.qtyA,
					res.output,
					res.type
				);
			}
		})
	}
	function data_change(img, price, qty, qtyA, output, type){
		$('#switchImg').attr('src', 'upload/'+img);
		$('#img_group').html(output);
		$('#per_price').html('&#8369;'+price+'.00');
		$('#qty').val(1);
		$('#subBtn').attr('disabled', 'disabled');
		if(type != 'none'){
			$('#stocked').html('Stock: '+qty);
			$('#available').html('Available: '+qtyA);
			$('#max_qty').val(qtyA);
			if(qtyA == 0){
				$('#qty').val(qtyA);
			}				
			if(qty > 1){
				$('#addBtn').removeAttr('disabled');
			}
		} else {
			$('#stocked').html('');
			$('#available').html('');
			$('#max_qty').val('');
		}
		$('#color_label').html(c_holder);
		$('#size_label').html(s_holder);
	}
	$(document).on('click', '.color', function(){
		$('#color').val(this.innerHTML);
		let color = this.innerHTML;
		if(c_holder != ''){
			if(color != c_holder){
				$('#color'+c_holder).removeClass('active');
				c_holder = color;
				$('#color'+color).addClass('active');
			} else {
				$('#color'+c_holder).removeClass('active');
				c_holder = '';
				$('#color'+color).removeClass('active');
			}	
		} else {
			c_holder = color;
			$('#color'+color).addClass('active');
		}
		all_size = ['Xsmall','Small','Medium','Large','Xlarge'];

		for(let a = 0; a < all_size.length; a++){
			$('#size'+all_size[a]).removeAttr('disabled').css('border', '1px solid #007bff');
		}
		for(let a = 0; a < c.length; a++){
			if(color == c[a]){
				for(let b = 0; b < all_size.length; b++){
					if(all_size[b] == s[a]){
						all_size.splice(b, 1);
					}	
				}
			} 
		}
		if(c_holder != ''){
			for(let a = 0; a < all_size.length; a++){
				$('#size'+all_size[a]).attr('disabled', 'disabled').css('border', '1px dashed #007bff');
			}	
		} else {
			for(let a = 0; a < all_size.length; a++){
				$('#size'+all_size[a]).removeAttr('disabled').css('border', '1px solid #007bff');
			}
		}
		img_data(c_holder, s_holder);
	});
	$(document).on('click', '.size', function(){
		$('#size').val(this.innerHTML);
		let size = this.innerHTML;
		if(s_holder != ''){
			if(size != s_holder){
				$('#size'+s_holder).removeClass('active');
				s_holder = size;
				$('#size'+size).addClass('active');
			} else {
				$('#size'+s_holder).removeClass('active');
				s_holder = '';
				$('#size'+size).removeClass('active');
			}	
		} else {
			s_holder = size;
			$('#size'+size).addClass('active');
		}
		all_color = ['Red','Blue','Yellow','Violet','Green','Indigo','Orange','Black'];

		for(let a = 0; a < all_color.length; a++){
			$('#color'+all_color[a]).removeAttr('disabled').css('border', '1px solid #007bff');
		}
		for(let a = 0; a < s.length; a++){
			if(size == s[a]){
				for(let b = 0; b < all_color.length; b++){
					if(all_color[b] == c[a]){
						all_color.splice(b, 1);
					}	
				}
			} 
		}
		if(s_holder != ''){
			for(let a = 0; a < all_color.length; a++){
				$('#color'+all_color[a]).attr('disabled', 'disabled').css('border', '1px dashed #007bff');
			}	
		} else {
			for(let a = 0; a < all_color.length; a++){
				$('#color'+all_color[a]).removeAttr('disabled').css('border', '1px solid #007bff');
			}
		}
		img_data(c_holder, s_holder);
	});
	// function change_data(output, img, imgAll, price, qty){
	// 	$('#switchImg').attr('src', 'upload/'+img);
	// 	$('#per_price').html('&#8369; '+price+'.00');
	// 	$('#img_name').val(img);
	// 	$('#price').val(price);
	// 	if(qty == 0 && output == 'color n size'){
	// 		$('#qty').val('');
	// 		$('#addBtn').attr('disabled', 'disabled');
	// 		$('#qty_label').html('Quantity: <small class="text-danger">out-of-stock</small>');
	// 	}
	// 	else {
	// 		$('#qty').val(1);
	// 		$('#max_qty').val(qty);
	// 		$('#qty_label').html('Quantity:');
	// 	}
	// 	if(output != 'color n size'){
	// 		$('#addBtn').attr('disabled', 'disabled');
	// 		$('#subBtn').attr('disabled', 'disabled');
	// 	}
	// 	for(let a = 0; a < 3; a++){
	// 		$('#imgDiv'+a).hide();
	// 		$('#img'+a).removeAttr('src');
	// 	}
	// 	for(let a = 0; a < imgAll.length; a++){
	// 		$('#imgDiv'+a).show();
	// 		$('#img'+a).attr('src', 'upload/'+imgAll[a]);
	// 	}
	// }
	$(document).on('click', '.img-switch', function(){
		let switchImg = document.getElementById("switchImg");
	    switchImg.src = this.src;
	    // switchImg.parentElement.style.display = "block";
	});
	$(document).on('submit', '#rent_details', function(e){
		console.log($(this).serialize());
		e.preventDefault();
		if(accNo != ''){
			if($('#qty').val() != 0){
				if($('#sDate').val() != '' && $('#rDate').val() != ''
				&& $('#qty').val() != '' && $('#type_of_ship').val() != ''){
					if(c.length != 0 && s.length != 0){
						if(c_holder != '' && s_holder != ''){
							form_data = $(this).serialize();
							modal_rent(form_data);
						} else {
							alert('please fill-up data');
						}
					}
					else if(c.length != 0 || s.length != 0){
						if(c_holder != '' || s_holder != ''){
							form_data = $(this).serialize();
							modal_rent(form_data);
						} else {
							alert('please fill-up data');
						}
					}
					else {
						form_data = $(this).serialize();
						modal_rent(form_data);
					}
				} else {
					alert('Please choose data.');
				}
			} else {
				alert('No available stock.');
			}
		} else {
			$('#modalDate').modal('hide');
			$('#modalLogin').modal();
		}
	})
	function modal_rent(form_data){
		console.log(form_data);
		$.ajax({
			method: 'post',
			url: 'function/pages/product_view/modal_datas/loadRent2.php',
			data: form_data,
			success: function(res){
				$('#modalItem').modal('show');
				$('#modalDate').modal('hide');
				$('#items_data').html(res);
			}
		})
	}
	// $(document).on('submit', '#rent_details', function(event){
	// 	event.preventDefault();
	// 	if(accNo != ''){
	// 		if($('#sDate').val() != '' 
	// 			&& $('#rDate').val() != '' 
	// 			&& $('#qty').val() != '' 
	// 			&& $('#color').val() != '' 
	// 			&& $('#size').val() != '' 
	// 			&& $('#type_of_ship').val() != '') {
	// 				form_data = $(this).serialize();
	// 				$.ajax({
	// 					url: "function/pages/product_view/modal_datas/loadRent.php",
	// 					method: "post",
	// 					data: form_data,
	// 					success: function(res) {
	// 						$('#modalItem').modal('show');
	// 						$('#modalDate').modal('hide');
	// 						$('#items_data').html(res);
	// 					}
	// 				});
	// 			} else {
	// 				alert('Fields are required.');
	// 			}
	// 	} 
	// 	else {
	// 		$('#modalDate').modal('hide');
	// 		$('#modalLogin').modal();
	// 	}
	// });
	// $(document).on('change', '#bill', function(){
	// 	let check = this.checked;
	// 	if(check == true){
	// 		$.ajax({
	// 			method: 'post',
	// 			url: 'function/pages/product_view/modal_datas/loadAddress.php',
	// 			data: {accNo : accNo},
	// 			dataType: 'json',
	// 			success: function(res){
	// 				$('#st').val(res.st);
	// 				$('#zone').val(res.zone);
	// 				$('#brgy').val(res.brgy);
	// 				$('#city').val(res.city);
	// 			}
	// 		})	
	// 	} else {
	// 		$('#st').val('');
	// 		$('#zone').val('');
	// 		$('#brgy').val('');
	// 		$('#city').val('');
	// 	}
	// })
	$(document).on('hidden.bs.modal', '#modalLogin', function(){
		if(condition != 0){
			condition = 0;
		} else {
			$('#modalDate').modal();
		}
	});
	$(document).on('hidden.bs.modal', '#modalItem', function(){
		$('#modalDate').modal();
	});
	$(document).on('click', '[type="radio"]', function(){
		let id = this.id;
		$('#type_of_ship').val(id);
	});
	$(document).on('click', '#rent_item', function(){
		if(confirm('Are you sure?')){
			let st = $('#st').val(),
			zone = $('#zone').val(),
			brgy = $('#brgy').val(),
			city = $('#city').val();
			form_data += `&st=${st}&zone=${zone}&brgy=${brgy}&city=${city}`;
			console.log(form_data);
			$.ajax({
				method: 'post',
				url: 'function/pages/product_view/product_rent.php',
				data: form_data,
				success: function(res){
					console.log(res);
					window.location.assign('product_desc.php?item_no='+res);
				}
			})
		}
	});
	$(document).on('click', '#modal_cart', function(){
		if(accNo != ''){
			window.location.assign('user_cart.php');
		}
		else {
			$('#modalDate').modal('hide');
			$('#modalLogin').modal();
		}
	});
	$(document).on('click', '#add_to_cart', function(){
		if(accNo != '') {
			if($('#sDate').val() != '' 
				&& $('#rDate').val() != '' 
				&& $('#qty').val() != '' 
				&& $('#color').val() != '' 
				&& $('#size').val() != '' 
				&& $('#type_of_ship').val() != ''){
				let form = $('#rent_details').serialize();
				$.ajax({
					method: 'post',
					url: 'function/pages/product_view/save_to_cart.php',
					data: form,
					success: function(res){
						console.log(res);
					}
				})
			}
			else {
				alert('Fields are required.');
			}
		}
		else {
			$('#modalDate').modal('hide');
			$('#modalLogin').modal();
		}
	});
	$(document).on('click', '.chat_shop', function(){
		if(accNo != 0){
			let shop_no = this.id;
			let display = 0;
			$('#floating_chatbox').click();
			$('#chat_input').focus();
			for(let a = 0; a < shoplist_no.length; a++){
				if(shop_no == shoplist_no[a]){
					display = shop_no;
				}
			}
			if(display != 0){
				$('#side_chat_list li#'+shop_no).click();
			}
			else {
				$.ajax({
					method: 'post',
					url: 'function/pages/product_view/chat_data.php',
					dataType: 'json',
					data: {shop_no : shop_no},
					success: function(res){
						$('#side_chat_list').append(res.output);
						$('#user_name').html(res.name);
					}
				})
			}
		} else {
			$('#modalLogin').modal();
			condition = 1;
		}
	})
	$(document).on('click', '.follow_shop', function(){
		if(accNo != 0){
			let shop_no = this.id;
			let text = $(this).text();
			$.ajax({
				method: 'post',
				url: 'function/pages/product_view/follow_shop.php',
				dataType: 'json',
				data: {shop_no : shop_no, accNo : accNo, text: text},
				success: function(res){
					$('.follow_shop').html('<i class="fa fa-location-arrow"></i>'+res.text);
				}
			})

		} else {
			$('#modalLogin').modal();
			condition = 1;
		}
	})
	$(document).on('click', '.goto_shop', function(){
		if(accNo != 0){
			
		} else {
			$('#modalLogin').modal();
			condition = 1;
		}
	})
});



