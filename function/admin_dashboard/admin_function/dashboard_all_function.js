$(document).ready(function () {
	dashboard_body();
	load_billing_modals();

	function dashboard_body() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/dashboard_body.php',
			success: function (res) {
				$('#admin_dashboard').html(res);
				body_transaction();
			}
		});
	}

	function body_transaction() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/dashboard_body/body_transaction.php',
			success: function (res) {
				$('#body_transaction').html(res);
			}
		});
	}
	/*jun*/
	function admin_bodytransaction_manage_renter() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/dashboard_body/admin_bodytransaction_manage_renter.php',
			success: function (res) {
				$('#admin_dashboardbody_manage_renter').html(res);
			}
		});
	}
	$(document).on('click', '#mg_shop', function () {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/admin_manage_shop_function.php',
			success: function (res) {
				$('#admin_dashboard').html(res);
			}
		});
	})
	$(document).on('click', '#mg_renter', function () {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/admin_manage_renter_function.php',
			success: function (res) {
				$('#admin_dashboard').html(res);
			}
		});
	})

		$(document).on('click', '#mg_suspend_shop', function () {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/Shop Suspension/Shop_suspend.php',
			success: function (res) {
				$('#admin_dashboard').html(res);
			}
		});
	})
	//jj

	// $(document).on('click', '#mg_pendingRenter', function(){
	// 	$.ajax({
	// 		method: 'post',
	// 		url: 'function/admin_dashboard/dashboard/Pending_request/renter_pending_request.php',
	// 		success: function(res){
	// 			$('#admin_dashboard').html(res);
	// 		}
	// 	});	
	// })

	$(document).on('click', '#mg_modal', function () {
		$('#view_modal').modal();

	})
	item_management_modals();

	function item_management_modals() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/maanage_account_modal.php',
			success: function (res) {
				$('#mg_modal').html(res);
				//$('#view_modal').modal('show');
			}
		});
	}

	$(document).on('click', '#mg_renter_issue', function () {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/dashboard/Renter Issue/admin_card_renter_issue.php',
			success: function (res) {
				$('#admin_dashboard').html(res);
			}
		});
	})



	$(document).on('click', '.mga-id', function () {
		alert(this.id);
	})

	$(document).on('click', '#admin_icon_msg .fa-stack, #shop_icon_notif .fa-stack', function () {
		// var count = parseInt($(this).attr('data-count'));

		// var a = count + 1;
		// $(this).attr('data-count', a);

	});
	// setInterval(function(){
	// 	alert('hey');
	// }, 10000);
});





// document.getElementById('button').addEventListener('submit', load_this);

// function load_this(){
// 	fetch('function/shop_dashboard/dashboard/dashboard_body/body_transaction.php')
// 	.then((res) => res.text())
// 	.then((data) => console.log(data))
// }

function show_pending_shops() {
	$.ajax({
		method: 'post',
		url: 'function/admin_dashboard/dashboard/Pending_request/shop_pending_request2.php',
		success: function (data) {
			$('#shop_pending_request').remove();
			$('#admin_dashboard').html(data);
		}
	});
}

function show_pending_renter() {
	$.ajax({
		method: 'post',
		url: 'function/admin_dashboard/dashboard/Pending_request/renter_pending_request.php',
		success: function (data) {
			$('#renter_pending_request').remove();
			$('#admin_dashboard').html(data);
		}
	});
}

function accept_shop(x) {
	Swal.fire({
		title: 'Are you sure?',
		text: "Shop account will be accepted",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.value) {
			var shop_no = $('#shopNo_pending' + x).val();
			var accNo = $('#accNo_pending' + x).val();
			$.ajax({
				method: 'post',
				url: 'function/admin_dashboard/dashboard/Pending_request/shop_pending_request_accept.php',
				data: {
					shop_no: shop_no,
					accNo: accNo
				},
				success: function (data) {
					n = JSON.parse(data);
					console.log(n);
					show_pending_shops();
					Swal.fire(
						'Accepted!',
						'Shop account has been accepted',
						'success'
					)
				}
			});
		}
	})
}

