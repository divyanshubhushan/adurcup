<?php
require_once("../include/membersite_config.php");
require_once("thumbncrop.inc.php"); 

$valid_exts = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$max_size = 4000* 1024; // max file size
$path = '../uploads/users/'; // upload directory

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if( ! empty($_FILES['image']) ) {
		// get uploaded file extension
		$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		// looking for format and size validity
		if (in_array($ext, $valid_exts) AND $_FILES['image']['size'] < $max_size) {
			$path = $path . uniqid(). '.' .'png';
			// move uploaded file from temp to uploads directory
			move_uploaded_file($_FILES['image']['tmp_name'], $path);
		} 
		else {
			echo 'Invalid file!';
		}
	} else {
		echo 'File not uploaded!';
	}
} else {
	echo 'Bad request!';
}

?>