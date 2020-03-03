<?php

include '../../connection.php';

$color = $_POST['color'];
$size = $_POST['size'];
$price = $_POST['price'];
$type_of_ship = $_POST['type_of_ship'];

$item_no = $_POST['item_no'];
$accNo = $_POST['accNo'];

$cart = "INSERT INTO tbl_cart values('','$accNo','$item_no','$price','$size','$color','$type_of_ship') ";
mysqli_query($con, $cart);

echo 'ok';

?>