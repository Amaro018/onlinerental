<?php
include '../../../connection.php';

$status_no = $_POST['status_no'];
$accNo = $_POST['accNo'];
$msg = "";

$str = "UPDATE `tbl_account` SET status='verified' WHERE `accNo`='$accNo';";
mysqli_query($con, $str);

echo json_encode($msg);