<?php

include 'function/connection.php';

$query = "SELECT * FROM tbl_item ORDER BY item_no DESC";

$statement = $con->prepare($query);

$ouput = '<div class="row">';

if($statement->execute())
{
	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		$output .= '
			<div class="col-md-2" style="margin-bottom:16px;">
				<img src="data:image/png;base64,'.base64_encode($row['item_photo_name']).'" class="img-thumbnail" />
			</div>
		';
	}
}	

$output .='</div>';

echo $output;

?>