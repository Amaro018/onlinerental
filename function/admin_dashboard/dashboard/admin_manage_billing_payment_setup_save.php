<?php

include '../../connection.php';

$payment = $_POST['payment'];
$sql = "";
$id = "";
$msg = "";

$q = $con->query("SELECT `id` FROM `tbl_payment_setup`;");
$r = mysqli_fetch_all($q);
$count = mysqli_num_rows($q);
if($count==0) {
    //insert
    $sql .= "INSERT INTO `tbl_payment_setup` VALUES('','$payment','1');";
} else {
    //update
    $id = $r[0][0];
    $sql .= "UPDATE `tbl_payment_setup` SET `amount`='$payment' WHERE `id`='$id' AND `remark`='1';";
}

if($msg=="") {
    mysqli_query($con, $sql);
}

echo json_encode($msg);