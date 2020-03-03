<?php 

include '../../connection.php';
date_default_timezone_set("Asia/Manila");
$output = '';

$partial = $_POST['partial'];
$tr_no = $_POST['tr_no'];
$balance = $_POST['balance'];
$date = date('Y-m-d h:i:s');

$pay = $con->query("INSERT INTO tbl_billing (transaction_no, payment_status, payment_amount, payment_date, balance) VALUES ('$tr_no', 'partial', $partial, '$date', $balance)");
if($pay){
	$last_id = $con->insert_id;
	$output .= '
				<tr>
					<td id="partial_td'.$last_id.'">&#8369; '.number_format($partial, 2).'</td>
					<td id="partial_date'.$last_id.'">'.date("F jS Y", strtotime($date)).'</td>
					<td id="partial_balance'.$last_id.'">&#8369; '.number_format($balance, 2).'</td>
					<td>
						<button type="button" class="btn btn-outline-danger">
							<i class="fa fa-trash"></i>
						</button>
						<button type="button" class="btn btn-outline-info">
							<i class="fa fa-pen"></i>
						</button>
					</td>
				</tr>
			';
} else {
	echo $con->error;
}

$data = array(
	'output'		=>	$output,
	'balance'		=>	$balance
);

echo json_encode($data);
?>