<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "harshit";
$dbname = "adurcup_stuffbin";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
                0=>'id',
		1 =>'restaurant_name',
                2 =>'owner_name',
                3 =>'email',
                4 =>'password',
                5 =>'contact',
                6 =>'pincode',
                7 =>'outlets',
                8 =>'zomato',
                9 =>'facebook',
                10 =>'location',
                11 =>'sub_location',
                12=>'address',
                13 =>'taste',
                14 =>'service',
                15 =>'cost_for_2',
                16 =>'year',
                17 =>'age_group',
                18 =>'section',
                19 =>'print',
                20 =>'sale_type',
                21 =>'max_sale',
                22 =>'busy_hours',
                23 =>'new_services',
                24 =>'electronic',
                25 =>'entertainment',
                26 =>'other'
);

// getting total number records without any search
$sql = "SELECT id,
                restaurant_name,
                owner_name,
                email,
                password,
                contact,
                pincode,
                outlets,
                zomato,
                facebook,
                location,
                sub_location,
                address,
                taste,
                service,
                cost_for_2,
                year,
                age_group,
                section,
                print,
                sale_type,
                max_sale,
                busy_hours,
                new_services,
                electronic,
                entertainment,
                other ";
$sql.=" FROM adurzone";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id,
                restaurant_name,
                owner_name,
                email,
                password,
                contact,
                pincode,
                outlets,
                zomato,
                facebook,
                location,
                sub_location,
                address,
                taste,
                service,
                cost_for_2,
                year,
                age_group,
                section,
                print,
                sale_type,
                max_sale,
                busy_hours,
                new_services,
                electronic,
                entertainment,
                other ";
$sql.=" FROM adurzone WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( restaurant_name LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR owner_name LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR password LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR contact LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR pincode LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR outlets LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR zomato LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR facebook LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR location LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR sub_location LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR address LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR taste LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR service LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR cost_for_2 LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR year LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR age_group LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR section LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR print LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR sale_type LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR max_sale LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR busy_hours LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR new_services LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR electronic LIKE '".$requestData['search']['value']."%' ";
	
	$sql.=" OR entertainment LIKE '".$requestData['search']['value']."%'";
	$sql.=" OR other LIKE '".$requestData['search']['value']."%') ";

}
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
        $nestedData[] = $row["id"];
	$nestedData[] = $row["restaurant_name"];
	$nestedData[] = $row["owner_name"];
	$nestedData[] = $row["email"];
	$nestedData[] = $row["password"];
	$nestedData[] = $row["contact"];
	$nestedData[] = $row["pincode"];
	$nestedData[] = $row["outlets"];
	$nestedData[] = $row["zomato"];
	$nestedData[] = $row["facebook"];
	$nestedData[] = $row["location"];
	$nestedData[] = $row["sub_location"];
	$nestedData[] = $row["address"];
	$nestedData[] = $row["taste"];
	$nestedData[] = $row["service"];
	$nestedData[] = $row["cost_for_2"];
	$nestedData[] = $row["year"];
	$nestedData[] = $row["age_group"];
	$nestedData[] = $row["section"];
	$nestedData[] = $row["print"];
	$nestedData[] = $row["sale_type"];
	$nestedData[] = $row["max_sale"];
	$nestedData[] = $row["busy_hours"];
	$nestedData[] = $row["new_services"];
	$nestedData[] = $row["electronic"];
	$nestedData[] = $row["entertainment"];
	$nestedData[] = $row["other"];


	
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
