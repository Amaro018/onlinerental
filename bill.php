<?php 

include 'function/connection.php';
session_start();

$output = '';
$current_date = date('Y-m-d');
$current_day = date('d');
$current_month = date('m');
$current_year = date('Y');

$q = $con->query("SELECT start_date FROM tbl_account WHERE accNo = 69");
$r = mysqli_fetch_array($q);

$day_start_date = strtotime($r['start_date']);
$day_of_billing = date('d', $day_start_date);
$billing_month = strtotime("- 1 month");
echo date('m', $billing_month);


//$start = strtotime($r['start_date']);
//$current = strtotime($date);
//$total = $start - $current;
//$bayaran = $start;
//<h3>'.$date.'</h3>
//$ceil = ceil(($bayaran-time())/60/60/24);

$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 month", $startdate);
}


$year_leap = 0;//$current_year % 4;

if($year_leap == 0){
	if($current_month =='03'){
		$sample = strtotime('m',$current_month);
		$current_month2 = strtotime('+1 month' , $sample);
		$dd = date('Y-m-d', $current_month2);
		// $current_month = date('m');
	}

	echo "year is leap";

}
else{

	echo "year is not leap";
}


if ($current_day == $day_of_billing)
{
	//insert data

	//echo 3000;
}

$output .= '

<h3>'.$billing_month.'</h3>
<h3>'.$current_day.'</h3>
<h3>hello '.$current_month.'</h3>
<h3>hello '.$current_month2.'</h3>
<h3>hello '.$dd.'</h3>
';

echo $output;
?>