function accept_renter(x) {
	Swal.fire({
		title: 'Are you sure?',
		text: "Renter account will be accepted",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.value) {
			var status_no = $('#statusNo_pending' + x).val();
			var accNo = $('#accNo_pending' + x).val();
			$.ajax({
				method: 'post',
				url: 'function/admin_dashboard/dashboard/Pending_request/renter_pending_request_accept.php',
				data: {
					status_no: status_no,
					accNo: accNo
				},
				success: function (data) {
					n = JSON.parse(data);
					console.log(n);
					show_pending_renter();
					Swal.fire(
						'Accepted!',
						'Renter account has been accepted',
						'success'
					)
				}
			});
		}
	})
}

/*BILLING*/
function billing() {
	$.ajax({
		method: 'post',
		url: 'function/admin_dashboard/dashboard/admin_manage_billing.php',
		success: function (res) {
			$('#admin_dashboard').html(res);
		}
	});
}

function load_billing_modals() {
	$.ajax({
		method: 'post',
		url: 'function/admin_dashboard/dashboard/modal_billing.php',
		success: function (res) {
			$('#modal_billing').html(res);
		}
	});
}

function view_shop_billing(x) {
	$('#modal_cont').remove();
	var modal = "<div id='modal_cont'></div>";
	$('#billing_data').append(modal);
	var shop_no = $('#shop_no_billing' + x).val();
	$.ajax({
		method: 'post',
		url: 'function/admin_dashboard/dashboard/modal_billing_data.php',
		data: {
			shop_no: shop_no
		},
		success: function (data) {
			$('#modalBilling').modal();
			$('#modal_cont').append(data);
			SYS_tab(1);
			get_billing_datas(x);
		}
	});
}

function SYS_tab(x) {
	$('#tab1').hide();
	$('#tab2').hide();
	if (x == 1) {
		$('#tab1').fadeIn();
		$('#tab2').hide();
		$('#ta1').attr("class", "active");
		$('#ta2').attr("class", "");
	} else if (x == 2) {
		$('#tab1').hide();
		$('#tab2').fadeIn();
		$('#ta1').attr("class", "");
		$('#ta2').attr("class", "active");
	}
}

function get_billing_datas() {
	var shop_no = $('#shop_no_hdn').val();
	var date = $('#pay_date_billing').val();
	$.ajax({
		method: 'post',
		url: 'function/admin_dashboard/dashboard/get_billing_datas.php',
		data: {
			shop_no: shop_no,
			date: date
		},
		success: function (data) {
			n = JSON.parse(data);
			var amount_due = n.amount_due;
			var amount_due_o = n.amount_due_o;
			var total_count = n.total_count;
			$('#total_transactions_count').val(total_count);
			$('#amount_due_text').text(amount_due);
			$('#original_due').val(amount_due_o);
		}
	});
}

function save_payment() {
	Swal.fire({
		title: 'Are you sure?',
		text: "Payment will be saved",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.value) {
			var ref_no = $('#reference_no').val();
			var payment_amount = $('#payment_amount').val();
			var shop_no = $('#shop_no_hdn').val();
			var original_due = $('#original_due').val();
			var pay_date_billing = $('#pay_date_billing').val();
			$.ajax({
				method: 'post',
				url: 'function/admin_dashboard/dashboard/save_payment.php',
				data: {
					ref_no: ref_no,
					payment_amount: payment_amount,
					shop_no: shop_no,
					original_due: original_due,
					pay_date_billing: pay_date_billing
				},
				success: function (data) {
					n = JSON.parse(data);
					console.log(n);
					get_billing_datas();
					$('#reference_no').val("");
					$('#payment_amount').val("");
					Swal.fire(
						'Accepted!',
						'Payment successful!',
						'success'
					)
				}
			});
		}
	})
}