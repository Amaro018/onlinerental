<?php 

include '../../connection.php';
session_start();

$accNo = $_SESSION['accNo'];
$output = '';

$notif = "SELECT * FROM tbl_user_notifications WHERE accNo = '$accNo' ";
$notif_query = mysqli_query($con, $notif);
$notif_num = mysqli_num_rows($notif_query);

if($notif_num != 0) {
	$output .= '
		<a class="dropdown-item text-justify">
			<small>You have '.$notif_num.' notifications</small>
			<span class="badge badge-pill badge-primary">View all</span>
		</a>
		<div class="dropdown-divider"></div>
	';
	while($notif_row = mysqli_fetch_array($notif_query)) {
		if($notif_row['user_notif_status'] == 0) {
			$bgColor = 'rgba(0, 123, 255, 0.3)';
		}
		$tr = "SELECT * FROM tbl_transaction_log WHERE transaction_no = '$notif_row[2]' ";
		$tr_query = mysqli_query($con, $tr);
		$tr_row = mysqli_fetch_array($tr_query);

		$reg = "SELECT * FROM tbl_indreg WHERE accNo = '$tr_row[2]' ";
		$reg_query = mysqli_query($con, $reg);
		$reg_row = mysqli_fetch_array($reg_query);

		$output .= '
			<a href="#" class="dropdown-item py-1 m-0" style="background-color: '.$bgColor.'; border-bottom: 1px solid white; font-size: 14px;">
				<img src="images/avatar1.png" alt="default" style="border-radius:50%;" width="50rem">
				<strong>'.$reg_row['fname'].' '.$reg_row['lname'].'</strong>
				request an order of item# '.$tr_row['item_no'].' with a quantity of '.$tr_row['rent_quantity'].'
			</a>
		';
	}
} else {
	$output .= 'no data';
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$data = array(
	'output'		=>	$output,
	'count'			=>	$notif_num
);

echo json_encode($data);

?>