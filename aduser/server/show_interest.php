<?php
	if(!isset($_SESSION)){ session_start(); }

	include("db_config.php");
	
	
	if(isset($_POST['outlet_id'])){
	/*$curl_handle=curl_init();
	curl_setopt($curl_handle,CURLOPT_URL,'https://rest.nexmo.com/sms/json?api_key=9b7f2055&api_secret=90e7bbab&from=NEXMO&to=918953440613&text=Welcome+to+Nexmo');
	curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
	curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
	$buffer = curl_exec($curl_handle);
	curl_close($curl_handle);
	if ($buffer=='SUCCESS')
	{
	  echo "SUCCESS";
	}
	else
	{
	  echo "NULL";
 	}
*/
		
		$advertiser_id = $_SESSION['ad_id'];
		$restaurant_id = $_POST['rest_id'];
		$outlet_id = $_POST['outlet_id'];
		
	    mysql_query("INSERT INTO interest_showed (advertiser_id, restaurant_id, outlet_id, status)
				VALUES ('$advertiser_id','$restaurant_id','$outlet_id','1')") or die(mysql_error());
	   

 }	
 else
 {
 	echo "its not working";
 }
	

?>	