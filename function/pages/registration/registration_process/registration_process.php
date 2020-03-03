<?php 

include '../../../connection.php';
$reg_form = $_POST['reg_form'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$suffix = $_POST['suffix'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$st = $_POST['st'];
$brgy = $_POST['brgy'];
$city = $_POST['city'];
$zone = $_POST['zone'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$password = $_POST['password'];
$pass = password_hash($password, PASSWORD_DEFAULT);
if($reg_form != 'renter_form'){
	$user_type = 'userShop';	
} else {
	$user_type = 'user';
}
$date = date('Y-m-d');

$ind = $con->query("INSERT INTO tbl_indreg (fname,mname,lname,suffix,gender,contact,bday,user_img) VALUES ('$fname','$mname','$lname','$suffix','$gender',$contact,'$birthdate','avatar1.png') ");
$last_id = $con->insert_id;
$acc = $con->query("INSERT INTO tbl_account (accNo,email,pword,rpword,userType,acc_status,start_date,status) VALUES ($last_id,'$email','$pass','$pass','$user_type',0,'$date','pending') ");
$address = $con->query("INSERT INTO tbl_address (accNo,st,zone,brgy,city,address_type) VALUES ($last_id,'$st','$zone','$brgy','$city','default') ");

if($user_type != 'user'){
	$shopname = $_POST['shopname']; 
	$shopemail = $_POST['shopemail']; 
	$shopcontact = $_POST['shopcontact']; 
	$shopdescription = $_POST['shopdescription']; 
	$shopst = $_POST['shopst']; 
	$shopzone = $_POST['shopzone']; 
	$shopbrgy = $_POST['shopbrgy']; 
	$shopcity = $_POST['shopcity']; 

	$shop = $con->query("INSERT INTO tbl_shop (accNo,shop_name,shop_email,shop_contact,shop_desc,shop_a_st,shop_a_zone,shop_a_brgy,shop_a_city,shop_img) VALUES ($last_id,'$shopname','$shopemail',$shopcontact,'$shopdescription','$shopst','$shopzone','$shopbrgy','$shopcity','avatar1.png') ");

	if($shop){
		echo 'good';
	} else {
		echo $con->error;
	}
}


?>