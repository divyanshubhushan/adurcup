<?php
require_once("../include/membersite_config.php");

if(isset($_POST['pos']))
{


	if(!$fgmembersite->DBLogin())
        {
            echo "Database login failed!";
            return false;
        }          
        $emailll = $_SESSION['rest_email'];
        $qry = "SELECT image_path from images where rest_email='$emailll' ";
        
        $result = mysql_query($qry,$fgmembersite->connection);
        
        if(!$result || mysql_num_rows($result) <= 0)
        {
        	echo "Cannot open Original Image"; 
        }
        $row = mysql_fetch_assoc($result);
        
        
        $cover_url = '../uploads/users/cover'.$row['image_path'];
        $original_url = '../uploads/users/original'.$row['image_path'];


		$from_top = abs($_POST['pos']);
		$default_cover_width = 918;
		$default_cover_height = 276;
			// includo la classe
	require_once("thumbncrop.inc.php"); //php class for image resizing & cropping
	
	// valorizzo la variabile
	$tb = new ThumbAndCrop();
	
	// apro l'immagine
	$tb->openImg($original_url); //original cover image
	
	$newHeight = $tb->getRightHeight($default_cover_width);
	
	$tb->creaThumb($default_cover_width, $newHeight);

	$tb->setThumbAsOriginal();
	
	$tb->cropThumb($default_cover_width, 276, 0, $from_top);
	
	
	$tb->saveThumb($cover_url); //save cropped cover image
	
	$tb->resetOriginal();
	
	$tb->closeImg();
	$data['status'] = 200;
	$data['url'] ='uploads/users/cover'.$row['image_path'];
	echo json_encode($data , JSON_UNESCAPED_SLASHES);
	
}
?>