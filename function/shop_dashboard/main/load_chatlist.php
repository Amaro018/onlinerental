<?php 

include '../../connection.php';

$shop_no = $_POST['shop_no'];
$output = '';
$arr = array();

//pass shop no to array
$count = "SELECT * FROM tbl_account WHERE userType = 'user' ";
$query = mysqli_query($con, $count);
while($row = mysqli_fetch_array($query)){
	array_push($arr, $row['accNo']);
}

$msg = "SELECT * FROM tbl_chat_message WHERE receiver = '$shop_no' ";
$msg_query = mysqli_query($con, $msg);
$msg_num = mysqli_num_rows($msg_query);

if($msg_num != 0){
	while($msg_row = mysqli_fetch_array($msg_query)){
		for($a = 0; $a < count($arr); $a++){
			if($arr[$a] == $msg_row['sender']){
				$account = "SELECT * FROM tbl_account WHERE accNo = '$arr[$a]' ";
				$account_query = mysqli_query($con, $account);
				$account_row = mysqli_fetch_array($account_query);

				$max = "SELECT * FROM tbl_chat_message WHERE shop_no = '$shop_no' AND accNo = '$account_row[0]' ORDER BY msg_no DESC";
				$max_query = mysqli_query($con, $max);
				$max_row = mysqli_fetch_array($max_query);

				$d = strtotime($msg_row['sent_date']);
				$date = date('h:i:sa', $d);
				
				array_splice($arr, $a, 1);
				$output .= '
					<li class="nav-item" id="'.$account_row['accNo'].'" style="border-bottom: 0.1px solid #ccc">
						<a class="nav-link text-secondary">
							<div class="row no-gutters">
								<div class="col-md-3" align="center" style="vertical-align: middle">
									<div style="width: 40px; height: 40px; align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%; overflow: hidden;">
										<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
										<img src="images/avatar1.png" class="w-100" style="vertical-align:middle;">
									</div>		
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<label style="font-size: 12px;" id="side_name">'.$account_row['email'].'</label>
										</div>
										<div class="col-md-12">
											<label style="font-size: 10px; font-style: italic;" id="last_msg">
												'.$max_row['message'].'
											</label>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<label style="font-size: 12px;">
										'.$date.'
									</label>
								</div>
							</div>
						</a>
					</li>
				';	
			}
		}
	}
}

$data = array(
	'output'	=>	$output,
	'arr'		=>	$arr		
);

echo json_encode($data);

?>