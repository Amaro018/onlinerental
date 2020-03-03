<?php
include '../../../connection.php';

$shop_no = $_POST['shop_no'];
$accNo = $_POST['accNo'];
$msg = "";

// $q = $con->query("SELECT `status_no` FROM `tbl_status` AS a, `tbl_account` AS b WHERE b.`accNo`='$accNo' AND a.`email`=b.`email`;");
// $r = $q->fetch_array();
// $status_no = $r['status_no'];

// $str = "UPDATE `tbl_status` SET `pending`='0',`verified`='1' WHERE `status_no`='$status_no';";
$str = "UPDATE `tbl_account` SET status='verified' WHERE `accNo`='$accNo';";
mysqli_query($con, $str);

echo json_encode($msg);