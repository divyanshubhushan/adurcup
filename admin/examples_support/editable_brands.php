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
	       	$columname = "name";
	        break;
	    case "2":
	        $columname = "company_name";
	        break;
	    case "3":
	        $columname = "nature_of_biz";
	        break;
	    case "4":
	        $columname = "designation";
	        break;
	    case "5":
	        $columname = "email";
	        break;
	    case "6":
	       	$columname = "contact";
	        break;
	    

	    
	}

	$query=" UPDATE advertisers SET $columname ='$value' WHERE id='$row_id' ";
	mysql_query($query);

	echo $value;
?>