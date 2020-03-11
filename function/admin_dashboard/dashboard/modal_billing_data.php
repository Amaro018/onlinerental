<?php

include '../../connection.php';

$output = "";
$str = "";
$shop_no = $_POST['shop_no'];
//get tbl_shop data
$q = $con->query("SELECT * FROM `tbl_shop` WHERE `shop_no`='$shop_no';");
$r = mysqli_fetch_array($q);
$shop_name = $r['shop_name'];
$shop_desc = $r['shop_desc'];

//get shops transactions
$q1 = $con->query("SELECT a.`transaction_no`,a.`rent_date`,d.`fname`,d.`mname`,d.`lname`,d.`suffix`,b.`item_name`,c.`payment_status`,SUM(c.`amount`) AS `amount` FROM `tbl_transaction_log` AS a,`tbl_item` AS b,`tbl_payments` AS c,`tbl_indreg` AS d, `tbl_shop` AS e WHERE e.`shop_no`='$shop_no' AND a.`item_no`=b.`item_no` AND a.`transaction_no`=c.`tid` AND a.`accNo`=d.`accNo`;");
$cnt = mysqli_num_rows($q1);
$r1 = mysqli_fetch_assoc($q1);
for($x=0;$x<$cnt;$x++) {
$tid = $r1['transaction_no'];
$fname = $r1['fname'];
$mname = $r1['mname'];
$lname = $r1['lname'];
$suffix = $r1['suffix'];
$name = $lname . " ". $suffix . ", "  . $fname . " " . $mname;
$item_name = $r1['item_name'];
$payment_status = $r1['payment_status'];
$amount = $r1['amount'];
$total_amount = number_format($amount,'2');
$status="";
$rent_date = $r1['rent_date'];

if($payment_status==0) {
    $status = "<span class='text-default'>Unpaid</span>";
}elseif($payment_status==1) {
    $status = "<span class='text-warning'>Partial</span>";
}elseif($payment_status==2) {
    $status = "<span class='text-success'>Fully Paid</span>";
}

if($tid!==NULL) {
    $str .= "
        <tr>
            <td>$tid</td>
            <td>$name</td>
            <td>$item_name</td>
            <td>$rent_date</td>
            <td>$status</td>
            <td>$total_amount</td>
        </tr>
    ";
}
}

$date_a = date('Y-m',strtotime(date('Y-m-d').'-1 month'));
$output .= "
<b>".$shop_name."</b>
<p>".$shop_desc."</p>
<input type='hidden' id='shop_no_hdn' value='".$shop_no."'/>
<hr/>
<ul class='nav nav-tabs'>
  <li role='presentation' id='ta1' onclick='SYS_tab(1)'><a href='#'>Billing Collection</a></li>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <li role='presentation' id='ta2' onclick='SYS_tab(2)'><a href='#'>Transactions</a></li>
</ul>
<br/>
<div id='tab2'>
    <table class='table table-bordered table-striped' id='shops_transactions_table'>
        <thead>
            <th>Transaction No</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Date</th>
            <th>Status</th>
            <th>Amount</th>
        </thead>
        <tbody>
        $str
        </tbody>
    </table>
</div>




<div id='tab1'>
   <div class='row' align='left'>
    <div class='col-sm-6'>
        <label for='pay_date_billing'><b>Payment for the month of </b></label>
        <input type='month' onchange='get_billing_datas();' class='form-control' name='pay_date_billing' id='pay_date_billing' value='$date_a'/>
    </div>
    <div class='col-sm-6'>
        <label><b>Total transactions for selected month </b></label>
        <input type='text' id='total_transactions_count' readonly class='form-control'/>
    </div>
   </div>
   <hr/>

   <div class='row'>
    <div class='col-sm-12'>
        <h5>Amount Due: &#8369;&nbsp;<span id='amount_due_text'></span></h5>
        <input type='hidden' id='original_due'/>
    </div>
   </div>
   <hr/>

   <div class='row'>
    <div class='col-sm-12 text-center'>
        <h4>PAYMENT</h4>
    </div>
   </div>

   <div class='row'>
    <div class='col-sm-6'>
        <label>Reference No</label>
        <input type='text' id='reference_no' class='form-control' placeholder='A12-B34-C56 OR LEAVE EMPTY'/>
    </div>
    <div class='col-sm-6'>
        <label>Amount</label>
        <input type='number' id='payment_amount' class='form-control' placeholder='0.00'/>
    </div>
   </div>
    <hr/>
   <div class='row'>
    <div class='col-sm-12'>
        <button onclick='save_payment();' class='btn btn-primary btn-block'>Save</button>
    </div>
   </div>
</div>
";

echo $output;