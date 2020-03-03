var checkBox = [];
var checkBoxQty = [];
var checkCart = [];
var rent_holder = [];
var events = [];

var cart_no = [];


$(document).ready(function(){
	load_cart_data();
	function load_cart_data(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/cart/cart_data_function.php',
			// url: 'function/user_dashboard/cart/cart.php',
			// data: {accNo : accNo},
			dataType: 'json',
			success: function(res){
				console.log(res);
				$('#cart_data').html(res.output);
				for(var a = 0; a < res.cart_no.length; a++){
					$('#available'+res.cart_no[a]).val(res.cart_val[a]);
					// $('#avail'+res.cart_no[a]).text(res.cart_val[a]+' available.');
				}
				load_available_item();
			}
		});
	}
	load_rent_out_modal();
	function load_rent_out_modal(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/cart/rent_out_modal_function.php',
			success: function(res) {
				$('#rent_out_modal').html(res);
			}
		});
	}
	function load_calendar_modal(count){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/cart/calendar_modal.php',
			data: {count : JSON.stringify(count)},
			success: function(res){
				$('#calendar_modal').html(res);
				load_calendar();
			}
		});
	}
	function load_calendar(){
		//document.addEventListener('DOMContentLoaded', function() { });
		for(var a = 0; a < checkBox.length; a++){
			$.ajax({
				method: 'post',
				url: 'function/user_dashboard/cart/load_calendar_data.php',
				data: {cart : JSON.stringify(checkBox[a]), count : JSON.stringify(a)},
				dataType: 'json',
				success: function(res){
					for(var b = 0; b < res.start.length; b++) {
						events.push({
							title: 'reserved',
							start: res.start[b],
							end: res.end[b]
						});
					}
					var calendarEl = document.getElementById('calendar'+res.count);
					var calendar = new FullCalendar.Calendar(calendarEl, {
						plugins: [ 'dayGrid', 'bootstrap', 'interaction', 'timeGrid' ],
						themeSystem: 'bootstrap',
						height: 500,
						selectable: true,
						eventLimit: true,
						// editable: true,
						// navLinks: true,
						defaultDate: new Date(),

						select: function(info) {
							// var date = info.start.getDate();
							var from = info.startStr;
							var dueDate = info.endStr;
							alert(
								'From: '+ from +' \n'+
								'Due Date: '+ dueDate + 
								info.start
							);

							document.getElementById('from'+res.count).value = from;
							document.getElementById('due_date'+res.count).value = dueDate;
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
	}
	function load_available_item(){
		let count = $('.cart_no');
		for(let a = 0; a < count.length; a++){
			cart_no.push(count[a].id);
		}
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/cart/item_availability.php',
			data: {cart_no : JSON.stringify(cart_no)},
			dataType: 'json',
			success: function(res){
				console.log(res);
				for(let a = 0; a < res.no.length; a++){
					if(res.data[a] != 0){
						$('#'+res.no[a]+'qty')[0].max = res.data[a];
					}
					else {
						$('#'+res.no[a]+'qty')[0].disabled = true;
						$('#'+res.no[a]+'qty')[0].value = '';
						$('#'+res.no[a])[0].disabled = true;
					}
				}
			}
		});
	}
	$(document).on('change', '.qty', function(){
		let id = parseInt(this.id);
		let idCheck = $('#'+id);
		let val = this.value;
		let price = parseInt($('#'+id+'price').html());
		let preTotal = val * price;

		if(val > 10) {
			alert('over quantity');
			this.value = 1;
			$('#'+id+'pre-total').html(price);
			let newVal = $('#'+id+'qty').val();
			for(let a = 0; a < checkBox.length; a++) {
				if(checkBox[a] == id) {
					checkBoxQty.splice(a ,1 ,newVal);
				}
			}
			load_check_cart();
		}
		else {
			$('#'+id+'pre-total').html(preTotal);
			if(idCheck[0].checked == true) {
				for(let a = 0; a < checkBox.length; a++) {
					if(checkBox[a] == id) {
						checkBoxQty.splice(a ,1 ,val);
					}
				}
				load_check_cart();
			}	
		}
	});
	$(document).on('change', '.cart_display input:checkbox', function(){
		var id = $(this).attr('id');
		if(id == 'allCheck') {
			$('#del').removeAttr('disabled', 'disabled');
			$('.cart_display input:checkbox').not(this).prop('checked', this.checked);
			checkBox.splice(0, checkBox.length);
			checkBoxQty.splice(0, checkBoxQty.length);
			if(this.checked == true) {
				$('#allCheck-trash').css('display', 'block');
				let all_id = $('.cart_display input:checkbox').not(this);
				for(let a = 0; a < all_id.length; a++){
					if(all_id[a].disabled == true){
						all_id[a].checked = false;
						console.log(a);
					} else {
						let qty = $('#'+all_id[a].id+'qty').val();
						checkBox.push(all_id[a].id);
						checkBoxQty.push(qty);
					}
				}
			} else {
				$('#allCheck-trash').css('display', 'none');
			}
		} else {
			if(this.checked == true) {
				$('#allCheck-trash').css('display', 'block');
				let qty = $('#'+id+'qty').val();
				checkBox.push(id);
				checkBoxQty.push(qty);
			} else {
				for(var a = 0; a < checkBox.length; a++) {
					if(checkBox[a] == id) {
						checkBox.splice(a, 1);
						checkBoxQty.splice(a, 1);
					}
				}
				if(checkBox.length == 0) {
					$('#allCheck-trash').css('display', 'none');
				}
			}
		}
		load_check_cart();
	});
	function load_check_cart() {
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/cart/check_cart_function.php',
			data: {
				checkBox : JSON.stringify(checkBox),
				checkBoxQty : JSON.stringify(checkBoxQty)
			},
			success: function(res) {
				$('#price').html('&#8369; '+res);
			}
		});
	}
	$(document).on('change', '.rent_display input:checkbox', function(){
		var id = $(this).attr('id');
		if(id == 'rentCheck') {
			$('.rent_display input:checkbox').not(this).prop('checked', this.checked);
			checkCart.splice(0, checkCart.length);
			if(this.checked == true) {
				var all_id = $('.rent_display input:checkbox').not(this);
				for(var a = 0; a < all_id.length; a++) {
					checkCart.push(all_id[a].id);
				}	
			}
		} else {
			if(this.checked == true) {
				checkCart.push(id);
			} else {
				for(var a = 0; a < checkCart.length; a++) {
					if(checkCart[a] == id) {
						checkCart.splice(a, 1);
					}
				}
			}
		}
	});
	$(document).on('click', '#rent_out1, #rent_out2', function(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/cart/load_rent_out_data.php',
			dataType: 'json',
			data: {checkBox : JSON.stringify(checkBox)},
			success: function(res) {
				$('#rent_data').html(res.output);
				$(res.name).modal('show');
				for(var a = 0; a < checkBox.length; a++){
					rent_holder.push(checkBox[a]);
				}
				load_calendar_modal(checkBox.length);
			}
		});
	});
	$(document).on('click', '.fa-calendar-alt', function(){
		var data = $(this).attr('id');
		$('#modalCalendar'+data).modal('show');
		$('#modalCart').modal('hide');
		$(document).on('hidden.bs.modal', '#modalCalendar'+data, function(){
			$('#modalCart').modal('show');
		});
		$(document).on('hidden.bs.modal', '#modalCart', function(){
			var cal = $('#modalCalendar'+data).attr('class');
			if(cal != 'modal fade show') {
				var holder = rent_holder.length;
				rent_holder.splice(0, holder);
			}
		});
	});
	$(document).on('click', '.cart-trash, #allCheck-trash', function(){
		var id = $(this).attr('id');
		$('#modalRemove').modal('show');
		if(id == 'allCheck-trash'){
			$(document).on('click', '#remove', function(){
				$.ajax({
					method: 'post',
					data: {id : JSON.stringify(checkBox)},
					url: 'function/user_dashboard/cart/remove_data_function.php',
					success: function(res){
						console.log(res);
						$('#modalRemove').modal('hide');
						load_cart_data();
					}			
				});
			});	
		} else{
			$(document).on('click', '#remove', function(){
				$.ajax({
					method: 'post',
					data: {id : JSON.stringify(id)},
					url: 'function/user_dashboard/cart/remove_data_function.php',
					success: function(res){
						console.log(res);
						$('#modalRemove').modal('hide');
						load_cart_data();
					}			
				});
			});
		}
	});
	$(document).on('click', '.rent-trash', function(){
		var id = $(this).attr('id');
		$('#tr1'+id+', #tr2'+id).remove();
		for(var a = 0; a < rent_holder.length; a++){
			if(id == rent_holder[a]){
				rent_holder.splice(a, 1);
			}
		}
		if(rent_holder.length == 0){
			$('#modalCart').modal('hide');		
		}
	});
	$(document).on('hidden.bs.modal', "#modalCart", function(){
		var cal_no = $('.calendar');
		var cal_holder = [];
		for(var b = 0; b < cal_no.length; b++) {
			if($('#modalCalendar'+b).attr('class') == 'modal fade calendar show') {
				cal_holder.push(b);
			}
		}
		if(cal_holder.length == 0) {
			rent_holder.splice(0, cal_no.length);	
		}
	});
	$(document).on('click', '#subBtn, #addBtn', function(){
		var id = $(this).attr('id');
		var val = $(this).val();
		var qty = $('#cart_qty'+val).val();
		var avail = $('#available'+val).val()
		if(id == 'addBtn') {
			if(qty > 0) {
				$('#subBtn').removeAttr('disabled', 'disabled');
			}
			if(qty < avail) {
				qty++;
				$('#cart_qty'+val).val(qty);	
			}
			if(qty == avail) {
				$(this).attr('disabled', 'disabled');
			}
		} else if(id == 'subBtn'){
			qty--;
			if(qty < avail) {
				$('#cart_qty'+val).val(qty);
				$('#addBtn').removeAttr('disabled', 'disabled');
			}
			if(qty == 1) {
				$(this).attr('disabled', 'disabled');
			}
		}	
	});
	$(document).on('click', '#switch_userType', function(){
		var con = confirm('Press ok to switch to user.');
		console.log(con);
		if(con == true){
			window.location.assign('shop_dashboard_2.php?user=shop');
		} else if(con == false){
			$('#switch_userType').prop('checked', 'checked');
		}	
	});
	// $(document).on('click', '.qty', function(){
	// 	var qty = this.value;
	// 	var id = parseInt(this.id);
	// 	var price = parseInt($('#'+id+'price').html());
	// 	var preTotal = qty * price;

	// 	$('#'+id+'pre-total').html(preTotal);

	// });
});

