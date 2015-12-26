<?php
if(!isset($_SESSION)){ session_start(); }
	//added standard php/mysql config file with host, user and password info
	require "config.php";
	
	//models and collections
	require "domain/models/filter-result-model.php";
	require "domain/collection/filter-result-collection.php";
	
	//domain
	require "domain/action.php";
	require "domain/sorting.php";
	require "domain/pagination.php";
	require "domain/filtering.php";
	require "domain/server.php";
	
	//controls
	require "controls/sortdropdown.php";	
	require "controls/textbox.php";	
	require "controls/checkboxgroupfilter.php";
	require "controls/filterdropdown.php";
	require "controls/filterselect.php";
		
	class jPListHTML extends jPListServer{
			
		/**
		* get html for one item
		* @param {Object} $item
		* @return {string} html
		*/
		private function getHTML($item){
			
			$html = "";
			$rest_id = $item['rest_id'];
			$outlet_id = $item['id'];
			$advertiser_id = $_SESSION['ad_id'];
			$conn= mysql_connect(DB_USER,DB_USER,DB_PASSWORD);

	    	mysql_select_db(DB_NAME,$conn ) or die(mysql_error());

	    	$qry = "SELECT status from interest_showed where advertiser_id='$advertiser_id' AND outlet_id = '$outlet_id'";
        
	        $result = mysql_query($qry);
	        
	        if(!$result || mysql_num_rows($result) <= 0)
	        {
	           $status = 0;     // no interset showed
	           $btn_text = "<button id='outlet_id_".$item['id']."' class='col-sm-10 col-sm-offset-1' style='padding:4px 0;margin-top:0px;font-size:16px;color:#fff;background:#5BC0DE;border:none;border-radius:4px;' onclick='show_interest(".$item['id'].",".$item['rest_id'].")'>Show Interest</button>";
	        } 
	        $row = mysql_fetch_assoc($result);
	        if ($row['status'] == 1) {  // CLick to cancel request - Pending
	        	$btn_text = "<button id='outlet_id_".$item['id']."' class='col-sm-10 col-sm-offset-1' style='padding:4px 0;margin-top:0px;font-size:16px;color:#fff;background:#dc6767;border:none;border-radius:4px;' onclick='delete_interest(".$item['id'].",".$item['rest_id'].")'>Cancel Request</button>" ;   // Click to Cancel
	        }
	        elseif ($row['status'] == 2) {
	        	$btn_text = "<button id='outlet_id_".$item['id']."' class='col-sm-10 col-sm-offset-1' style='padding:4px 0;margin-top:0px;font-size:16px;color:#fff;background:#33CC33;border:none;border-radius:4px;' disabled >Approved</button>" ; 
	        }

	    	$qry2 = "SELECT image_src from adurzone_images where rest_id='$rest_id' ";
	    	 $result2 = mysql_query($qry2);
	    	if(!$result2 || mysql_num_rows($result2) <= 0)
	        {
	           $logo_src = 'no_image.png';     // no interset showed
	   
	        } 
	        else{
	        	   $row2 = mysql_fetch_assoc($result2);
	        	   $logo_src = $row2['image_src'];

	        }


	     

			$html .= "<div class='list-item box col-lg-4' style='padding:5px 10px'>";
			$html .= "	<div class='panel' style='border:1px solid #e5e5e5'>";
			$html .= "		<div class='panel-body' style='padding:8px 15px'>";
			$html .= "			<div class='profile'>";
			$html .= "				<div style='margin-bottom: 15px' class='row'>";


			$html .= "					<div class='col-xs-12 col-sm-3 text-center' style='padding:0 2px;margin-bottom:5px'>";
			$html .= "						<img src='images/avatar/$logo_src' alt='' style='display: inline-block;max-width:75px' class='img-responsive img-circle'/>";
			$html .= "					</div>";
			$html .= "					<div class='col-xs-12 col-sm-9'>";
			$html .= "						<h2 style='padding:5px 0;font-size:25px;margin:0;color:#666'>" . $item['restaurant_name'] . "</h2>";
			$html .= "							<p style='padding:0;margin:0;font-size:14px;color:#999'>" . $item['sub_location'] . "</p>";
/*			$html .= "							<p style='padding:0;margin:0'><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star'></span></a><a href='#'><span class='fa fa-star-o'></span></a></p>";*/
			$html .= "					</div>";

			$html .= "					<div class='col-xs-12 col-sm-12' style='float:left;border-top:1px solid #f5f5f5;padding:0px;font-size:14px'>";
			$html .= "					<ul class='nav nav-tabs nav-justified'>";
			$html .= "						<li class='active'><a data-toggle='tab' href='#".$item['id'].'-info'."'>Info</a></li>";
			$html .= "						<li><a data-toggle='tab' href='#".$item['id'].'-advertisement'."'>Ad Options</a></li>";
			$html .= "					</ul>";
$html .= "					<div class='tab-content'style='border:none;margin:0;padding-top:'>";
			$html .= "						<div class='tab-pane active' id='".$item['id'].'-info'."'>";
			$html .= "					        <div class='col-xs-12' style='padding:0 2px;margin-bottom:10px'>";
			$html .= "						        <p><span style='padding:0;margin:0;color:#de7047'>Service:</span> ".$item['service']."</p>
													<p><span style='padding:0;margin:0;color:#de7047'>Profession:</span> ".$item['section']."</p>
													<p><span style='padding:0;margin:0;color:#de7047'>Age:</span> ".$item['age_group']."</p><p><span style='padding:0;margin:0;color:#de7047'>Footfalls:</span> ".$item['footfalls']."</p>";
			$html .= "					        </div>";

			$html .= "						</div>";
			$html .= "						<div class='tab-pane' id='".$item['id'].'-advertisement'."'>
									<ul class='social-icons list-unstyled list-inline mbl mtl' style='margin:0 !important'>";

        $qry3 = "SELECT * FROM ad_options INNER JOIN ad_items ON ad_options.ad_item_id=ad_items.item_id WHERE ad_options.rest_id = '$rest_id' ";

	    $result3 = mysql_query($qry3);
         while( $row3 = mysql_fetch_array($result3, MYSQL_ASSOC) )
        {  
        	$html .= "<li><kbd>".$row3['name']. "</kbd></li>";
          

        }
                                                       
            $html .= "  </ul></div>";
			$html .= "					</div>";
			$html .= "					</div>";
			
			$html .= "				</div>";

			$html .= "				<div class='row text-center'>";
			$html .= $btn_text;
			$html .= "				</div>";
			$html .= "			</div>";
			$html .= "		</div>";
			$html .= "	</div>";
			$html .= "</div>";

			return $html;
		}
		
		/**
		* get the whole html
		* @param {string} $itemsHtml - items html
		* @return {string} html
		*/
		private function getHTMLWrapper($itemsHtml){
			
			$html = "";
			
			$html .= "<div data-type='jplist-dataitem' data-count='" . $this->pagination->numberOfPages . "' class='box'>";
			$html .= $itemsHtml;
			$html .= "</div>";		
			
			return $html;
		}
		
		/**
		* constructor
		*/
		public function __construct(){
			
			$html = "";
			
			try{
				parent::__construct();
				
				if(isset($this->statuses)){
					
					$items = $this->getData();
					
					if($items){
						foreach($items as $item){
							$html .= $this->getHTML($item);					
						}
					}
								
					//print html
					echo($this->getHTMLWrapper($html));
				}
				
				//close the database connection
				$this->db = NULL;
			}
			catch(PDOException $ex){
				print "Exception: " . $ex->getMessage();
			}
		}
	}
	
	/**
	* start
	*/
	new jPListHTML();
?>	