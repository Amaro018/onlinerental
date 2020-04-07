<?php

include '../../connection.php';

$shop_no = $_POST['shop_no'];
$shop_name = $_POST['shop_name'];
$date = $_POST['date'];
$accNo = $_POST['accNo'];
$status = $_POST['status'];
$isChecked = "";
if($status=="BLOCKED") {
    $isChecked = "checked";
}

$str = "";

$str .= "
    <h3><center>$shop_name</center></h3>
    <input type='hidden' id='shop_no_setup' value='$shop_no'/>
    <input type='hidden' id='accNo_setup' value='$accNo'/>
    <div class='row'>
        <div class='col-sm-12'>
            <label form='date_approved_setup'>Date Approved</label>
            <input type='date' class='form-control' id='shop_setup_date_saved' value='$date'/>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'>
        <br/>
        <div class='form-check'>
            <input class='form-check-input' type='checkbox' value='' id='deactivate' $isChecked>
            <label class='form-check-label' for='deactivate'>
            Deactivate/Block
            </label>
        </div>
        </div>
    </div>
    <hr/>
    <div class='row'>
        <div class='col-sm-12'>
            <button class='btn btn-primary btn-block' onclick='save_shop_approve();' >Save</button>
        </div>
    </div>
";

echo $str;