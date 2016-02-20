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
	       	$columname = "ProductID";
	        break;
	    case "2":
	        $columname = "title";
	        break;
	    case "4":
	        $columname = "category";
	        break;
	    case "5":
	       	$columname = "shape";
	        break;
	    case "6":
	        $columname = "material";
	        break;
	    case "7":
	        $columname = "quality";
	        break;
	    case "8":
	        $columname = "size_D";
	        break;
	    case "10":
	        $columname = "size_A";
	        break;
	    case "11":
	       	$columname = "size_L";
	        break;
	    case "12":
	        $columname = "volume";
	        break;
	    case "13":
	        $columname = "manufacture";
	        break;
	    case "14":
	        $columname = "description_1";
	        break;
	    case "15":
	       	$columname = "description_2";
	        break;
	    case "16":
	       	$columname = "specification";
	        break;
	    case "17":
	       	$columname = "design";
	        break;
	    case "18":
	       	$columname = "type";
	        break;
	    case "19":
	       	$columname = "our_price";
	        break;

	    case "20":
	       	$columname = "moq";
	        break;
	    case "21":
	       	$columname = "active";
	        break;
	    case "22":
	       	$columname = "image_src";
	        break;
	    

	    
	}


	$query=" UPDATE updatedtables SET $columname ='$value' WHERE id='$row_id' ";
	mysql_query($query);

	echo $value;
?>