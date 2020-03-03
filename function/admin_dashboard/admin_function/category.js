$(document).ready(function(){
	category();
	function category(){
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/category/category.php',
			success: function(res){
				$('#admin_category').html(res);
			}
		})
	}
	load_category();
	function load_category(){
		$.ajax({
			method: 'post',
			url: 'function/admin_dashboard/category/load_category.php',
			success: function(res){
				$('#load_category').html(res);
			}
		})
	}
	$(document).on('click', '#add_category', function(){
		let size = $('#size')[0].checked;
		let color = $('#color')[0].checked;
		let cat = $('#category').val(); 
		if(cat != ''){
			$.ajax({
				method: 'post',
				url: 'function/admin_dashboard/category/add_category.php',
				data: {category : cat, size : size, color : color},
				success: function(res){
					alert('Category Added ' + res);
					$('#category').val('');
					$('#size')[0].checked = false;
					$('#color')[0].checked = false;
				}
			})			
		} else {
			alert('input a category');
		}
	})
})