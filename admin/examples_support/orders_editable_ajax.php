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
	       	$columname = "order_id";
	        break;
	    case "2":
	        $columname = "firstname";
	        break;
	    case "4":
	        $columname = "amount";
	        break;
	    case "5":
	       	$columname = "title";
	        break;
	    case "6":
	        $columname = "qty";
	        break;
	    case "7":
	        $columname = "price";
	        break;
	    case "8":
	        $columname = "thumbnail";
	        break;
	    case "10":
	        $columname = "ad_option";
	        break;
	    case "11":
	       	$columname = "email";
	        break;
	    case "12":
	        $columname = "phone";
	        break;
	    case "13":
	        $columname = "address1";
	        break;
	    case "14":
	        $columname = "zipcode";
	        break;
	    case "15":
	       	$columname = "status";
	        break;
	    

	    
	}


	$query=" UPDATE cod_orders SET $columname ='$value' WHERE id='$row_id' ";
	mysql_query($query);

	echo $value;
?>