<?php
require_once("include/membersite_config.php");
if(isset($_POST['rest_resetsubmitted']))
{


       echo $fgmembersite->RestResetPass(); 
  

}
if(isset($_POST['ad_resetsubmitted']))
{


       if(!$fgmembersite->AdResetPass())  // take order
       {

          echo "
         <div class='alert alert-danger' style='margin-left:50px;margin-right:50px'>
        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                                    <strong>Sorry!</strong> Something went wrong. Please try again later.
                                </div>";

      }

}

if(isset($_POST['password']) && isset($_GET['code']) && isset($_GET['email'])){

echo $fgmembersite->updatePassword($_GET['code'],$_GET['email']);

}

?>