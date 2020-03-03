<?php 

include '../../../connection.php';
session_start();

$output = '';
/*$shop_no =  $_SESSION['shop_no'];*/

$current_date = strtotime(date('Y-m-d'));
$current_day = date('d', $current_date);
$current_month = date('m', $current_date);

//query for top 10
$q2 = $con->query("SELECT tbl_shop.shop_no, tbl_shop.shop_name,tbl_account.status, tbl_shop_followers.shop_no FROM tbl_shop INNER JOIN tbl_shop_followers ON tbl_shop.accNo = tbl_shop_followers.accNo INNER JOIN tbl_account ON tbl_account.accNo = tbl_shop.accNo  WHERE status = 'verified';");
$r2 = mysqli_fetch_array($q2);



$output .= '
	<table class="table table-bordered text-center">
		<thead>
			<tr>
				<th>Shop Name</th>
				<th>Total Transactions</th>
				<th>Followers</th>
			</tr>
		</thead>
		<tbody>
';
while($r = mysqli_fetch_array($q2)){
$output .= '
			<tr>
				<th>'.$r2['shop_name'].'</th>
			</tr>

';
}

$output .= '
		</tbody>
	</table>
'; 

echo $output;

?>

<style>
	.table{
		color: gray;
	}
	.table thead tr th{
		border: none;
	}
	.table thead tr{
		border: 1px solid #ddd;
	}
</style>