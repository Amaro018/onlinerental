<?php

include '../../connection.php';

$q = $con->query("SELECT `amount` FROM `tbl_payment_setup`;");
$r = mysqli_fetch_all($q);
$count = mysqli_num_rows($q);
$payment = 0;
if($count>0) {
    $payment = $r[0][0];
}

$payment = number_format($payment, '2');

echo json_encode($payment);