<?php
	
	include("../include/db_config.php");
	
	$value = $_REQUEST['value'];
	$row_id = $_REQUEST['edit_id']  ;
	$column = $_REQUEST['column'] ;

	switch ($column) {
		case "9":
	       	$columname = "status";
	        break;
	    
	    
	}


	
	$query=" UPDATE interest_showed SET $columname ='$value' WHERE id='$row_id' ";
	mysql_query($query);

	echo $value;
?>