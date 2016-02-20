<?php
	include("db_config.php");
	require_once("include/membersite_config.php");
	/*if(!$fgmembersite->CheckLogin())
		{
		    $fgmembersite->RedirectToURL("index.php");
		    exit;
		}*/
	if(isset($_POST['submit']))
    {
		/*$proid = $_POST['proid'];
	    $proname = $_POST['proname'];
	    $category = $_POST['category'];
	    $desc = $_POST['desc'];
	    $minquan = $_POST['minquan'];
	    $incost = $_POST['incost'];
	    $priceunit = $_POST['priceunit'];
	    $cust = $_POST['cust'];
	    $color = $_POST['color'];
	    $type = $_POST['type'];
	    $sizes = $_POST['sizes'];
	    $delivery = $_POST['delivery'];
	    $unitdesc = $_POST['unitdesc'];
	    $add = $_POST['add'];
	    $image_src = $_POST['image_src'];

	    $query = "INSERT INTO disposables_details (id,
                item_name,
                category,
                description,
                min_quantity,
                initial_cost,
                price_per_unit,
                customizable,
                color,
                image_src,
                types,
                Sizes,
                delievery,
                unit_description,
                advertisement) VALUES ('$proname', '$category', '$desc', '$minquan','$incost','$priceunit','$cust','$color','$image_src','$type','$sizes','$delivery','$unitdesc','$add')";
        mysql_query($query);
        echo "data is saved";*/

         $itemvars = array('proid' => $_POST['proid'],'proname' => $_POST['proname'],'brandid'=> $_POST['brandid'],
         					'category'=>$_POST['category'],'shape'=>$_POST['shape'],'material'=>$_POST['material'],'color'=>$_POST['color'],'qual'=>$_POST['qual'],'sized'=>$_POST['sized'],'sizea'=>$_POST['sizea'],'sizel'=>$_POST['sizel'],'vol'=>$_POST['vol'],'manu'=>$_POST['manu'],'desc1'=>$_POST['desc1'],'desc2'=>$_POST['desc2'],'spec'=>$_POST['spec'],'design'=>$_POST['design'],'type'=>$_POST['type'],'venprice'=>$_POST['venprice'],'oprice'=>$_POST['oprice'],'moq'=>$_POST['moq'],'act'=>$_POST['act'],'add'=>$_POST['add'],'image_src'=>$_POST['image_src']);
         						
        echo $fgmembersite->InsertItemIntoDB($itemvars);
	}
?>