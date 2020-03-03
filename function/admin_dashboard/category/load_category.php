<?php 

include '../../connection.php';
$output = '';

$cat = $con->query("SELECT * FROM tbl_category");
if($cat){
	while($cat_row = mysqli_fetch_array($cat)){
		$output .= '
			<tr>
				<td>'.$cat_row['category_name'].'</td>
				<td>'.$cat_row['category_size'].'</td>
				<td>'.$cat_row['category_color'].'</td>
			</tr>		
		';	
	}
	
} else {
	echo $con->error;
}

echo $output;

?>