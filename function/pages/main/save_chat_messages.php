<?php 

include '../../connection.php';
$msg = $_POST['message'];
$accNo = $_POST['accNo'];
$shop_no = $_POST['shop_no'];
$date = date('Y-m-d h:i:sa');
$status = 0;

// $chat = "INSERT INTO tbl_chat_message (accNo,shop_no,message,sender,receiver,sent_date,msg_status) VALUES ('$accNo','$shop_no','$msg','$accNo','$shop_no','$date','$status') ";
$chat = "INSERT INTO tbl_chat_message (`accNo`, `shop_no`, `message`, `sender`, `receiver`, `sent_date`, `msg_status`) VALUES ('$accNo', '$shop_no', '$msg', '$accNo', '$shop_no', '$date', $status) "; 
if(mysqli_query($con, $chat)){
	echo 'Data Inserted';	
} else {
	echo mysqli_error($con);
}

$last_id = $con->insert_id;

$output = '
	<div class="px-3 py-1">
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-7" align="right">
				<span id="'.$last_id.'" class="text-break p-2 text-white text-left remove_msg" style="cursor: pointer; font-size: 0.8rem; display: inline-block; background-color: rgba(220, 53, 69, 0.8); border-top-right-radius: 0.8rem; border-top-left-radius: 0.8rem; border-bottom-left-radius: 0.8rem;">
					'.$msg.'
				</span>
			</div>
		</div>
	</div>	
';

echo $output;

?>