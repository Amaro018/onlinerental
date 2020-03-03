<?php 

include '../../connection.php';

if($_FILES["file"] != '') {
	$accNo = $_POST['accNo'];
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
				$fileNameNew = uniqid('', true).$accNo.".".$fileActualExt;
				$fileDestination = '../../../up/'.$fileNameNew;
				move_uploaded_file($tmp_name, $fileDestination); 

				echo $fileNameNew;
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