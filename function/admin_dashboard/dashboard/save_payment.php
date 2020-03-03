<?php
include '../../connection.php';

$ref_no = $_POST['ref_no'];
$payment_amount = $_POST['payment_amount'];
$shop_no = $_POST['shop_no'];
$original_due = $_POST['original_due'];
$pay_date_billing = $_POST['pay_date_billing'].'-00';
$date = date('Y-m-d H:i:s');
$msg = "";
$str = "";
$status = 0;

if($payment_amount == $original_due) {
    $status = 2;
} elseif ($payment_amount < $original_due) {
    $status = 1;
}

$q = $con->query("SELECT `billing_no` FROM `tbl_billing_payments` WHERE DATE_FORMAT(`month_year`,'%Y-%m-%d')='$pay_date_billing' AND `shop_no`='$shop_no'");
$r = mysqli_fetch_array($q);
$billing_no = $r['billing_no'];
$cnt = mysqli_num_rows($q);
if($cnt>0) {
    //update
    $str .= "UPDATE `tbl_billing_payments` SET `amount`=`amount`+'$payment_amount',`payment_date`='$date',`reference_no`='$ref_no' WHERE `billing_no`='$billing_no';";
} else {
    //insert
    $str .= "INSERT INTO `tbl_billing_payments` VALUES('','$shop_no','$ref_no','$date','$payment_amount','$status','$pay_date_billing');";
}

mysqli_query($con, $str);

echo json_encode($msg);