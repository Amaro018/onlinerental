<?php

include '../../connection.php';

$shop_no = $_POST['shop_no'];
$date = $_POST['date'];
$percentage = 0.10;

//get total transactions
$q = $con->query("SELECT SUM((a.`rent_quantity`*b.`price`)*$percentage) AS `amount_due` FROM `tbl_transaction_log` AS a,`tbl_item_size` AS b, `tbl_shop` AS c WHERE c.`shop_no`='$shop_no' AND DATE_FORMAT(a.`rent_date`,'%Y-%m')='$date' AND a.`item_no`=b.`item_no` AND a.`rent_color`=b.`color` AND a.`rent_size`=b.`size`;");
$r = mysqli_fetch_array($q);
$amount_due = $r['amount_due'];

$q1 = $con->query("SELECT a.`transaction_no` FROM `tbl_transaction_log` AS a, `tbl_shop` AS b WHERE b.`shop_no`='$shop_no' AND DATE_FORMAT(a.`rent_date`,'%Y-%m')='$date'");
$cnt = mysqli_num_rows($q1);

//get total_payment
$q2 = $con->query("SELECT `amount` FROM `tbl_billing_payments` WHERE `shop_no`='$shop_no' AND DATE_FORMAT(`month_year`,'%Y-%m')='$date'");
$r2 = mysqli_fetch_array($q2);
$amount_paid = $r2['amount'];

$remaining_balance = $amount_due - $amount_paid;

$a['amount_due'] = number_format($remaining_balance,'2');
$a['amount_due_o'] = $remaining_balance;
$a['total_count'] = $cnt;
echo json_encode($a);