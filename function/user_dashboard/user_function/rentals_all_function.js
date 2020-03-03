$(document).ready(function(){
	load_rentals_data();
	function load_rentals_data(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/rentals/rentals_fulldata.php',
			data: {accNo : accNo},
			success: function(res){
				$('#rentals_data').html(res);
				receive_item();
				waiting_list();
			}
		});	
	}
	function receive_item(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/rentals/receive_item.php',
			data: {accNo : accNo},
			success: function(res){
				$('#receive_item').html(res);
			}
		})
	}
	function waiting_list(){
		$.ajax({
			method: 'post',
			url: 'function/user_dashboard/rentals/waiting_list.php',
			data: {accNo : accNo},
			success: function(res){
				$('#waiting_list').html(res);
			}
		})
	}
});