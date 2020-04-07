<?php 

include '../../connection.php';
$str = "";
$str1 = "";

$q = $con->query("SELECT a.`shop_no`,a.`shop_name`,b.`start_date`,b.`status`,a.`accNo` FROM `tbl_shop` AS a,`tbl_account` AS b WHERE a.`accNo`=b.`accNo`;");
$r = mysqli_fetch_all($q);
$cnt = mysqli_num_rows($q);
for($x=0;$x<$cnt;$x++) {
    $shop_no = $r[$x][0];
    $shop_name = $r[$x][1];
    $date = $r[$x][2];
    $status = $r[$x][3];
    $accNo = $r[$x][4];
    $statusclass="";

    if($status=="verified") {
        $statusclass = "text-success";
    }elseif($status=="pending") {
        $statusclass = "text-warning";
    }elseif($status=="blocked") {
        $statusclass="text-danger";
    }

    if($date=='0000-00-00' && $status=="verified") {
        $date = "NOT SET";
    }

    if($date=='0000-00-00') {
        $date = "-";
    }

    $status = strtoupper($status);

    $str1 .= "
        <tr>
            <td>
            <input type='hidden' id='hdn_accNo$x' value='$accNo'/>
            <input type='hidden' id='hdn_shop_no$x' value='$shop_no'/>
            <input type='hidden' id='hdn_date$x' value='$date'/>
            <input type='hidden' id='hdn_status$x' value='$status'/>
            <div style='display:none;' id='hdn_shop_name$x'>$shop_name</div>
            $shop_no</td>
            <td>$shop_name</td>
            <td><span>$date</span></td>
            <td><b class='$statusclass'>$status</b></td>
            <td><button class='btn btn-primary btn-block' onclick='shop_setup_edit($x);'>Edit</button></td>
        </tr>
    ";
}

$str .= '
<div class="container mt-4">
<div class="card" style="border-radius: 1rem; overflow: hidden;">
    <div class="card-header text-white" style="background-color: rgba(9, 15, 126, 0.8)">Shop Setup</div>
          <div class="container-fluid bg-white pt-3" style="border-radius: 5px; overflow: hidden;">
             <div id="body_header" class="mb-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Shop No</td>
                            <td>Shop Name</td>
                            <td>Date Approved</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        '.$str1.'
                    </tbody>
                </table>
              </div>
          </div>
</div>
</div>
';

echo $str;