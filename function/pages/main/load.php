<?php 

include '../../connection.php';

$accNo = $_POST['accNo'];
$output = '';
$arr = array();
$shoplist_no = array(); 

//pass shop no to array
$count = "SELECT * FROM tbl_shop";
$query = mysqli_query($con, $count);
while($row = mysqli_fetch_array($query)){
	array_push($arr, $row['shop_no']);
}

$msg = "SELECT * FROM tbl_chat_message WHERE sender = '$accNo' ";
$msg_query = mysqli_query($con, $msg);
$msg_num = mysqli_num_rows($msg_query);

if($msg_num != 0){
	while($msg_row = mysqli_fetch_array($msg_query)){
		for($a = 0; $a < count($arr); $a++){
			if($arr[$a] == $msg_row['receiver']){
				$shop = "SELECT * FROM tbl_shop WHERE shop_no = '$arr[$a]' ";
				$shop_query = mysqli_query($con, $shop);
				$shop_row = mysqli_fetch_array($shop_query);

				$max = "SELECT * FROM tbl_chat_message WHERE shop_no = '$shop_row[0]' AND accNo = '$accNo' ORDER BY msg_no DESC";
				$max_query = mysqli_query($con, $max);
				$max_row = mysqli_fetch_array($max_query);

				$d = strtotime($msg_row['sent_date']);
				$date = date('h:i:sa', $d);

				array_push($shoplist_no, $arr[$a]);
				array_splice($arr, $a, 1);
				$output .= '
					<li class="nav-item" id="'.$shop_row['shop_no'].'" style="border-bottom: 0.1px solid #ccc">
						<a class="nav-link text-secondary">
							<div class="row no-gutters">
								<div class="col-md-3" align="center" style="vertical-align: middle">
									<div style="width: 40px; height: 40px; align-items: center; display: flex; border: 1px solid #ddd; border-radius: 50%; overflow: hidden;">
										<span style="display:inline-block; height:100%; vertical-align:middle;"></span>
										<img src="up/'.$shop_row['shop_img'].'" class="w-100" style="vertical-align:middle;">
									</div>		
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div style="font-size: 12px; " id="side_name" class="text-truncate">'.$shop_row['shop_name'].'</div>
										</div>
										<div class="col-md-12">
											<div style="font-size: 10px; font-style: italic;" id="last_msg">
												'.$max_row['message'].'
											</div>
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
	'output'		=>	$output,
	'shoplist_no'	=>	$shoplist_no		
);

echo json_encode($data);

?>