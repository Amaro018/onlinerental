<?php 

include '../../connection.php';
$accNo = $_POST['accNo'];
$shop_no = $_POST['shop_no'];
$output = '';

$msg = "SELECT * FROM tbl_chat_message WHERE accNo = '$accNo' AND shop_no = '$shop_no' ";
$msg_query = mysqli_query($con, $msg);
$msg_num = mysqli_num_rows($msg_query);

$acc = "SELECT * FROM tbl_account WHERE accNo = '$accNo' ";
$acc_query = mysqli_query($con, $acc);
$acc_row = mysqli_fetch_array($acc_query);

if($msg_num != 0){
	while($msg_row = mysqli_fetch_array($msg_query)){
		// $d = DateTime::createFromFormat('Y-m-d h:i:sa',$msg_row['sent_date']);
		// $date = date('h:i:sa', $d);
		$d = strtotime($msg_row['sent_date']);
		$date = date('h:i:sa', $d);
		if($accNo == $msg_row['sender'] && $shop_no == $msg_row['receiver']){
			$output .= '
				<div class="px-3 py-1">
					<div class="row">
						<div class="col-md-2">
							<div style="width: 40px; height: 40px; align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%; overflow: hidden;">
								<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
								<img src="images/avatar1.png" class="w-100" style="vertical-align:middle;">
							</div>	
						</div>
						<div class="col-md-7">
							<span id="'.$msg_row['msg_no'].'" class="text-break p-2 text-white text-left remove_msg" style="cursor: pointer; font-size: 0.8rem; display: inline-block; background-color: rgba(9, 15, 126, 0.8); border-top-right-radius: 0.8rem; border-top-left-radius: 0.8rem; border-bottom-right-radius: 0.8rem;">
								'.$msg_row['message'].'
							</span>
							<div class="msg_date" hidden><small class="text-secondary">'.$date.'</small></div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			';	
		} 
		else if($accNo == $msg_row['receiver'] && $shop_no == $msg_row['sender']){
			$output .= '
				<div class="px-3 py-1">
					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-7" align="right">
							<span id="'.$msg_row['msg_no'].'" class="text-break p-2 text-white text-left remove_msg" style="cursor: pointer; font-size: 0.8rem; display: inline-block; background-color: rgba(253, 126, 20, 0.8); border-top-right-radius: 0.8rem; border-top-left-radius: 0.8rem; border-bottom-left-radius: 0.8rem;">
								'.$msg_row['message'].'
							</span>
						</div>
					</div>
				</div>
			';	
		} 
	}
}

$data = array(
	'output'	=>	$output,
	'msg_num'	=>	$msg_num,
	'email'		=>	$acc_row['email']
);

echo json_encode($data);

?>