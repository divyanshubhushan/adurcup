<?php
include('includes/dbfunctions.php');
require_once("include/membersite_config.php");
$db = new DB_FUNCTIONS();
if($fgmembersite->CheckRestLogin())
{ 
   $loggedin = 1;
}
else{
   $loggedin = 0;
}
$bcheck = $_REQUEST['bcheck'];
$scheck = $_REQUEST['scheck'];
$price_range = $_REQUEST['price_range'];

$WHERE = array(); $inner = $w = '';

if(!empty($price_range)) {
	$data3 = explode('-',$price_range);
	$WHERE[] = "(t1.Price between $data3[0] and $data3[1])";
}

if(!empty($bcheck)) {		
	if(strstr($bcheck,',')) {
		$data1 = explode(',',$bcheck);
		$barray = array();
		foreach($data1 as $c) {
			$barray[] = "t1.Brand = $c";
		}
		$WHERE[] = '('.implode(' OR ',$barray).')';
	} else {
		$WHERE[] = '(t1.Brand = '.$bcheck.')';
	}
}


if(!empty($scheck)) {
	if(strstr($scheck,',')) {
		$data3 = explode(',',$scheck);
		$sarray = array();
		foreach($data3 as $c) {
			$sarray[] = "t2.sizeID = $c";
		}
		$WHERE[] = '('.implode(' OR ',$sarray).')';
	} else {
		$WHERE[] = '(t2.sizeID = '.$scheck.')';
	}
	
	$inner = 'INNER JOIN tbl_productsizes AS t2 ON t1.ProductID = t2.ProductID';
}
	$w = implode(' AND ',$WHERE);
	if(!empty($w)) $w = 'WHERE '.$w;
	
	
	
	//echo "SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w";
	$query = mysql_query("SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w");
	if(mysql_num_rows($query)>0) {
		while($pro = mysql_fetch_assoc($query)) {
			$productPhoto = $db->getproductPhoto($pro['ProductID']);
		?>
		
		<a href="products/<?=$pro['ProductID']?>" >
			<div class="col-xs-6 col-md-3 product_item" style="box-shadow:none;padding:0px;border-radius:4px;cursor:pointer;border:none">
				<ul class="grid cs-style-3">
					<li>
						<figure style="border:1px solid #ccc">
							<img src="images/product/<?=$productPhoto?>"  class="img-responsive">
							<p align="center" class="name_hover" style="background:white;padding:2px 0;margin:0"><?=$pro['Title']?></p>
							<figcaption align="center">
								<h5><?=$pro['Title']?></h5>
								<?php
									if($loggedin == 1){
								               echo "<span> Rs. ".$pro['Price']."</span>";
								            }
								            else{
								            	echo "<span data-toggle='tooltip' data-placement='top' title='Please login to see the prices'><i  class='iconfont-lock'></i></span>"; 
								            } 
								?>
								
								<p>Size : <?=$pro['size']?></p>
							</figcaption>
						</figure>
					</li>
				</ul>
			</div>
			
		</a>
		
			
		<?php
		}
	} else {
		?>
        <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No Results with this filter</h2></div>
        <?php	
	}
?>