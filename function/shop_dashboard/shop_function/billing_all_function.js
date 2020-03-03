let count = 0;

$(document).ready(function(){
	billing();
	function billing(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/billing/billing.php',
			success: function(res){
				$('#shop_billing').html(res);
			}
		})
	}
	modal();
	function modal(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/billing/modal.php',
			success: function(res){
				$('#modal').html(res);
			}
		})
	}
	// $(document).on('click', '.btn-action-view', function(){
	// 	let btn_id = this.id;
	// 	$.ajax({
	// 		method: 'post',
	// 		url: 'function/shop_dashboard/billing/billing_data.php',
	// 		data: {tr_no : btn_id},
	// 		success: function(res){
	// 			console.log(res);
	// 			$('#billing_data').html(res);
	// 			$('#modalBilling').modal();
	// 		}
	// 	})
	// })
	$(document).on('click', '.btn-action-view', function(){
		let btn_id = this.id;
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/billing/potang_billing_data.php',
			data: {tr_no : btn_id},
			success: function(res){
				$('#potang_billing_data').html(res);
				$('#potang_modal').modal();
			}
		})
	})
	$(document).on('click', '.partial', function(){
		let btn_id = this.id;
		// $('#modalBilling').modal('hide');
		$('#potang_modal').modal('hide');
		$('#modalPayment').modal();
	})
	$(document).on('hidden.bs.modal', '#modalPayment', function(){
		$('#potang_modal').modal();
	})
	// $(document).on('click', '#partial_btn', function(){
	// 	let total = $('#total').val();
	// 	console.log(total);
	// 	let val = $('#partial_value').val();
	// 	let balance = total - val;
	// 	let date = new Date();
	// 	if(val != 0 && val <= 10000){
	// 		$('#modalPayment').modal('hide');
			// $('#potang_modal').modal();
	// 		$('#partial_td').html(val+'.00 <i class="fa fa-plus-square text-success partial" style="cursor: pointer;"></i>');
	// 		$('#partial_date').html(date.toDateString());
	// 		$('#partial_balance').html(balance+'.00');
	// 	}
	// 	else {
	// 		if(val > 10000){
	// 			alert('value must below or equal to 10,0000');
	// 		} else{
	// 			alert('input a valid value');
	// 		}
	// 	}
	// })
	$(document).on('click', '#partial_btn', function(){
		let val = $('#partial_value').val();
		let tr = $('#transaction_no').val();
		let total = $('#total').val();
		let balance = total - val;

		if(val != 0 && val <= 10000 && balance >= 0){
			$.ajax({
				method: 'post',
				url: 'function/shop_dashboard/billing/add_payment.php',
				data: {partial : val, tr_no : tr, balance : balance},
				dataType: 'json',
				success: function(res){
					console.log(res);
					$('#modalPayment').modal('hide');
					$('#partial_table').append(res.output);
					$('#no_payment').hide();
					$('#total').val(res.balance);
				} 
			})
			// $('#modalPayment').modal('hide');
			// let output = `
			// 	<tr>
			// 		<td id="partial_td${count}">${val}</td>
			// 		<td id="partial_date${count}">${date.toDateString()}</td>
			// 		<td id="partial_balance${count}">${balance}</td>
			// 		<td>
			// 			<button type="button" class="btn btn-outline-danger">
			// 				<i class="fa fa-trash"></i>
			// 			</button>
			// 			<button type="button" class="btn btn-outline-info">
			// 				<i class="fa fa-pen"></i>
			// 			</button>
			// 		</td>
			// 	</tr>
			// `;
			// $('#partial_table').append(output);
			// $('#no_payment').hide();
			// $('#total').val(balance);
			// count++;
		} else {
			if(val > 10000){
				alert('value must below or equal to 10,0000');
			} else if(balance < 0){
				alert('overpay');
			} else{
				alert('input a valid value');
			}	
		}
	})
})