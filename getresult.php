<?php
require_once("includes/dbfunctions.php");
require_once("include/membersite_config.php");
$db_handle = new DBController();
$perPage = 12;
if($fgmembersite->CheckRestLogin())
{ 
   $loggedin = 1;
}
else{
   $loggedin = 0;
}
$sql = "SELECT * from tbl_products";
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage; 
$pro = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '';
if(!empty($pro)) {
$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="rowcount" value="' . $_GET["rowcount"] . '" />';
foreach($pro as $k=>$v) {
$output .= '<a href="products/'.$pro[$k]["ProductID"].'" >
<div class="col-xs-6 col-md-3 product_item" style="box-shadow:none;padding:0px;border-radius:4px;cursor:pointer;border:none">
   <ul class="grid cs-style-3">
      <li>
         <figure style="border:1px solid #ccc">
            <img src="images/product/' .$pro[$k]["photo"]. '" alt="'.$pro[$k]["Title"].'">
            <p align="center" class="name_hover" style="background:white;padding:2px 0;margin:0">'.$pro[$k]["Title"].'</p>
            <figcaption align="center">';
            if($loggedin == 1){
               $output .= '<span> Rs. '.$pro[$k]["Price"].'</span>';
            }
            else{
            	$output .= '<span data-toggle="tooltip" data-placement="top" title="Please login to see the prices"><i  class="iconfont-lock"></i></span>';
            }
            $output .= '<h5>'.$pro[$k]["Title"].'</h5>
               <p>Size : '.$pro[$k]["size"].'</p>
            </figcaption>
         </figure>
      </li>
   </ul>
</div>
</a>';


}
}
print $output;
?>