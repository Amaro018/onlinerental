	show_admin_shop_manage_account();
	function show_admin_shop_manage_account() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/account_management/manage_shops.php',
			success: function (res) {
				$('#admin_shop_account_management').html(res);
			}
		});
	}

	show_admin_renter_manage_account();
	function show_admin_renter_manage_account() {
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/account_management/manage_rentee.php',
			success: function (res) {
				$('#admin_rentee_account_management').html(res);
			}
		});
	}