<?php

include '../../connection.php';

$shop_no = $_POST['shop_no'];
$accNo = $_POST['accNo'];
$date = $_POST['date'];
$deactivate = $_POST['deactivate'];
$msg = "";
$sql = "";

$q1 = $con->query("SELECT `status` FROM `tbl_account` WHERE `accNo`='$accNo';");
$r1 = mysqli_fetch_all($q1);
$status = $r1[0][0];
if($status=="pending") {
    //approve
    $sql .= "UPDATE `tbl_account` SET status='verified',`start_date`='$date' WHERE `accNo`='$accNo';";
}elseif($status=="verified") {
    //edit start_date
    $sql .= "UPDATE `tbl_account` SET `start_date`='$date' WHERE `accNo`='$accNo';";
}

if($deactivate=='false') {
    $sql .= "UPDATE `tbl_account` SET `status`='verified' WHERE `accNo`='$accNo';";
}elseif($deactivate=='true') {
    $sql .= "UPDATE `tbl_account` SET `status`='blocked' WHERE `accNo`='$accNo';";
}

// $q = $con->query("SELECT `id` FROM `tbl_shop_setup` WHERE `shop_no`='$shop_no';");
// $r = mysqli_fetch_all($q);
// $count = mysqli_num_rows($q);
// if($count==0) {
//     //insert
//     $sql .= "INSERT INTO `tbl_shop_setup` VALUES('','$shop_no','$date','1');";
// } else {
//     //update
//     $id = $r[0][0];
//     $sql .= "UPDATE `tbl_shop_setup` SET `date_approved`='$date' WHERE `id`='$id' AND `shop_no`='$shop_no' AND `remark`='1';";
// }

if($msg=="") {
    mysqli_multi_query($con, $sql);
}

 echo json_encode($msg);