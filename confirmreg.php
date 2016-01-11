<?php
	 require_once("include/membersite_config.php");
	 if(isset($_GET['code']))
	{
	  if($fgmembersite->ConfirmZone())
	  {
	       echo '<div>Your account is now active. You may now <a href="login">Log in</a></div>';
	  }
	}
	 
?>