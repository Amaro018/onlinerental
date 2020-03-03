<?php

include '../../connection.php';
$size = $_POST['size'];
$color = $_POST['color'];
$category = ucfirst($_POST['category']);


$cat = $con->query("INSERT INTO tbl_category (category_name, category_size, category_color) VALUES ('$category', $size, $color)");
if($cat){
	echo 'data inserted';
} else {
	echo $con->error;
}

 ?>