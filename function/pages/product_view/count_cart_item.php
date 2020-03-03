<?php

include '../../connection.php';
$accNo = $_POST['accNo'];

$cart = "SELECT * FROM tbl_cart WHERE accNo = '$accNo' ";
$cart_query = mysqli_query($con, $cart);
$cart_num = mysqli_num_rows($cart_query);

echo $cart_num;

?>