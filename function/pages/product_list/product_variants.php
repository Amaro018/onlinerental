<?php 

include '../../connection.php';
$output = '';

$category = array();
$category_array = array();

$cat = $con->query("SELECT * FROM tbl_category");
while($cat_row = mysqli_fetch_array($cat)){
	array_push($category_array, $cat_row['category_no']);
}

$size = array();
$size_array = array('Small','Xsmall','Medium','Large','Xlarge');

$color = array();
$color_array = array('Red','Orange','Yellow','Green','Blue','Indigo','Violet','Black');

$item = "SELECT * FROM tbl_item";
$item_query = mysqli_query($con, $item);
$item_num = mysqli_num_rows($item_query);

$var = "SELECT * FROM tbl_item_size";
$var_query = mysqli_query($con, $var);

if($item_num != 0){
	while($item_row = mysqli_fetch_array($item_query)){
		for($a = 0; $a < count($category_array); $a++){
			if($category_array[$a] == $item_row['category_no']){
				array_push($category, $item_row['category_no']);
				array_splice($category_array, $a, 1);
			}
		}
	}
	$output .= '
		<div class="col-xl-12 col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card text-secondary">
				<div class="card-header text-truncate lead">
					Category
				</div>
				<div class="card-body text-truncate" id="category_var">';
				for($a = 0; $a < count($category); $a++){
					$category_name = $con->query("SELECT category_name FROM tbl_category WHERE category_no = '$category[$a]' ");
					$category_name_row = mysqli_fetch_array($category_name);
					$output .= '
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" value="'.$category[$a].'" id="category_check'.$category[$a].'" name="category_check">
							<label class="custom-control-label" for="category_check'.$category[$a].'">'.$category_name_row['category_name'].'</label>
						</div>
					';
				}
	$output .= '
				</div>
			</div>
		</div>
	';
	while($var_row = mysqli_fetch_array($var_query)){
		for($a = 0; $a < count($size_array); $a++){
			if($size_array[$a] == trim($var_row['size'])){
				array_push($size, trim($var_row['size']));
				array_splice($size_array, $a, 1);
			}
		}
		for($a = 0; $a < count($color_array); $a++){
			if($color_array[$a] == trim($var_row['color'])){
				array_push($color, trim($var_row['color']));
				array_splice($color_array, $a, 1);
			}
		}
	}
	$output .= '
		<div class="col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12">
			<div class="card mt-xl-2 mt-lg-0 mt-md-0 mt-sm-0 text-secondary">
				<div class="card-header text-truncate lead">
					Size
				</div>
				<div class="card-body text-truncate" id="size_var">';
				for($a = 0; $a < count($size); $a++){
					$output .= '
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="size_check'.$a.'" name="size_check">
							<label class="custom-control-label" for="size_check'.$a.'">'.$size[$a].'</label>
						</div>
					';
				}
	$output .= '
				</div>
			</div>
		</div>
		<div class="col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12">
			<div class="card mt-xl-2 mt-lg-0 mt-md-0 mt-sm-0 text-secondary">
				<div class="card-header text-truncate lead">
					Color
				</div>
				<div class="card-body text-truncate" id="color_var">';
				for($a = 0; $a < count($color); $a++){
					$output .= '
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="color_check'.$a.'" name="color_check">
							<label class="custom-control-label" for="color_check'.$a.'">'.$color[$a].'</label>
						</div>
					';
				}
	$output .= '
				</div>
			</div>
		</div>
	';
} else {

}

$data = array(
	'output'	=>	$output,
	'category'	=>	$category,
	'size'		=>	$size,
	'color'		=>	$color
);

echo json_encode($data);


?>

