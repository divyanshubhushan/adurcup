<?php    
    if(isset($_POST['rest_logsubmitted']))
    {


       if($fgmembersite->RestLogin())  // Rest Login
       {
                
                     header('Location: '.$_SERVER['HTTP_REFERER']);
			die; 
                
        }
       else{
       echo "


       <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Oh snap!</strong> Wrong login credentials and try submitting again.
                                </div>";

       }
      
    }
    if(isset($_POST['ad_logsubmitted']))
    {


       if($fgmembersite->AdLogin())  // Advertiser login
       {
                
                     header('Location: http://adurcup.com/aduser/index.php');  
                
        }
       else{
       echo "


       <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Oh snap!</strong> Wrong login credentials and try submitting again.
                                </div>";

       }
      
    }
    if(isset($_POST['ad_regsubmitted']))
    {

        if($fgmembersite->AdRegister())    // Advertiser register
        {
            header('Location: http://adurcup.com/?signup=success'); 
         
        }
        else{
       echo "


       <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#'' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong! Please try Again.
                                </div>";

       }
      
    }

?>