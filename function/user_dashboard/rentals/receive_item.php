<?php 

include '../../connection.php';
$accNo = $_POST['accNo'];
$output = '';

$tr = "SELECT * FROM tbl_transaction_log WHERE accNo = '$accNo' AND transaction_status = 'pending' ";
$tr_query = mysqli_query($con, $tr);
$tr_num = mysqli_num_rows($tr_query);

if($tr_num != 0){
	$output .= '
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Tr#</th>
					<th>Item Name</th>
					<th>Size</th>
					<th>Color</th>
				</tr>
			</thead>
			<tbody>
	';
	while($tr_row = mysqli_fetch_array($tr_query)){
		$item = "SELECT * FROM tbl_item WHERE item_no = '$tr_row[1]' ";
		$item_query = mysqli_query($con, $item);
		$item_row = mysqli_fetch_array($item_query);
		$output .= '
				<tr>
					<td>'.$tr_row['transaction_no'].'</td>
					<td>'.$item_row['item_name'].'</td>
					<td>'.$tr_row['rent_size'].'</td>
					<td>'.$tr_row['rent_color'].'</td>
				</tr>
		';
	}
	$output .= '
			</tbody>
		</table>
	';
} 
else{
	$output .= 'no data';
}	

echo $output;

?>

