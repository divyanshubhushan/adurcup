<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Autocomplete using PHP/MySQL and jQuery
*/

// PDO connect *********
 
require("db_config.php"); 

$keyword = '%'.$_POST['keyword'].'%';
/*echo "<script type='text/javascript'>alert('$length');</script>";*/





	$sql = "SELECT * FROM restaurants WHERE LOWER(rest_name) LIKE (:keyword) OR LOWER(main_address) LIKE (:keyword)  ORDER BY id ASC LIMIT 0, 7";

			$query = $pdo->prepare($sql);
			$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
			$query->execute();
			$list = $query->fetchAll();
			if ($list == null) {
				
				# code...
			}
			foreach ($list as $rs) {
				// put in bold the written text
				$rest_name = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['rest_name']);
				$location = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['main_address']);
				$temp_fill_rest_name = json_encode($rs['rest_name']);
				$fill_rest_name =htmlspecialchars($temp_fill_rest_name, ENT_QUOTES) ;
				$fill_main_address = json_encode($rs['main_address']);
				$fill_zomato_link = json_encode($rs['rest_link']);
				$fill_telephone = json_encode($rs['telephone']);
				$fill_postalcode = json_encode($rs['postalcode']);
				$sub_location = json_encode($rs['sub_location']);
				$cost42 =  json_encode($rs['cost42']);
				preg_match_all('!\d+!', $cost42, $cost_42);
				$final_cost = $cost_42[0][0];
				

			



				// add new option
			echo "<li align='left' onclick='pre_fill_form($fill_rest_name,$fill_main_address,$fill_zomato_link,$fill_telephone,$fill_postalcode,$sub_location,$final_cost)'> $rest_name ,<span class='text-muted' style='font-size:12px'> $location </span></li>";

			}



?>