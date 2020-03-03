<?php

include '../../connection.php';

$item_no = $_POST['item_no'];
$output = '';

$varQty = 0;
$varNewQty = 0;

$item = "SELECT * FROM tbl_item WHERE item_no = '$item_no' ";
$item_query = mysqli_query($con, $item);
while($item_row = mysqli_fetch_array($item_query)){
	$var = "SELECT * FROM tbl_item_size WHERE item_no = '$item_no' ";
	$var_query = mysqli_query($con, $var);
	$var_row = mysqli_fetch_array($var_query);

	$tr = "SELECT * FROM tbl_transaction_log WHERE item_no = '$item_no' AND rent_size = '$var_row[4]' AND rent_color = '$var_row[5]' ";
	$tr_query = mysqli_query($con, $tr);
	while($tr_row = mysqli_fetch_array($tr_query)){
		$varQty += $tr_row['rent_quantity'];
	}
	$varNewQty = $var_row['qty'] - $varQty;

	$cat = $con->query("SELECT category_name FROM tbl_category WHERE category_no = '$item_row[category_no]' ");
	$cat_row = mysqli_fetch_array($cat);

	$output .= '
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-9">
						<h1>'.$item_row['item_name'].'</h1>
						<div class="row">
							<div class="col-md-6">
								<div class="outer">
									<div class="inner"></div>
								</div>
								<i class="prog"></i><br>
								<small><mark>'.$cat_row['category_name'].'</mark> | </small>
							</div>
							<div class="col-md-6">
								<div class="row">
				  					<div class="col-md-12">
				  						<small class="text-danger" id="stock">Stock:'.$var_row['qty'].'</small>
				  					</div>
				  					<div class="col-md-12">
				  						<small class="text-success" id="avail">Available:'.$varNewQty.'</small>
				  					</div>
				  				</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<i class="btn fa fa-eye text-secondary" id="eye" data-toggle="tooltip" data-placement="bottom" title="Add to Eyed Item" style="font-size:28px;"></i>
						<i class="btn fa fa-share-square text-secondary" id="share" data-toggle="tooltip" data-placement="bottom" title="Share" style="font-size:28px;"></i>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
		  				<a class="navbar-brand" style="text-indent: 30px">
		    				<strong>&#8369;'.number_format($var_row['price'],2).'</strong>
		  				</a>
		  			</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="text-justify">
							<b class="text-primary">Description</b>
							<p style="text-indent: 50px">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
							<p>'.$item_row['item_desc'].'</p>
						</div>
						<b class="text-primary">Product Details</b>
						<ul>
							<li>
								<a>Black/Red</a>
							</li>
							<li>
								<a>Crystal like Gowns</a>
							</li>
							<li>
								<a>Smooth Fabrics</a>
							</li>
						</ul>
						<div class="container row">
							<button type="button"  class="btn col-md-4 py-3 text-white" id="modal" style="border-radius: 30px; background-color: rgba(253, 126, 20, 0.8);">Rent</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	';
}

echo $output;

?>

