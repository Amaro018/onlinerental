<?php 

include '../../../connection.php';
$count = $_POST['count'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$last_id_info = $_POST['last_id'];
$last_id_variants = array();

$test = '';

if(isset($_POST['color']) && isset($_POST['size'])){
	$size = $_POST['size'];
	$color = $_POST['color'];
	for($a = 0; $a < count($count); $a++){
		$var = "INSERT INTO tbl_item_size (item_no,qty,price,size,color) VALUES ($last_id_info,$qty[$a],$price[$a],'$size[$a]','$color[$a]')";
		mysqli_query($con, $var);
		$id = $con->insert_id;
		array_push($last_id_variants, $id);	
	}
}
else if(isset($_POST['color'])){
	$color = $_POST['color'];
	for($a = 0; $a < count($count); $a++){
		$var = "INSERT INTO tbl_item_size (item_no,qty,price,color) VALUES ($last_id_info,$qty[$a],$price[$a],'$color[$a]')";
		mysqli_query($con, $var);
		$id = $con->insert_id;
		array_push($last_id_variants, $id);	
	}
}
else if(isset($_POST['size'])){
	$size = $_POST['size'];
	for($a = 0; $a < count($count); $a++){
		$var = "INSERT INTO tbl_item_size (item_no,qty,price,size) VALUES ($last_id_info,$qty[$a],$price[$a],'$size[$a]')";
		mysqli_query($con, $var);
		$id = $con->insert_id;
		array_push($last_id_variants, $id);	
	}
} else {
	for($a = 0; $a < count($count); $a++){
		$var = "INSERT INTO tbl_item_size (item_no,qty,price) VALUES ($last_id_info,$qty[$a],$price[$a])";
		$var_query = mysqli_query($con, $var);
		if($var_query){
			$test = 'good test';
		} else {
			$test = $con->error;
		}
		$id = $con->insert_id;
		array_push($last_id_variants, $id);	
	}
}

$data = array(
	'variants'	=>	$last_id_variants,
	'info'		=>	$last_id_info,
	'test'		=>	$test
);

echo json_encode($data);

?>