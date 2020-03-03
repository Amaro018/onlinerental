<?php 

include '../../connection.php';
$output = '';
$shop_no = $_POST['shop_no'];

$shop = "SELECT * FROM tbl_shop WHERE shop_no = '$shop_no' ";
$shop_query = mysqli_query($con, $shop);
$shop_row = mysqli_fetch_array($shop_query);

$name = $shop_row['shop_name'];

$output .= '
	<li class="nav-item" id="'.$shop_no.'" style="border-bottom: 0.1px solid #ccc">
		<a class="nav-link text-secondary">
			<div class="row no-gutters">
				<div class="col-md-3" align="center" style="vertical-align: middle">
					<div style="width: 40px; height: 40px; align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%; overflow: hidden;">
						<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
						<img src="up/'.$shop_row['shop_img'].'" alt="hakdog" class="w-100" style="vertical-align:middle;">
					</div>		
				</div>
				<div class="col-md-7">
					<label style="font-size: 12px;">'.$shop_row['shop_name'].'</label>
				</div>
				<div class="col-md-2">
					<label></label>
				</div>
			</div>
		</a>
	</li>
';

$data = array(
	'output'	=>	$output,
	'name'		=>	$name
);

echo json_encode($data);

?>




