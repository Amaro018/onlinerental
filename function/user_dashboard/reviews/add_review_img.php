<?php 

include '../../connection.php';

$file = $_FILES['file'];
$last_id = $_POST['last_id'];

$uploaded = array();
$failed = array();

$allowed = array('jpg', 'jpeg', 'png');

foreach ($file['name'] as $position => $file_name) {
	$file_tmp = $file['tmp_name'][$position];
	$file_size = $file['size'][$position];
	$file_error = $file['error'][$position];

	$file_ext = explode('.', $file_name);
	$file_actual_ext = strtolower(end($file_ext));

	if(in_array($file_actual_ext, $allowed)) {
		if($file_error === 0) {
			if($file_size <= 2097152) {
				$file_name_new = uniqid('', true) . '.png';
				$file_destination = '../../../upload/' . $file_name_new;

				if(move_uploaded_file($file_tmp, $file_destination)) {
					$uploaded[$position] = $file_destination;

					$image = "INSERT INTO tbl_product_rate_reviews_img VALUES('','$last_id','$file_name_new')";
					mysqli_query($con, $image);

				} else {
					$failed[$position] = "[{$file_name}] failed to upload.";
				}
			} else {
				$failed[$position] = "[{$file_name}] is to large.";
			}
		} else {
			$failed[$position] = "[{$file_name}] errored with code '{$file_error}'.";
		}
	} else {
		$failed[$position] = "[{$file_name}] file extension '{$file_actual_ext}' is not allowed.";
	}
}

if(!empty($uploaded)) {
	print_r($uploaded);
}

if(!empty($failed)) {
	print_r($failed);
}

?>