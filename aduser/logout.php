<?PHP
	require_once("server/membersite_config.php");

	$fgmembersite->LogOut();
 

   if(isset($_SERVER['HTTP_REFERER'])) 
   {
		 header('Location: '.$_SERVER['HTTP_REFERER']);  
	} 
	else 
	{
		 header('Location: http://www.adurcup.com');  
	}
?>

