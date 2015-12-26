<?php
	
	include("../include/db_config.php");
	
	$value = $_REQUEST['value'];
	$row_id = $_REQUEST['edit_id']  ;
	$column = $_REQUEST['column'] ;

	switch ($column) {
		case "0":
	       	$columname = "id";
	        break;
	    case "1":
	       	$columname = "restaurant_name";
	        break;
	    case "2":
	        $columname = "owner_name";
	        break;
	    case "3":
	        $columname = "email";
	        break;
	    case "4":
	        $columname = "password";
	        break;
	    case "5":
	        $columname = "contact";
	        break;
	    case "6":
	       	$columname = "outlets";
	        break;
	    case "7":
	        $columname = "address";
	        break;
	    case "8":
	        $columname = "cost_for_2";
	        break;
	    case "9":
	        $columname = "service";
	        break;
	    case "10":
	        $columname = "sampling";
	        break;
	    case "11":
	       	$columname = "resampling";
	        break;
	    case "12":
	        $columname = "ordering";
	        break;
	    case "13":
	        $columname = "last_call";
	        break;
	    case "14":
	        $columname = "last_conversation";
	        break;
	    case "15":
	       	$columname = "remark";
	        break;
	    

	    
	}


	
	$query=" UPDATE adurzone SET $columname ='$value' WHERE id='$row_id' ";
	mysql_query($query);

	echo $value;
?>