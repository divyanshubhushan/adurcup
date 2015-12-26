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
			$image_uniq =  uniqid(). '.' .$ext;
			$upload_image = $path.'image'.$image_uniq;
			$upload_image_thumbmnail =  $path.'thumbnail'.$image_uniq;


			if($fgmembersite->DBLogin())
	        {
	            $emailll = $_SESSION['rest_email'];
		       
		        	move_uploaded_file($_FILES['image']['tmp_name'], $upload_image);
		        	$insert_query = 'INSERT INTO images(
	                rest_email,
	             	type,
	                image_path
	                )
	                values
	                (
	                "' . $fgmembersite->rest_email(). '",
	             	"image",
	                "' . $image_uniq . '"
	                )';      
			        if(!mysql_query( $insert_query))
			        {
						 $rolando = 'alert("Something went wrong...try again")';
						echo '<script language="javascript">';
						echo $rolando;
						echo '</script>';         
			        }  
	        }          
	        

	        
		
			// move uploaded file from temp to uploads directory
		
	        $from_top = 0;
			$default_cover_width = 100;
			$default_cover_height = 100;
			// includo la classe
			//php class for image resizing & cropping
			
			// valorizzo la variabile
			$tb = new ThumbAndCrop();  
			
			// apro l'immagine
			$tb->openImg($upload_image); //original cover image
			
			$newHeight = $tb->getRightHeight($default_cover_width);
			
			$tb->creaThumb($default_cover_width, $newHeight);

			$tb->setThumbAsOriginal();
			
			$tb->cropThumb($default_cover_width, $newHeight, 0, $from_top);
			
			
			$tb->saveThumb($upload_image_thumbmnail); //save cropped cover image
			
			$tb->resetOriginal();
			
			$tb->closeImg();

			$thumb_src = "uploads/users/thumbnail".$image_uniq;

			echo "<img src='$thumb_src' style='width:100px;height:100px;margin-left:10px'>";
			
	        
	        
		} 
		else {
			echo 'Invalid file!';
		}
	} else {
		echo 'File not uploaded!';
	}

} 
else {
	echo 'Bad request!';
}



?>