<?php 

include '../../connection.php';
$shop_no = $_POST['shop_no'];
$accNo = $_POST['accNo'];

$delete = "SELECT * FROM tbl_shop WHERE shop_no = '$shop_no' ";
$delete_query = mysqli_query($con, $delete);
$delete_num = mysqli_num_rows($delete_query);
$delete_row = mysqli_fetch_array($delete_query);

if($delete_num != 0){
	$file = '../../../up/'.$delete_row['shop_img'];
	unlink($file);
}

if($_FILES["file"] != '') {

	$file = $_FILES['file'];

	$name = $file['name'];
	$size = $file['size'];
	$tmp_name = $file['tmp_name'];
	$error = $file['error'];
	$type = $file['type'];

	$fileExt = explode('.', $name);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActualExt, $allowed)){
		if($error === 0){
			if($size < 2000000){
				// $fileNameNew = uniqid('', true).$shop_no.".".$fileActualExt;

				$fileNameNew = $accNo.uniqid('', true).$shop_no.".".$fileActualExt;
				$fileDestination = '../../../up/'.$fileNameNew;
				move_uploaded_file($tmp_name, $fileDestination);

				$update = "UPDATE tbl_shop SET shop_img = '$fileNameNew' WHERE shop_no = '$shop_no' ";
				mysqli_query($con, $update); 

			} else {
				echo 'your file is too big';
			}
		} else {
			echo 'there was an error uploading your file';
		}
	} else {
		echo 'you cannot upload this file';
	}
}


?>