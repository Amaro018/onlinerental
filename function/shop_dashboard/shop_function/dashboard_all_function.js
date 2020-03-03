let pickup = [];
let deliver = [];
let unreturn = [];
let followers = 0;
let tr_no = [];
let detail = [];
let month = [
	'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July',
	'August',
	'September',
	'October',
	'November',
	'December'];
let color_arr = [
	window.chartColors.orange,
	window.chartColors.blue,
	window.chartColors.red,
	window.chartColors.green,
	window.chartColors.yellow];

$(document).ready(function(){
	window.onload = function(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/load_chart2.php',
			data: {shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				let rate = res.star_sum / res.num;
				let percent = (res.star_sum / res.num) * 100 / 5;
				detail.push({
					label: rate+' rating',
					borderColor: window.chartColors.blue,
					backgroundColor: window.chartColors.blue,
					data: [percent],
					fill: false,
				})
			}
		})
	}
	function createConfig(position) {
		return {
			type: 'bar',
			data: {
				labels: month,
				datasets: detail
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Shop Monthly Ratings'
				},
				tooltips: {
					position: position,
					mode: 'index',
					intersect: false,
				},
			}
		};
	}
	function chart(){		
		let container = document.querySelector('#chart');
		['nearest'].forEach(function(position) {
			let div = document.createElement('div');
			div.classList.add('chart-container');

			let canvas = document.createElement('canvas');
			div.appendChild(canvas);
			container.appendChild(div);

			let ctx = canvas.getContext('2d');
			let config = createConfig(position);
			new Chart(ctx, config);
		});
	}
	dashboard_body();
	function dashboard_body(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/dashboard_body.php',
			success: function(res){
				$('#shop_dashboard').html(res);
				// detalye.splice(0, detalye.length);
				tobe_pickup();
				tobe_deliver();
				shop_followers();
			}
		});
	}
	function body_transaction(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/dashboard_body/body_transaction.php',
			success: function(res){
				$('#body_transaction').html(res);
			}
		});
	}
	function popular(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/dashboard_popular.php',
			data: {shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				console.log(res);
				$('#popular').html(res.output);
				chart();
			}
		})
	}
	// user type change
	// $(document).on('click', '#switch_userType', function(){
	// 	var con = confirm('Press ok to switch to user.');
	// 	console.log(con);
	// 	if(con == true){
	// 		window.location.assign('user_cart.php?user=user');
	// 	} else if(con == false){
	// 		$(this).removeAttr('checked');
	// 	}	
	// });
	function tobe_pickup(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/dashboard_body/tobe_pickup.php',
			data: {shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				for(let a = 0; a < res.date_arrange.length; a++){
					pickup.push(res.date_arrange[a]);
				}
				if(res.tobe_pickup > 1){
					$('#pickup').html(res.tobe_pickup+' items');
				} else {
					$('#pickup').html(res.tobe_pickup+' item');
				}
			}
		})
	}
	function tobe_deliver(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/dashboard_body/tobe_deliver.php',
			data: {shop_no : shop_no},
			dataType: 'json',
			success: function(res){
				for(let a = 0; a < res.date_arrange.length; a++){
					deliver.push(res.date_arrange[a]);
				}
				if(res.tobe_deliver > 1){
					$('#deliver').html(res.tobe_deliver+' items');
				} else {
					$('#deliver').html(res.tobe_deliver+' item');
				}
			}
		})
	}
	function shop_followers(){
		$.ajax({
			method: 'post',
			url: 'function/shop_dashboard/dashboard/dashboard_body/shop_followers.php',
			data: {shop_no : shop_no},
			success: function(res){
				followers = res;
				$('#shop_followers').html(res+ ' user');
				popular();
			}
		})	
	}
	$(document).on({
		mouseenter: function(){
			$(this).css('color','rgba(9, 15, 126, 0.8)');
		},
		mouseleave: function(){
			$(this).css('color','black');
		},
		click: function(){
			let card_id = this.id;
			if(card_id == 'pickup'){
				for(let a = 0; a < pickup.length; a++){
					tr_no.push(pickup[a]);
				}
			}
			else if(card_id == 'deliver'){
				for(let a = 0; a < deliver.length; a++){
					tr_no.push(deliver[a]);
				}
			}
			else if(card_id == 'unreturn'){
				for(let a = 0; a < unreturn.length; a++){
					tr_no.push(unreturn[a]);
				}
			} 
			else{
				tr_no.push(followers);
			}
			if(tr_no.length != 0){
				$.ajax({
					method: 'post',
					url: 'function/shop_dashboard/dashboard/dashboard_table.php',
					data: {tr_no : tr_no, card_id : card_id, shop_no : shop_no},
					success: function(res){
						$('#shop_dashboard').html(res);
						tr_no.splice(0, tr_no.length);
						pickup.splice(0, pickup.length);
						deliver.splice(0, deliver.length);
						unreturn.splice(0, unreturn.length);
					}
				})
			}
			else {
				if(card_id != 'unreturn' && card_id != 'shop_followers'){
					alert('no items to be '+card_id);
				} 
				else if(card_id == 'unreturn'){
					alert('no items '+card_id);
				} else {
					alert('no '+card_id);
				}
			}
		}
	}, '.mini-card')
	$(document).on({
		mouseenter: function(){
			$(this).css('boxShadow','0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)');
		},
		mouseleave: function(){
			$(this).css('boxShadow','none');
		}
	}, '.mini-card-box')
	$(document).on('click', '#back_btn', function(){
		dashboard_body();
	})
	$(document).on('click', '.btn-action', function(){
		let conf = confirm('are you sure');
		if(conf == true){
			let btn_id = this.id;
			$.ajax({
				method: 'post',
				url: 'function/shop_dashboard/dashboard/dashboard_body/action.php',
				data: {tr_no : btn_id},
				success : function(res){
					console.log(res);
					$('button#'+btn_id).text(res)
					.removeClass('btn-outline-success')
					.addClass('btn-outline-danger')
					.attr('disabled', 'disabled');
				}
			})	
		}
	})


	$(document).on('click', '#shop_icon_msg .fa-stack, #shop_icon_notif .fa-stack', function(){
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