<?php

function connect() {
    return new PDO('mysql:host=localhost;dbname=adurcup_stuffbin', 'root', 'harshit', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$location = $_POST['location'];
$length = strlen($location);
/*echo "<script type='text/javascript'>alert('$length');</script>";*/



if ($length == 0) {

	$sql = "SELECT * FROM adurzone WHERE LOWER(restaurant_name) LIKE (:keyword) /*OR LOWER(sub_location) LIKE (:keyword) */ ORDER BY id ASC LIMIT 0, 7";

			$query = $pdo->prepare($sql);
			$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
			$query->execute();
			$list = $query->fetchAll();
			if ($list == null) {
				echo "No suggestion available";
				# code...
			}
			foreach ($list as $rs) {
				// put in bold the written text
				$restaurant_name = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['restaurant_name']);
				$sub_location = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['sub_location']);
				$rest_id = $rs['id'];


				// add new option
			echo '<li onclick="set_location_url('.$rest_id.')"> '.$restaurant_name.' , '.$sub_location.'</li>';

			}

	
}

else
{

	$sql = "SELECT * FROM adurzone WHERE location ='$location' AND LOWER(restaurant_name) LIKE (:keyword) /*OR LOWER(sub_location) LIKE (:keyword) */ ORDER BY id ASC LIMIT 0, 7";

			$query = $pdo->prepare($sql);
			$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
			$query->execute();
			$list = $query->fetchAll();
			if ($list == null) {
				echo "No suggestion available";
				# code...
			}
			foreach ($list as $rs) {
				// put in bold the written text
				$restaurant_name = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['restaurant_name']);
				$sub_location = str_replace($_POST['keyword'], '<span style="font-weight:800">'.$_POST['keyword'].'</span>', $rs['sub_location']);
				$rest_id = $rs['id'];


				// add new option
			echo '<li onclick="set_location_url('.$rest_id.')"> '.$restaurant_name.' , '.$sub_location.'</li>';

			}
}
/*elseif ($category == 'schools') {

	$sql = "SELECT * FROM  professors WHERE LOWER(name) LIKE (:keyword) OR LOWER(first_name) LIKE (:keyword)  ORDER BY id ASC LIMIT 0, 7";

		$query = $pdo->prepare($sql);
		$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
		$query->execute();
		$list = $query->fetchAll();
		if ($list == null) {
			echo "No suggestion available";
			# code...
		}
		foreach ($list as $rs) {
			// put in bold the written text
			$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
			$first_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['first_name']);
			$schools_id = $rs['id'];


			// add new option
		echo '<li onclick="set_school_url('.$schools_id.')"> '.$first_name.','.$name.'</li>';

		}

	# code...
}

elseif ($category == 'programs') {

	$sql = "SELECT * FROM  departments WHERE LOWER(name) LIKE (:keyword) ORDER BY id ASC LIMIT 0, 7";

		$query = $pdo->prepare($sql);
		$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
		$query->execute();
		$list = $query->fetchAll();
		if ($list == null) {
			echo "No suggestion available";
			# code...
		}
		foreach ($list as $rs) {
			// put in bold the written text
			$name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
			$programs_id = $rs['id'];


			// add new option
		echo '<li onclick="set_program_url('.$programs_id.')">'.$name.'</li>';

		}

	# code...
}
*/

?>