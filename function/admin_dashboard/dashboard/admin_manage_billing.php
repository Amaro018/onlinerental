<?php 
include '../../connection.php';

//get all shops (approved shop only)
$q = $con->query("SELECT tbl_shop.shop_no,tbl_shop.shop_name FROM tbl_shop INNER JOIN tbl_account ON tbl_shop.accNo = tbl_account.accNo WHERE status = 'verified';");
$r = mysqli_fetch_all($q);
$cnt = mysqli_num_rows($q);

$tbodyStr = "";
$profit = 0.00;
for($x=0;$x<$cnt;$x++) {
    $shop_no = $r[$x][0];
    $shop_name = $r[$x][1];
    
    $q1 = $con->query("SELECT SUM(`amount`) AS `profit` FROM `tbl_billing_payments` WHERE `shop_no`='$shop_no';");
    $r1 = mysqli_fetch_array($q1);
    $profit = number_format($r1['profit'],'2');

    $tbodyStr .= '
        <tr>
            <td>
            <input type="hidden" id="shop_no_billing'.$x.'" value="'.$shop_no.'"/>
            '.$shop_name.'</td>
            <td>&#8369;&nbsp;'.$profit.'</td>
            <td><button type="button" onclick="view_shop_billing('.$x.')" class="btn btn-primary text-light">View</button></td>
        </tr>
    ';
}

$output = '
<div class="container mt-4">
    <div class="card" style="border-radius: 1rem; overflow: hidden;">
        <div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Billing</div>
		      <div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
			     <div id="body_header" class="mb-3">
	               <table class="table table-bordered text-center">
                		<thead>
                			<tr>
                				<th>Shop Name</th>
                				<th>Balance</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                        <tbody>
                            '.$tbodyStr.'
                        </tbody>
		          </div>
              </div>
	</div>
</div>
';

echo $output;