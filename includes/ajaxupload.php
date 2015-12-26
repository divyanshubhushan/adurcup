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

			if($fgmembersite->DBLogin())
	        {
	            $emailll = $_SESSION['rest_email'];
		        $qry = "SELECT * from images where rest_email='$emailll' and type = 'cover' ";
		        
		        $result = mysql_query($qry);
		        
		        if(!$result || mysql_num_rows($result) <= 0)
		        {
		        	move_uploaded_file($_FILES['image']['tmp_name'], $path_original);
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
			        mysql_query( $insert_query);
			      
		        }
		        else
		        {
		        	move_uploaded_file($_FILES['image']['tmp_name'], $path_original);
		        	$row = mysql_fetch_assoc($result);
		        	$delete_previous_cover = '../uploads/users/cover'.$row['image_path'];
		        	$delete_previous_original = '../uploads/users/original'.$row['image_path'];
		        	unlink($delete_previous_original);
		        	unlink($delete_previous_cover);
	        
	        		$qry = "UPDATE images SET image_path='$image_uniq' WHERE  rest_email='$emailll' and type = 'cover'";
		        	mysql_query( $qry);
			       

			         
		        }
	        }          
	        

	        
		
			// move uploaded file from temp to uploads directory
		
	        $from_top = 0;
			$default_cover_width = 1300;
			$default_cover_height = 620;
			// includo la classe
			//php class for image resizing & cropping
			
			// valorizzo la variabile
			$tb = new ThumbAndCrop();  
			
			// apro l'immagine
			$tb->openImg($path_original); //original cover image
			
			$newHeight = $tb->getRightHeight($default_cover_width);
			
			$tb->creaThumb($default_cover_width, $newHeight);

			$tb->setThumbAsOriginal();
			
			$tb->cropThumb($default_cover_width, 620, 0, $from_top);
			
			
			$tb->saveThumb($path_cover); //save cropped cover image
			
			$tb->resetOriginal();
			
			$tb->closeImg();
			$prr_cover = '../uploads/users/cover'.$image_uniq;
			$prr_original = '../uploads/users/original'.$image_uniq;
			echo "
                  
                                               <div class='page-wrapper'>
                                        <div class='timeline-header-wrapper'>

                                            <div class='cover-container'>
                                                <div class='cover-wrapper'>
                                                    <img src='$prr_cover' alt='Cropped Image'>
                                                    <div class='cover-progress'>
                                                    </div>
                                                </div>
                                               <nav class='navbar navbar-inverse navbar-static-top' style='margin-bottom: 0px;background:#000;opacity:0.8;border:none;top:398px'>
								                    <div class='container'>
								                        <p style='float:left;margin:10px 15px 10px 0;'>
								                            <img id='circle' src='../img/1920/purple.jpg'>
								                        </p>
								                        <p style='float:left;color:white;margin:9px 0 10px 0;'>
								                            <span style='font-size:30px'>T'Pot Cafe</span></br>
								                            7, Opposite Kotak Mahindra Bank, Main Shivalik Road, Bhegampur</br>
								                            Malviya Nagar, New Delhi, INDIA - 208016
								                        </p>
								                        <p style='color:white;margin:9px 0 10px 0;float:right' align='center'>
								                            <span style='font-size:42px;'>3.9</span></br>
								                            <img src='../img/stars.png'>
								                        </p>
								                    </div>
								                </nav>
                                
                                                <div class='cover-resize-wrapper'>
                                                    <img src='$prr_original' alt='Original Image'>
                                                    <div class='drag-div' align='center'>Drag to reposition</div>
                                                    <div class='cover-progress'></div>
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
                                                            
                                                            <img style='display:none' id='loader' src='../loader.gif' alt='Loading....'' title='Loading....' />
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