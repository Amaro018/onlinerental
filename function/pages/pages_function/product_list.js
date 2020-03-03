let category_check = [];
let size_check = [];
let color_check = [];

let page = '';
// let per_page = '';

let detail = ['category_check', 'size_check', 'color_check'];

$(document).ready(function(){
	product_variants();
	function product_variants(){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_list/product_variants.php',
			dataType: 'json',
			success: function(res){
				$('#variants').html(res.output);
				let h = $('#category_var').innerHeight();
				$('#size_var').css({
					'height' : h,
					'max-height' : h,
					'overflow' : 'auto'
				});
				$('#color_var').css({
					'height' : h,
					'max-height' : h,
					'overflow' : 'auto'
				});
			}
		})
	}
	product_images();
	function product_images(category, size, color, page){
		$.ajax({
			method: 'post',
			url: 'function/pages/product_list/product_images.php',
			data: {category : category, size : size, color : color, page : page},
			dataType: 'json',
			success: function(res){
				console.log(res);
				$('#images').html(res.output);
				$('#pages').html(res.output2);
				rating(res.item_no, res.item_sum, res.item_count);
			}
		})	
	}
	function rating(item_no, item_sum, item_count){
		let percentage_total = 0;
		for(let a = 0; a < item_no.length; a++){
			if(item_count[a] != 0){
				percentage_total = (item_sum[a] / 5) * 100 / item_count[a] + '%';
				$('#'+item_no[a]+' .stars-inner').css('width', percentage_total);
			}
		}
	}	
	$(document).on('click', '.pagination_link', function(){
		page = this.id;
		product_images(category_check, size_check, color_check, page);
		// per_page = $('#number_per_page').val();
	})
	// $(document).on('change', '#number_per_page', function() {
	// 	per_page = this.value;
	// 	page = $('.pagination_link').attr("id");
	// 	product_images(category_check, size_check, color_check, page, per_page);
	// });
	$(document).on('change', ':checkbox', function(){
		let name = this.name;
		let txt = $(this).siblings().text();
		let cat_num = this.value;

		if(this.checked == true){
			if(detail[0] == name){
				category_check.push(cat_num);						
			} 
			else if(detail[1] == name){
				size_check.push(txt);						
			}
			else if(detail[2] == name){
				color_check.push(txt);						
			}
			product_images(category_check, size_check, color_check, page);
		} else {
			if(detail[0] == name){
				for(let a = 0; a < category_check.length; a++){
					if(category_check[a] == cat_num){
						category_check.splice(a, 1);
					}
				}						
			}
			else if(detail[1] == name){
				for(let a = 0; a < size_check.length; a++){
					if(size_check[a] == txt){
						size_check.splice(a, 1);
					}
				}						
			}
			else if(detail[2] == name){
				for(let a = 0; a < color_check.length; a++){
					if(color_check[a] == txt){
						color_check.splice(a, 1);
					}
				}						
			}
			product_images(category_check, size_check, color_check, page);
		}
	})
})