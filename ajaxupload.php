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
			$path_original = $path.'original'.$image_uniq;
			$path_cover = $path.'cover'.$image_uniq;


		
			// move uploaded file from temp to uploads directory
			move_uploaded_file($_FILES['image']['tmp_name'], $path_original);
			if($fgmembersite->DBLogin())
	        {
	            $insert_query = 'INSERT INTO images(
	                
	                rest_email,
	             	type,
	                image_path
	                )
	                values
	                (
	                "' . $fgmembersite->rest_email(). '",
	             	"cover",
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
	        $from_top = 0;
			$default_cover_width = 918;
			$default_cover_height = 276;
			// includo la classe
			//php class for image resizing & cropping
			
			// valorizzo la variabile
			$tb = new ThumbAndCrop();  
			
			// apro l'immagine
			$tb->openImg($path_original); //original cover image
			
			$newHeight = $tb->getRightHeight($default_cover_width);
			
			$tb->creaThumb($default_cover_width, $newHeight);

			$tb->setThumbAsOriginal();
			
			$tb->cropThumb($default_cover_width, 276, 0, $from_top);
			
			
			$tb->saveThumb($path_cover); //save cropped cover image
			
			$tb->resetOriginal();
			
			$tb->closeImg();
			$prr_cover = 'uploads/users/cover'.$image_uniq;
			$prr_original = 'uploads/users/original'.$image_uniq;
			echo "
                                       	<div class='page-wrapper'>
                                        <div class='timeline-header-wrapper'>

                                            <div class='cover-container'>
                                                <div class='cover-wrapper'>
                                                    <img src='$prr_cover' alt='Cropped Image'>
                                                    <div class='cover-progress'>
                                                    </div>
                                                </div>
                                
                                                <div class='cover-resize-wrapper'>
                                                    <img src='$prr_original' alt='Original Image'>
                                                    <div class='drag-div' align='center'>Drag to reposition</div>
                                                    <div class='cover-progress'></div>
                                                </div>

                                                <div class='timeline-statistics-wrapper, row'>
                                                        <ul class='nav nav-tabs'>
                                                        <li class='statistic active' style='width:25%;border:1px solid #08c;text-align:center;border-radius:10px 0 0 10px;overflow:hidden'><a href='#profile' data-toggle='tab'>Profile</a></li>   
                                                             <li class='statistic' style='width:25%;border:1px solid #08c;text-align:center;overflow:hidden' ><a href='#previous' data-toggle='tab'>Previous Orders</a></li>
                                                             <li class='statistic' style='width:25%;border:1px solid #08c;text-align:center'><a href='#photos' data-toggle='tab'>Design Center</a></li>
                                                            <li class=' statistic' style='width:25%;border:1px solid #08c;text-align:center;border-radius:0 10px 10px 0' ><a href='#order' data-toggle='tab'>Order Now</a></li>
                                                            
                                                           
                                                                                             
                                                        </ul>
                                                </div>

                                                 <div class='float-right span35'>
                                                        <div class='timeline-buttons cover-resize-buttons'>
                                                            <br>
                                                            <table border='0' width='200' cellspacing='0' cellpadding='0' class='float-right' >
                                                                    <tr>
                                                                <td align='center' valign='middle'>
                                                                    <a onclick='saveReposition();'>Save</a>
                                                                </td>
                                                                <td align='center' valign='middle'>
                                                                    <a onclick='cancelReposition();'>Cancel</a>
                                                                </td>
                                                                </tr>
                                                            </table>
                                                            <form class='cover-position-form hidden' method='post'>
                                                                <input class='cover-position' name='pos' value='0' type='hidden'>
                                                            </form>
                                                        </div>
                                                        
                                                        <div class='timeline-buttons default-buttons'>
                                                            <br>
                                                            <table border='0' width='200' cellspacing='0' cellpadding='0' class='float-right' >
                                                            <tr>
                                                            
                                                            <img style='display:none' id='loader' src='loader.gif' alt='Loading....'' title='Loading....' />
                                                            <form id='form' action='includes/ajaxupload.php' method='post' enctype='multipart/form-data'>
                                                                <div style='height:0px;overflow:hidden'>
                                                                    <input id='uploadImage2' type='file' accept='image/*' name='image'  onchange='submitForm2();' />
                                                                    <input id='button2' type='submit' value='Upload' style='display:none'>
                                                                </div>
                                                                <td align='center' valign='middle'>
                                                                    <a onclick='chooseFile2();'>Change</a>
                                                                </td>
                                                            </form>
                                                                <td >
                                                                    <a onclick='repositionCover();'>Reposition</a>
                                                                </td>
                                                            </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                
                                            </div>
                                          </div>
                                          </div>
                                           

                                       ";
			


	        
	        
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