<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Autocomplete using PHP/MySQL and jQuery
*/

// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=adurcup_stuffbin', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
/*echo "<script type='text/javascript'>alert('$length');</script>";*/





	$sql = "SELECT * FROM adurzone WHERE LOWER(restaurant_name) LIKE (:keyword) OR LOWER(address) LIKE (:keyword)  ORDER BY id ASC LIMIT 0, 7";

			$query = $pdo->prepare($sql);
			$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
			$query->execute();
			$list = $query->fetchAll();
			if ($list == null) {
				
				# code...
			}
			foreach ($list as $rs) {
				// put in bold the written text
				$reataurant_name = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['restaurant_name']);
				$location = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['address']);
				$temp_fill_reataurant_name = json_encode($rs['restaurant_name']);
				$fill_reataurant_name =htmlspecialchars($temp_fill_reataurant_name, ENT_QUOTES) ;
				$fill_main_address = json_encode($rs['address']);
				$fill_zomato_link = json_encode($rs['zomato']);
				$fill_telephone = json_encode($rs['contact']);
				$fill_postalcode = json_encode($rs['pincode']);
				$sub_location = json_encode($rs['sub_location']);
				$cost42 =  json_encode($rs['cost_for_2']);
				preg_match_all('!\d+!', $cost42, $cost_42);
				$final_cost = $cost42[0][0];
				

			



				// add new option
			echo "<li align='left' onclick='pre_fill_form($fill_reataurant_name,$fill_main_address,$fill_zomato_link,$fill_telephone,$fill_postalcode,$sub_location,$final_cost)'> $reataurant_name ,<span class='text-muted' style='font-size:12px'> $location </span></li>";

			}



?>
