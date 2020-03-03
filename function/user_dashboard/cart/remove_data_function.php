<?php

include '../../connection.php';

$id = json_decode($_POST['id'], true);

for($a = 0; $a < count($id); $a++){
	$cart= "DELETE FROM tbl_cart WHERE  cart_no = '$id[$a]'";
	mysqli_query($con, $cart);	
}

echo 'success'; 

?>